<?php
/*
 * Copyright (c) 2011 by YinXiangMa.com
 * Author: HongXiang Duan, YiQiang Wang, ShuMing Hu
 * Created: 2011-5-5
 * Function: YinXiangMa API php code
 * Version: v3.0
 * Date: 2012-12-01
 * PHP library for YinXiangMa - ӡ���� - ��֤�����Ʒ���ƽ̨.
 *    - Documentation and latest version
 *          http://www.YinXiangMa.com/
 *    - Get a YinXiangMa API Keys
 *          http://www.YinXiangMa.com/server/signup.php
 */


/********************************************************************************************
 * ���������벻Ҫ�Ķ�������Ķ������ܻ��д�������
 * "ӡ���� - ��֤�����Ʒ���ƽ̨"��
 ********************************************************************************************
 */
require_once ("YinXiangMaLibConfig.php");
session_start(); 
function YinXiangMa_ValidResult($YinXiangMaToken,$level,$YXM_input_result){	
	if($YXM_input_result==md5("true".PRIVATE_KEY.$YinXiangMaToken)) { $result= "true"; }
	else { $result= "false"; }
	return $result;
}
?>