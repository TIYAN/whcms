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

require "init.php";
$id = (int)$whmcs->get_req_var("id");
$url = get_query_val("tbllinks", "link", array("id" => $id));

if ($url) {
	update_query("tbllinks", array("clicks" => "+1"), array("id" => $id));
	WHMCS_Cookie::set("LinkID", $id, "3m");
	run_hook("LinkTracker", array("linkid" => $id));
	header("Location: " . $url);
	exit();
	return 1;
}

redir("", "index.php");
?>