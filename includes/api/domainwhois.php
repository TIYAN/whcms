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


if (!function_exists("checkDomainisValid")) {
	require ROOTDIR . "/includes/domainfunctions.php";
}


if (!function_exists("lookupDomain")) {
	require ROOTDIR . "/includes/whoisfunctions.php";
}

$domainparts = explode(".", $domain, 2);
$sld = $domainparts[0];
$tld = "." . $domainparts[1];

if (!checkDomainisValid($sld, $tld)) {
	$apiresults = array("result" => "success", "message" => "Domain not valid");
	return false;
}

$result = lookupDomain($sld, $tld);
$whois = (($responsetype == "xml" || $responsetype == "json") ? $result['whois'] : urlencode($result['whois']));
$result['whois'] = $whois;
$apiresults = array("result" => "success", "status" => $result['result'], "whois" => $result['whois']);
?>