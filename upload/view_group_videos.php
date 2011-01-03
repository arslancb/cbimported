<?php
/* 
 ****************************************************************
 | Copyright (c) 2007-2010 Clip-Bucket.com. All rights reserved.
 | @ Author : ArslanHassan										
 | @ Software : ClipBucket , � PHPBucket.com					
 ****************************************************************
*/

define("THIS_PAGE","view_group_videos");
define("PARENT_PAGE","videos");

require 'includes/config.inc.php';
$pages->page_redir();

$url = mysql_clean($_GET['url']);


$details = $cbgroup->group_details_url($url);
assign('group',$details);

if($details)
{
	//Getting List of all videos
	$videos = $cbgroup->get_group_videos($details['group_id'],"yes");
	assign("videos",$videos);
	assign("mode","view_videos");
	subtitle($details['group_name']);
}

template_files('view_group.html');
display_it();
?>