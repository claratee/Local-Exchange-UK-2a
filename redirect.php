<?php
include_once("includes/inc.global.php");

global $cStatusMessage, $cDB, $cUser;

$cStatusMessage->SaveMessages();

if (!isset($redir_url))
{
	$redir_url = (isset($_REQUEST['location'])) ? $cDB->EscTxt($_REQUEST['location']) : null;
}
/*
if (!isset($redir_type))
{
	$redir_type = (isset($_GET['type']))? $_GET['type'] : null;
}

if (!isset($redir_item))
{
	$redir_item = (isset($_GET['item'])) $_GET['item'] : null;
}
*/
if (!empty($redir_url))	// a specific URL was requested.  Go there regardless of other variables.
{
	header("Location: ".$redir_url);
	exit;
}
/*
if (!empty($redir_type) && !empty($redir_item))
{
	header("location:" . HTTP_BASE[$redir_type]."?item=".$redir_item);
	exit;
}

if (!empty($redir_type))	// $item not specified
{
	header("location:" . HTTP_BASE[$redir_type]);
	exit;
}
*/

// dunno where to go.  Go home.
if(!$cUser->isAdminActionPermitted()){
	header("Location: " . HTTP_BASE . "/member_profile_menu.php");
}else{
	header("Location: " . HTTP_BASE . "/admin_menu.php");
}
exit;


?>
