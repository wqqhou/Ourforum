<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'front';
$route['404_override'] = 'article/page_not_found';
$route['translate_uri_dashes'] = FALSE;

// 登入註冊
$route['login'] = 'login';
$route['logout'] = 'login/logout';
$route['terms'] = 'login/terms';
$route['join'] = 'login/join';
$route['register'] = 'login/join';
$route['join/confirm'] = 'login/join_confirm';
$route['login/confirm'] = 'login/login_handle';
$route['join/success/(:num)'] = 'login/join_success/$1';

// 認證
$route['join/success/enable/(:any)'] = 'login/join_enable/$1';

$route['join/request/enable'] = 'login/resend_enable_email';
$route['join/request/password'] = 'login/reset_password';
$route['join/request/password/(:any)/auth'] = 'login/reset_password_page/$1';
$route['join/request/password/reset'] = 'login/reset_password_page_handle';

// Account 會員帳號
$route['account/school'] = 'account/enterschool';

$route['account/profile'] = 'account/profile';
$route['account/friends'] = 'account/friends';
$route['account/article'] = 'account/article';
$route['account/archive'] = 'account/archive';
$route['account/items'] = 'account/items';
$route['account/warning'] = 'account/warning';

// 好友資料 及 聊天
$route['account/friends/(:num)'] = 'account/friends_profile/$1';
$route['account/friends/(:num)/talk'] = 'account/friends_talk/$1';
$route['account/friends/(:num)/remove'] = 'account/remove_friend/$1';
$route['account/friends/talk/get'] = 'account/talk_sms';
$route['account/friends/get/friend/info'] = 'account/friends_info'; // TODO: 改網址
$route['account/friends/talk/send'] = 'account/friends_send_talk';

// 我的好友 query (返回JSON)
$route['account/query/friends'] = 'account/friends_json';
$route['account/query/article'] = 'account/article_json';
$route['account/query/joinArticle'] = 'account/join_article_json';
$route['account/query/archive'] = 'account/archive_json';
$route['account/query/items'] = 'account/items_json';
$route['account/query/warning'] = 'account/warning_json';
$route['account/query/notice'] = 'account/notice';
$route['account/query/notice/check/(:num)'] = 'account/notice_check/$1';

//Activity 攻城戰資訊
$route['activity/query/siege_info'] = 'activity/siege_record_json';
$route['activity/siege/attack'] = 'activity/siege_attack_json';
// Account 寫入資料區
$route['account/profile/save'] = 'account/profile_save/';
$route['account/profile/save/upload'] = 'account/profile_upload';
$route['account/profile/save/hidename'] = 'account/hide_name_save';
$route['account/profile/save/recemessage'] = 'account/rece_message';
$route['account/profile/short'] = 'account/short';
$route['account/profile/edit/password'] = 'account/edit_password';
$route['account/profile/edit/email'] = 'account/edit_email';

// Article 寫入資料區
$route['article/newpost/save'] = 'article/newpost_save';
$route['article/response/save'] = 'article/response_save';
$route['article/newresponse/save'] = 'article/newresponse_save';
$route['article/edit/save'] = 'article/article_edit_save';
$route['article/remove/save'] = 'article/article_edit_save';
$route['article/response/(:num)'] = 'article/response_view/$1';
$route['article/edit/query'] = 'article/get_article_edit_json';

// 取得選單列表 json (由 article/type_json Controller 產生，再自己存到靜態檔案裡)
$route['assets/statics/article/type'] = 'article/type_json_load_view';

// 今日涅友
$route['friend']        = 'friend/selene_friend';
$route['friend/invite'] = 'friend/invite_friend';
$route['friend/invite/report'] = 'friend/invite_friend_report';

// 涅友私訊
$route['account/friends/(:num)/talk'] = 'account/friends_talk/$1';

$route['subscribe'] = 'article/subscribe';

// 文章列表及 query 等
$route['a'] = 'article';
$route['a/query'] = 'article/query';
$route['a/query/hot'] = 'article/hot_json';
$route['a/search'] = 'article/search';
$route['a/(:any)'] = 'article/index/$1';
$route['a/(:any)/newpost'] = 'article/newpost/$1';
$route['a/(:any)/query'] = 'article/query/$1';
$route['a/(:any)/query/hot'] = 'article/hot_json/$1';
$route['a/remove/article'] = 'article/remove_article';
$route['a/remove/reply'] = 'article/remove_reply';

// 文章點讚 & 收藏
$route['a/query/likes'] = 'article/click_like';
$route['a/query/archive'] = 'article/click_archive';
$route['a/query/replylike'] = 'article/click_replylike';
$route['a/query/article/reply'] = 'article/article_reply';
$route['a/query/report/article'] = 'article/article_report';
$route['a/query/report/reply'] = 'article/reply_report';

// 查詢單篇文章	(社會大眾版) a/hate/6399
$route['a/(:any)/(:num)'] = 'article/view/$1/$2';
$route['a/(:any)/(:num)/edit'] = 'article/get_article_edit/$1/$2';
$route['p/(:any)p/(:num)'] = 'article/old_url_redirect/$1/$2';


// 舊版對應
$route['guest/(:any)p/(:num)'] = 'article/old_url_redirect/$1/$2';
$route['p/all'] = 'article/old_url_redirect';

// (返回JSON)  a/query/article  接收POST
$route['a/query/article'] = 'article/article_json';
$route['a/query/reply'] = 'article/reply_json';

// 其他 Other
$route['other/feedback'] = 'other/feedback';
$route['other/problem'] = 'other/problem';
$route['other/myfeedback/item'] = 'other/myfeedback_item';
$route['other/problem/(:num)']  = 'other/problem_view/$1';
$route['other/problem/item/(:num)'] = 'other/problem_view_json/$1';

// 活動 activity
$route['activity/join'] = 'activity/join';
$route['activity/join/(:num)'] = 'activity/join_info/$1';
$route['activity/join/confirm'] = 'activity/activity_join_json';

// ajax upload imgur
$route['activity/ajax_upload_imgur'] = 'activity/ajax_upload_imgur';
$route['activity/ajax_url_upload_imgur'] = 'activity/ajax_url_upload_imgur';

// 投票 vote
$route['activity/vote'] = 'activity/vote';
$route['activity/vote/(:num)'] = 'activity/activity_can_vote_list/$1';
$route['activity/vote_info'] = 'activity/can_vote_activity_json';
$route['activity/vote/item/(:num)'] = 'activity/activity_can_vote_list_json/$1';
$route['activity/vote/confirm'] = 'activity/vote_confirm';
$route['activity/vote/result/list'] = 'activity/vote_result_list'; // json
$route['activity/result'] = 'activity/result'; // json
$route['activity/result/(:num)'] = 'activity/result_item/$1'; // json
$route['activity/result/item/info/(:num)'] = 'activity/result_item_info_json/$1';

                                        /* App */

// app 個人資料部份
$route['api/account/query/profile'] = 'mobile/account_profile_json';
$route['api/account/query/friends'] = 'mobile/account_friends_json';
$route['api/account/query/article'] = 'mobile/account_article_json';
$route['api/account/query/archive'] = 'mobile/account_archive_json';
$route['api/account/query/items'] = 'mobile/account_items_json';
$route['api/account/query/warning'] = 'mobile/account_warning_json';

// 好友資料 及 聊天
$route['api/account/friends/(:num)'] = 'mobile/friends_profile/$1';
// $route['api/account/friends/(:num)/talk'] = 'account/friends_talk/$1';
// $route['api/account/friends/(:num)/remove'] = 'account/remove_friend/$1';
// $route['api/account/friends/talk/get'] = 'account/talk_sms';
// $route['api/account/friends/get/friend/info'] = 'account/friends_info'; // TODO: 改網址
// $route['api/account/friends/talk/send'] = 'account/friends_send_talk';

// app Mobile 寫入資料區
// $route['api/article/newpost/save'] = 'mobile/newpost_save/';

// app 文章列表及 query 等
// $route['api/article'] = 'mobile';
$route['api/article/query'] = 'mobile/query';
// $route['api/article/query/hot'] = 'mobile/hot_json';
$route['api/article/query/likes'] = 'mobile/click_like';
$route['api/article/query/archive'] = 'mobile/click_archive';
$route['api/article/query/replylike'] = 'mobile/click_replylike';
// $route['api/article/search'] = 'mobile/search';
$route['api/article/(:any)/query'] = 'mobile/query/$1';
// $route['api/article/(:any)/query/hot'] = 'mobile/hot_json/$1';


// 今日涅友
$route['api/friend']        = 'mobile/selene_friend';
$route['api/friend/invite'] = 'friend/invite_friend';
$route['api/friend/invite/report'] = 'friend/invite_friend_report';


// app (返回JSON)  a/query/article  接收POST
$route['api/article/query/article'] = 'mobile/article_json';
// 文章回覆
$route['api/article/query/article/reply'] = 'mobile/article_reply';
$route['api/article/query/reply'] = 'mobile/reply_json';

// app 登入
$route['api/login'] = 'login/login_mobile';



                                            /* Admin */
$route['pineapple/article'] = 'admin/index';
