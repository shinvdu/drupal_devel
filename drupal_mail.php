<?php
chdir('/home/silas/app/cms/');//注释掉或者改为你自己的站的目录
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
// the belong funciton should be puted in woger_amazon module
function woger_amazon_mail($key, &$message, $params) {
    $jira_feed_issue_email = variable_get('jira_feed_issue_email', '714016976@qq.com');
    switch ($key) {
    case 'feed_error_jira':
        $message['to'] = $jira_feed_issue_email;
        //$message['subject'] = t('New parent created @sku',array('@sku' => $params['sku']));
        $message['subject'] = 'New parent created @sku';
        $message['body'][] = 'To and from mail address = @from_email.';
        break;
    }
}
/*
$params= array(
    'sku' => $node->field_sku[0]['value'],
    'from_email' => $jira_feed_issue_email,
);
drupal_mail('woger_amazon', 'feed_error_jira', $jira_feed_issue_email, 'en', $params, $from = $jira_feed_issue_email, $send = TRUE);
drush php-eval "drupal_mail('woger_amazon', 'feed_error_jira', '714016976@qq.com', 'en', array(), '714016976@qq.com', TRUE);"
*/
drupal_mail('woger_amazon', 'feed_error_jira', '714016976@qq.com', 'en', array(), '714016976@qq.com', TRUE);
// woger_amazon 是为模块的名字, feed_error_jira是关键字
?>
