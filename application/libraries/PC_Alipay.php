<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 加载支付宝支付
require_once APPPATH.'libraries/alipay_pc/lib/alipay_submit.class.php';

/**
 * 为CI扩展支付宝支付类
 */
class PC_Alipay extends AlipaySubmit {

    public function __construct(){

        parent::__construct();

    }
}