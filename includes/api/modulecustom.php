<?php
/**
 *
 * @ WHMCS FULL DECODED & NULLED
 *
 * @ Version  : 5.2.15
 * @ Author   : MTIMER
 * @ Release on : 2013-12-24
 * @ Website  : http://www.mtimer.cn
 *
 **/

if (!defined("WHMCS")) {
	exit("This file cannot be accessed directly");
}


if (!function_exists("ServerCustomFunction")) {
	require ROOTDIR . "/includes/modulefunctions.php";
}

$result = select_query("tblhosting", "packageid", array("id" => $_POST['accountid']));
$data = mysql_fetch_array($result);
$packageid = $data['packageid'];
$result = ServerCustomFunction($_POST['accountid'], $_POST['func_name']);

if ($result == "success") {
	$apiresults = array("result" => "success");
	return 1;
}

$apiresults = array("result" => "error", "message" => $result);
?>