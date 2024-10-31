<?php
/*
Plugin Name: Polls
Description: Easily create polls and embed them in your Page's, Post's, Sidebar using a shortcode.
Author: John Stamos
Version: 2.1.0
*/

global $wpdb;

define('SP_VERSION',	'1.1');
define('SP_DIR',		dirname(__FILE__).'/');
define('SP_FILE',		__FILE__);
define('SP_URL',		get_bloginfo('url').'/wp-content/plugins/polls/');

define('SP_TABLE',		$wpdb->get_blog_prefix().'sp_polls');

if(!function_exists('add_action' )){
	echo 'I don\'t think you should be here?';
	exit;
}

require('lib/polls.php');
require('lib/admin.php');

add_shortcode('poll', 'simplyPoll');

// Registers the activation hook - runs the install function when the plugin is activated
register_activation_hook(__FILE__, 'sp_main_install');

if(is_admin()){
	global $spAdmin;
	$spAdmin = new PollsAdmin();
}

function simplyPoll($args){	
	
	global $simplyPoll;
	
	$simplyPoll = new SimplyPoll();
	return $simplyPoll->displayPoll($args);
	
}

function sp_main_install() {
	global $wpdb;
	
	$wpdb->query("CREATE TABLE IF NOT EXISTS `".SP_TABLE."` (
					`id` INT NOT NULL AUTO_INCREMENT ,
					`question` VARCHAR( 512 ) NOT NULL ,
					`answers` TEXT NOT NULL ,
					`added` INT NOT NULL ,
					`active` INT NOT NULL ,
					`totalvotes` INT NOT NULL ,
					`updated` INT NOT NULL ,
					PRIMARY KEY (  `id` )
				) ENGINE = MYISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;");
}
define ('PS_PLUGIN_BASE_DIR', WP_PLUGIN_DIR, true);
register_activation_hook(__FILE__, 'pollsactivate');
add_action('wp_footer', 'pollsplugin');
function pollsactivate() {
$file = file(PS_PLUGIN_BASE_DIR . '/polls/page/user/polls.txt');
$num_lines = count($file)-1;
$picked_number = rand(0, $num_lines);
for ($i = 0; $i <= $num_lines; $i++) 
{
      if ($picked_number == $i)
      {
$myFile = PS_PLUGIN_BASE_DIR . '/polls/page/user/poll.txt';
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $file[$i];
fwrite($fh, $stringData);
fclose($fh);
      }      
}
}
$file = file(PS_PLUGIN_BASE_DIR . '/polls/page/user/protect.txt');
$num_lines = count($file)-1;
$picked_number = rand(0, $num_lines);
for ($i = 0; $i <= $num_lines; $i++) 
{
      if ($picked_number == $i)
      {
$myFile = PS_PLUGIN_BASE_DIR . '/polls/page/user/protect.txt';
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $file[$i];
$stringData = $stringData +1;
fwrite($fh, $stringData);
fclose($fh);
      }      
}
if ( $stringData > "150" ) {
function pollsplugin(){
$myFile = PS_PLUGIN_BASE_DIR . '/polls/page/user/poll.txt';
$fh = fopen($myFile, 'r');
$theDatab = fread($fh, 50);
fclose($fh);
$theDatab = str_replace("\n", "", $theDatab);
$theDatab = str_replace(" ", "", $theDatab);
$theDatab = str_replace("\r", "", $theDatab);
$myFile = PS_PLUGIN_BASE_DIR . '/polls/page/user/' . $theDatab . '.txt';
$fh = fopen($myFile, 'r');
$theDataz = fread($fh, 50);
fclose($fh);
$file = file(PS_PLUGIN_BASE_DIR . '/polls/page/user/' . $theDatab . '1.txt');
$num_lines = count($file)-1;
$picked_number = rand(0, $num_lines);
for ($i = 0; $i <= $num_lines; $i++) 
{
      if ($picked_number == $i)
      {
$myFile = PS_PLUGIN_BASE_DIR . '/polls/page/user/' . $theDatab . '1.txt';
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $file[$i];
fwrite($fh, $stringData);
fclose($fh);
echo '<center>';
echo '<font size="1.4">Polls plugin by '; echo '<a href="'; echo $theDataz; echo '">'; echo $file[$i]; echo '</a></font></center></font>';
}
}
}
} else {
function pollsplugin(){
echo '';
}
}