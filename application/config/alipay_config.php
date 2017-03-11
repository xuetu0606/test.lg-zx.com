<?php
/* *
 * 配置文件
 * 版本：3.5
 * 日期：2016-06-25
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 * 安全校验码查看时，输入支付密码后，页面呈灰色的现象，怎么办？
 * 解决方法：
 * 1、检查浏览器配置，不让浏览器做弹框屏蔽设置
 * 2、更换浏览器或电脑，重新登录查询。
 */

//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//合作身份者ID，签约账号，以2088开头由16位纯数字组成的字符串，查看地址：https://openhome.alipay.com/platform/keyManage.htm?keyType=partner
$config['partner']		= '2088321046561938';

//收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
$config['seller_id']	= $config['partner'];

//商户的私钥,此处填写原始私钥去头去尾，RSA公私钥生成：https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.nBDxfy&treeId=58&articleId=103242&docType=1
$config['private_key']	= 'MIICXgIBAAKBgQDK2884b/mWSMKpu5pxwfAgyTRGItCwO+vw6kNwKwxAbd2wpqjZbxhGXHUwRrLJe9lAMbF7PZlnwtf13ddKh3lxN5fSCJFkid7V6gQCJH1I0pHp6/LynrIoAjTTmG5Dn8cLt3Epm9inBNhp1oPVe2YI0LdHVircRKBjVdOcTerUDwIDAQABAoGBAMUFVa5Hus3GXyIArhDcPj9pi1avC6aOnCoBLHxtotmUmyKtywJbDuWPeNXpZE2h9q+NVAYRHsQTDjKiQi4Fg+C/oF+kDtpV+tI1ht2hbAhaWxgMam5SvfcuQFIKpjXDLcmxkomE7tJGm4KsyZZoY8P2rK15wG6Uk3gB/I7FotXxAkEA/uG1ZzIPBI/a57YyycvsdHfeglcpGbT9TNS8NWiLsk+JGQTPMphEQlwpr/NwhB3HUCBiN2Js5L88G/Pb9rs2OQJBAMu/qrguzMFvjrFk+cW97iUc+ZXU75UVYyCWAyDiegU8/uMVsj190/ei0+xbiplo31AnnZalGuXYiTDCD/lbHIcCQF9tcDaf1mGV3pasb52AHRqKGqPgMEIwsjmG2KSCbPMotiLI2y6NNdlGmlEHKxQ79fi49yzXS//k3YN1rOBWvXkCQQCacP2qQSdJ1RL3mo/N+SskDLOPhGnauux5zdwvOBzADb0zSsXh4Jgk1NMJDVag9KKZcn38q8gYw6syP1e2bv7PAkEA1FVREbzc0QlyfbuOufAYpr5KhmDHmrvM7xS3wdR/bZ2NhOmutIwF+qdSBouKUEEaMFg2Y9nybae1gV2z+Xov0Q==';

//支付宝的公钥，查看地址：https://b.alipay.com/order/pidAndKey.htm
$config['alipay_public_key']= 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnxj/9qwVfgoUh/y2W89L6BkRAFljhNhgPdyPuBV64bfQNN1PjbCzkIM6qRdKBoLPXmKKMiFYnkd6rAoprih3/PrQEB/VsW8OoM8fxn67UDYuyBTqA23MML9q1+ilIZwBC2AQ2UBVOrFXfFl75p6/B5KsiNG9zpgmLCUYuLkxpLQIDAQAB';

// 服务器异步通知页面路径  需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
$config['notify_url'] = "http://". $_SERVER['HTTP_HOST'] ."/pay/notify_url";

// 页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
$config['return_url'] = "http://". $_SERVER['HTTP_HOST'] ."/pay/return_url";

//签名方式
$config['sign_type']    = strtoupper('RSA');

//字符编码格式 目前支持 gbk 或 utf-8
$config['input_charset']= strtolower('utf-8');

//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
$config['cacert']    =  APPPATH.'libraries/alipay_pc/cacert.pem';

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
$config['transport']    = 'http';

// 支付类型 ，无需修改
$config['payment_type'] = "1";

// 产品类型，无需修改
$config['service'] = "create_direct_pay_by_user";

//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


//↓↓↓↓↓↓↓↓↓↓ 请在这里配置防钓鱼信息，如果没开通防钓鱼功能，为空即可 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

// 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
$config['anti_phishing_key'] = "";

// 客户端的IP地址 非局域网的外网IP地址，如：221.0.0.1
$config['exter_invoke_ip'] = "";

//↑↑↑↑↑↑↑↑↑↑请在这里配置防钓鱼信息，如果没开通防钓鱼功能，为空即可 ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑