<?php
error_reporting(0);
header("Content-Type: text/html; charset=utf-8");

require_once(dirname(__FILE__) . '/' . 'IGt.Push.php');
require_once(dirname(__FILE__) . '/' . 'igetui/IGt.AppMessage.php');
require_once(dirname(__FILE__) . '/' . 'igetui/IGt.TagMessage.php');
require_once(dirname(__FILE__) . '/' . 'igetui/IGt.APNPayload.php');
require_once(dirname(__FILE__) . '/' . 'igetui/template/IGt.BaseTemplate.php');
require_once(dirname(__FILE__) . '/' . 'IGt.Batch.php');
require_once(dirname(__FILE__) . '/' . 'igetui/utils/AppConditions.php');
require_once(dirname(__FILE__) . '/' . 'igetui/template/notify/IGt.Notify.php');
require_once(dirname(__FILE__) . '/' . 'igetui/IGt.MultiMedia.php');
require_once(dirname(__FILE__) . '/' . 'payload/VOIPPayload.php');

define('APPKEY','');
define('APPID','');
define('MASTERSECRET','');
define('CID','');
define('HOST',"");

//getUserStatus();

//stoptask();

//setTag();

//getUserTags();

//pushMessageToSingle();

//pushMessageByTag();

//pushMessageToSingleBatch();

//getPersonaTagsDemo();

//getUserCountByTagsDemo();

//pushMessageToList();

//pushMessageToApp();
//
//getPushMessageResultDemo();
//getScheduleTaskDemo();
//getPushResultByGroupNameDemo();
//getUserCountByTagsDemo();
//getPushResultByGroupNameDemo();
//getLast24HoursOnlineUserStatisticsDemo();
//restoreCidListFromBlkDemo();
//addCidListToBlkDemo();
//setBadgeForCIDDemo();
//setBadgeForDeviceTokenDemo();
//
//pushTagMessageRetryDemo();
//
//getScheduleTaskDemo();
//delScheduleTaskDemo();
//queryCidPnDemo();
//stopSendSmsDemo();


function getPersonaTagsDemo() {
    $igt = new IGeTui(HOST, APPKEY, MASTERSECRET);
    $ret = $igt->getPersonaTags(APPID);
    var_dump($ret);
}
function getUserCountByTagsDemo() {
	$igt = new IGeTui(HOST, APPKEY, MASTERSECRET);
    $tagList = array("金在中","龙卷风");
	$ret = $igt->getUserCountByTags(APPID, $tagList);
	var_dump($ret);
}

function getScheduleTaskDemo(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $ret = $igt->getScheduleTask(TASKID,APPID);
    var_dump($ret);
}
function delScheduleTaskDemo(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $ret = $igt->delScheduleTask(TASKID,APPID);
    var_dump($ret);
}
function getPushResultByGroupNameDemo(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $ret = $igt->getPushResultByGroupName(APPID,"11");
    var_dump($ret);
}
function getLast24HoursOnlineUserStatisticsDemo(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $ret = $igt->getLast24HoursOnlineUserStatistics(APPID);
    var_dump($ret);
}
function restoreCidListFromBlkDemo(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $cidList=array(CID,"");
    $ret = $igt->restoreCidListFromBlk(APPID,$cidList);
    var_dump($ret);
}
function addCidListToBlkDemo(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $cidList=array(CID,"");
    $ret = $igt->addCidListToBlk(APPID,$cidList);
    var_dump($ret);
}
function setBadgeForCIDDemo(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $cidList=array(CID,"");
    $ret = $igt->setBadgeForCID(Badge,APPID,$cidList);
    var_dump($ret);
}
function setBadgeForDeviceTokenDemo(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $cidList=array(CID,"");
    $ret = $igt->setBadgeForDeviceToken(Badge,APPID,$cidList);
    var_dump($ret);
}
function pushTagMessageRetryDemo(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $template = IGtLinkTemplateDemo();
    //个推信息体
    //基于应用消息体
    $message = new IGtTagMessage();
    $message->set_isOffline(true);
    $message->set_offlineExpireTime(10 * 60 * 1000);//离线时间单位为毫秒，例，两个小时离线为3600*1000*2
    $message->set_data($template);

    $appIdList=array(APPID);

    $message->set_tag("123");
    $message->set_appIdList($appIdList);
    $ret = $igt->pushTagMessageRetry($message);
    var_dump($ret);
}

function queryCidPnDemo(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $cidList=array(CID);
    $ret = $igt->queryCidPn(APPID,$cidList);
    var_dump($ret);
}
function stopSendSmsDemo(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $ret = $igt->stopSendSms(APPID,TASKID);
    var_dump($ret);
}

function getPushMessageResultDemo(){


    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);

//    $ret = $igt->getPushResult("");
//    var_dump($ret);

//    $ret = $igt->queryAppUserDataByDate(APPID,"20140807");
//    var_dump($ret);

    $ret = $igt->queryAppPushDataByDate(APPID,"20140807");
    var_dump($ret);
}

//用户状态查询
function getUserStatus() {
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $rep = $igt->getClientIdStatus(APPID,CID);
    var_dump($rep);
    echo ("<br><br>");
}

//推送任务停止
function stoptask(){

    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $igt->stop("");
}

//通过服务端设置ClientId的标签
function setTag(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $tagList = array('','中文','English');
    $rep = $igt->setClientTag(APPID,CID,$tagList);
    var_dump($rep);
    echo ("<br><br>");
}

function getUserTags() {
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $rep = $igt->getUserTags(APPID,CID);
    //$rep.connect();
    var_dump($rep);
    echo ("<br><br>");
}
//pushMessageToSingleToSMS();
//setSmsInfo接口
function pushMessageToSingleToSMS(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $template = new IGtTransmissionTemplate();
    $template->set_appId(APPID);
    $template->set_appkey(APPKEY);
    $template->set_transmissionType(2);
    $template->set_transmissionContent("123123");

    $smsMessage = new SmsMessage();
//    $smsContent = array();
//    $smsContent["url"] = "http://www.baidu.com/getui";
    $smsMessage->setPayload("1234");
    $smsMessage->setUrl("http://www/getui");
    $smsMessage->setSmsTemplateId("");
    $smsMessage->setOfflineSendtime(1000);
    $smsMessage->setIsApplink(true);
//    $smsMessage->smsContent($smsContent);
    $template->setSmsInfo($smsMessage);

    $message = new IGtSingleMessage();
    $message->set_isOffline(true);
    $message->set_offlineExpireTime(60*60*1000);
    $message->set_data($template);
    $target = new IGtTarget();
    $target ->set_appId(APPID);
    $target ->set_clientId(CID);
    try {
        for ($i = 0; $i < 1; $i++) {
            $ret = $igt->pushMessageToSingle($message, $target, "121231233123");
            var_dump($ret);
        }
    }catch (RequestException $e){
            $requstId = $e->getRequestId();
            $ret = $igt->pushMessageToSingle($message,$target,$requstId);
            var_dump($ret);
    }
 }
//服务端推送接口，支持三个接口推送
//1.PushMessageToSingle接口：支持对单个用户进行推送
//2.PushMessageToList接口：支持对多个用户进行推送，建议为50个用户
//3.pushMessageToApp接口：对单个应用下的所有用户进行推送，可根据省份，标签，机型过滤推送
//
//单推接口案例
function pushMessageToSingle(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);

    //消息模版：
    // 1.TransmissionTemplate:透传功能模板
    // 2.LinkTemplate:通知打开链接功能模板
    // 3.NotificationTemplate：通知透传功能模板
    // 4.NotyPopLoadTemplate：通知弹框下载功能模板

//    	$template = IGtNotyPopLoadTemplateDemo();
//    	$template = IGtLinkTemplateDemo();
//    	$template = IGtNotificationTemplateDemo();
//    $template = IGtTransmissionTemplateDemo();
//    $template = IGtTransmissionVOIPTemplateDemo();
    $template = SmsDemo();
    //个推信息体
    $message = new IGtSingleMessage();

    $message->set_isOffline(true);//是否离线
    $message->set_offlineExpireTime(3600*12*1000);//离线时间
    $message->set_data($template);//设置推送消息类型
//	$message->set_PushNetWorkType(0);//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送
    //接收方
    $target = new IGtTarget();
    $target->set_appId(APPID);
    $target->set_clientId(CID);
//    $target->set_alias(Alias);


    try {
        $rep = $igt->pushMessageToSingle($message, $target);
        var_dump($rep);
        echo ("<br><br>");

    }catch(RequestException $e){
        $requstId =$e->getRequestId();
        $rep = $igt->pushMessageToSingle($message, $target,$requstId);
        var_dump($rep);
        echo ("<br><br>");
    }

}


function pushMessageToSingleBatch()
{
    putenv("gexin_pushSingleBatch_needAsync=false");

    $igt = new IGeTui(HOST, APPKEY, MASTERSECRET);
    $batch = new IGtBatch(APPKEY, $igt);
    $batch->setApiUrl(HOST);
    //$igt->connect();
    //消息模版：
    // 1.TransmissionTemplate:透传功能模板
    // 2.LinkTemplate:通知打开链接功能模板
    // 3.NotificationTemplate：通知透传功能模板
    // 4.NotyPopLoadTemplate：通知弹框下载功能模板

    //$template = IGtNotyPopLoadTemplateDemo();
    $templateLink = IGtLinkTemplateDemo();
    $templateNoti = IGtNotificationTemplateDemo();
    //$template = IGtTransmissionTemplateDemo();

    //个推信息体
    $messageLink = new IGtSingleMessage();
    $messageLink->set_isOffline(true);//是否离线
    $messageLink->set_offlineExpireTime(12 * 1000 * 3600);//离线时间
    $messageLink->set_data($templateLink);//设置推送消息类型
    //$messageLink->set_PushNetWorkType(1);//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送

    $targetLink = new IGtTarget();
    $targetLink->set_appId(APPID);
    $targetLink->set_clientId(CID1);
    $batch->add($messageLink, $targetLink);

    //个推信息体
    $messageNoti = new IGtSingleMessage();
    $messageNoti->set_isOffline(true);//是否离线
    $messageNoti->set_offlineExpireTime(12 * 1000 * 3600);//离线时间
    $messageNoti->set_data($templateNoti);//设置推送消息类型
    //$messageNoti->set_PushNetWorkType(1);//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送

    $targetNoti = new IGtTarget();
    $targetNoti->set_appId(APPID);
    $targetNoti->set_clientId(CID2);
    $batch->add($messageNoti, $targetNoti);
    try {

        $rep = $batch->submit();
        var_dump($rep);
        echo("<br><br>");
    }catch(Exception $e){
        $rep=$batch->retry();
        var_dump($rep);
        echo ("<br><br>");
    }
}

pushMessageToList();
//多推接口案例
function pushMessageToList()
{
    putenv("gexin_pushList_needDetails=true");
    putenv("gexin_pushList_needAsync=true");

    $igt = new IGeTui(HOST, APPKEY, MASTERSECRET);
    //消息模版：
    // 1.TransmissionTemplate:透传功能模板
    // 2.LinkTemplate:通知打开链接功能模板
    // 3.NotificationTemplate：通知透传功能模板
    // 4.NotyPopLoadTemplate：通知弹框下载功能模板


    //$template = IGtNotyPopLoadTemplateDemo();
    //$template = IGtLinkTemplateDemo();
    //$template = IGtNotificationTemplateDemo();
    $template = IGtTransmissionTemplateDemo();
    //个推信息体
    $message = new IGtListMessage();
    $message->set_isOffline(true);//是否离线
    $message->set_offlineExpireTime(3600 * 12 * 1000);//离线时间
    $message->set_data($template);//设置推送消息类型
//    $message->set_PushNetWorkType(1);	//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送
//    $contentId = $igt->getContentId($message);
    $contentId = $igt->getContentId($message,"toList任务别名功能");	//根据TaskId设置组名，支持下划线，中文，英文，数字

    //接收方1
    $target1 = new IGtTarget();
    $target1->set_appId(APPID);
    $target1->set_clientId(CID);
//    $target1->set_alias(Alias);

    $targetList[] = $target1;

    $rep = $igt->pushMessageToList($contentId, $targetList);

    var_dump($rep);

    echo ("<br><br>");

}

//群推接口案例
function pushMessageToApp(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $template = IGtLinkTemplateDemo();
    //个推信息体
    //基于应用消息体
    $message = new IGtAppMessage();
    $message->set_isOffline(true);
    $message->set_offlineExpireTime(10 * 60 * 1000);//离线时间单位为毫秒，例，两个小时离线为3600*1000*2
    $message->set_data($template);
    $appIdList=array(APPID);
    $phoneTypeList=array('ANDROID');
    $provinceList=array('浙江');
    $tagList=array('haha');
    $age = array("0000", "0010");


    $cdt = new AppConditions();
    $cdt->addCondition(AppConditions::PHONE_TYPE, $phoneTypeList);
    $cdt->addCondition(AppConditions::REGION, $provinceList);
    $cdt->addCondition(AppConditions::TAG, $tagList);
    $cdt->addCondition("age", $age);

    $message->set_appIdList($appIdList);
    $message->set_conditions($cdt);

    $rep = $igt->pushMessageToApp($message);

    var_dump($rep);
    echo ("<br><br>");
}

//所有推送接口均支持四个消息模板，依次为通知弹框下载模板，通知链接模板，通知透传模板，透传模板
//注：IOS离线推送需通过APN进行转发，需填写pushInfo字段，目前仅不支持通知弹框下载功能

function IGtNotyPopLoadTemplateDemo(){
    $template =  new IGtNotyPopLoadTemplate();

    $template ->set_appId(APPID);//应用appid
    $template ->set_appkey(APPKEY);//应用appkey
    //通知栏
    $template ->set_notyTitle("个推");//通知栏标题
    $template ->set_notyContent("个推最新版点击下载");//通知栏内容
    $template ->set_notyIcon("");//通知栏logo
    $template ->set_isBelled(true);//是否响铃
    $template ->set_isVibrationed(true);//是否震动
    $template ->set_isCleared(true);//通知栏是否可清除
    //弹框
    $template ->set_popTitle("弹框标题");//弹框标题
    $template ->set_popContent("弹框内容");//弹框内容
    $template ->set_popImage("");//弹框图片
    $template ->set_popButton1("下载");//左键
    $template ->set_popButton2("取消");//右键
    //下载
    $template ->set_loadIcon("");//弹框图片
    $template ->set_loadTitle("地震速报下载");
    $template ->set_loadUrl("http://dizhensubao.igexin.com/dl/com.ceic.apk");
    $template ->set_isAutoInstall(false);
    $template ->set_isActived(true);
	//$template->set_notifyStyle(0);
    //$template->set_duration(BEGINTIME,ENDTIME); //设置ANDROID客户端在此时间区间内展示消息

    return $template;
}

function IGtLinkTemplateDemo(){
    $template =  new IGtLinkTemplate();
    $template ->set_appId(APPID);//应用appid
    $template ->set_appkey(APPKEY);//应用appkey
    $template ->set_title("请输入通知标题");//通知栏标题
    $template ->set_text("请输入通知内容");//通知栏内容
    $template ->set_logo("");//通知栏logo
    $template ->set_isRing(true);//是否响铃
    $template ->set_isVibrate(true);//是否震动
    $template ->set_isClearable(true);//通知栏是否可清除
    $template ->set_url("http://www.igetui.com/");//打开连接地址
    //$template->set_duration(BEGINTIME,ENDTIME); //设置ANDROID客户端在此时间区间内展示消息
    return $template;
}

function IGtNotificationTemplateDemo(){
    $template =  new IGtNotificationTemplate();
    $template->set_appId(APPID);//应用appid
    $template->set_appkey(APPKEY);//应用appkey
    $template->set_transmissionType(1);//透传消息类型
    $template->set_transmissionContent("测试离线");//透传内容
    $template->set_title("个推");//通知栏标题
    $template->set_text("个推最新版点击下载");//通知栏内容
    $template->set_logo("http://wwww.igetui.com/logo.png");//通知栏logo
    $template->set_isRing(true);//是否响铃
    $template->set_isVibrate(true);//是否震动
    $template->set_isClearable(true);//通知栏是否可清除
    //$template->set_duration(BEGINTIME,ENDTIME); //设置ANDROID客户端在此时间区间内展示消息
    return $template;
}

function IGtTransmissionTemplateDemo(){
    $template =  new IGtTransmissionTemplate();
    $template->set_appId(APPID);//应用appid
    $template->set_appkey(APPKEY);//应用appkey
    $template->set_transmissionType(1);//透传消息类型
    $template->set_transmissionContent("测试离线ddd");//透传内容
    //$template->set_duration(BEGINTIME,ENDTIME); //设置ANDROID客户端在此时间区间内展示消息
    //APN简单推送
//        $template = new IGtAPNTemplate();
//        $apn = new IGtAPNPayload();
//        $alertmsg=new SimpleAlertMsg();
//        $alertmsg->alertMsg="";
//        $apn->alertMsg=$alertmsg;
////        $apn->badge=2;
////        $apn->sound="";
//        $apn->add_customMsg("payload","payload");
//        $apn->contentAvailable=1;
//        $apn->category="ACTIONABLE";
//        $template->set_apnInfo($apn);
//        $message = new IGtSingleMessage();

    //第三方厂商推送透传消息带通知处理
    $notify = new IGtNotify();
    $notify -> set_payload("{}");
    $notify -> set_title("透传通知标题");
    $notify -> set_content("透传通知内容");
    $notify->set_type(NotifyInfo_Type::_payload);
    $template -> set3rdNotifyInfo($notify);

    //APN高级推送
    $apn = new IGtAPNPayload();
    $alertmsg=new DictionaryAlertMsg();
    $alertmsg->body="";
    $alertmsg->actionLocKey="";
    $alertmsg->locKey="";
    $alertmsg->locArgs=array("");
    $alertmsg->launchImage="";
//        IOS8.2 支持
    $alertmsg->title="";
    $alertmsg->titleLocKey="";
    $alertmsg->titleLocArgs=array("");

    $alertmsg->subtitle = "subtitle";

    $apn->alertMsg=$alertmsg;
    $apn->badge=7;
    $apn->sound="";
    $apn->add_customMsg("payload","");
    $apn->voicePlayType = 1;
    $apn->contentAvailable=1;
    $apn->category="ACTIONABLE";

    //IOS多媒体消息处理
    $media = new IGtMultiMedia();
    $media -> set_url("");
    $media -> set_onlywifi(false);
    $media -> set_type(MediaType::pic);

    $medias = array();
    $medias[] = $media;
    //$apn->set_multiMedias($medias);

    $template->set_apnInfo($apn);

    //PushApn老方式传参
//    $template = new IGtAPNTemplate();
//          $template->set_pushInfo("", 10, "", "com.gexin.ios.silence", "", "", "", "");

    return $template;
}

//多标签推送接口案例
function pushMessageByTag(){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $template = IGtLinkTemplateDemo();
    //个推信息体
    //基于应用消息体
    $message = new IGtTagMessage();
    $message->set_isOffline(true);
    $message->set_offlineExpireTime(10 * 60 * 1000);//离线时间单位为毫秒，例，两个小时离线为3600*1000*2
    $message->set_data($template);

    $appIdList=array(APPID);

    $message->set_tag("123");
    $message->set_appIdList($appIdList);

    $rep = $igt->pushTagMessage($message);

    var_dump($rep);
    echo ("<br><br>");
}


function IGtTransmissionTemplateFunction(){
    $template =  new IGtTransmissionTemplate();
    $template->set_appId('');//应用appid
    $template->set_appkey('');//应用appkey
    $template->set_transmissionType(1);//透传消息类型
    $template->set_transmissionContent('');//透传内容

    return $template;
}

?>

