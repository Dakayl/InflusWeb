<?php
header('Content-type: text/html; charset=UTF-8');
define('IN_PHPBB', true);
ini_set('display_errors', 1);
error_reporting(E_ALL);
$phpbb_root_path = '../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_user.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();
?>
<html>
<body>
<?php

$isAdmin = group_memberships(5,$user->data['user_id'],true);
$isCA = group_memberships(16,$user->data['user_id'],true);
$isConteur = group_memberships(15,$user->data['user_id'],true);
$isJoueur = group_memberships(9,$user->data['user_id'],true);

$rights = array(5=>$isAdmin, 9=>$isJoueur, 15=>$isConteur, 16=>$isCA);
$infos = array("phpbbid"=>$user->data['user_id'], "email"=>$user->data['user_email'], "name"=>$user->data['username']);
//if(group_memberships(40,$user->data['user_id'],true)) $isJoueur = false;
if($isJoueur) {

	$clan = "caitiff";
	if(group_memberships(17,$user->data['user_id'],true)) $clan = "ventrue";
	if(group_memberships(21,$user->data['user_id'],true)) $clan = "tremere";
	if(group_memberships(22,$user->data['user_id'],true)) $clan = "toréador";
	if(group_memberships(20,$user->data['user_id'],true)) $clan = "malkavien";
	if(group_memberships(18,$user->data['user_id'],true)) $clan = "nosferatu";
	if(group_memberships(19,$user->data['user_id'],true)) $clan = "gangrel";
	if(group_memberships(23,$user->data['user_id'],true)) $clan = "brujah";
	if(group_memberships(26,$user->data['user_id'],true)) $clan = "giovanni";
	if(group_memberships(27,$user->data['user_id'],true)) $clan = "sethite";
	if(group_memberships(25,$user->data['user_id'],true)) $clan = "ravnos";
	if(group_memberships(24,$user->data['user_id'],true)) $clan = "assamite";
	$infos["clan"] = $clan;
}
?>
<form action="../influences/app_dev.php/phpbbreceive" name='frm' method='POST'>
<?php 
foreach($rights as $k=>$r) {
echo "<input type='hidden' name='rights[".$k."]' value='".($r?1:0)."' />\n";
}
foreach($infos as $k=>$i) {
echo "<input type='hidden' name='infos[".$k."]' value='".$i."' />\n";
}?>
</form>
<script>
document.frm.submit();
</script>
</body>
</html>
