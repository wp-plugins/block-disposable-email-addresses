<?php
/*
	Plugin Name: Block Disposable EMail 
	Plugin URI: http://wordpress.org/extend/plugins/block-disposable-email-addresses/ 
	Description: This plugin protects your registered user base by preventing registration with a disposable email addresse (like mailinator). 
	Author: Gerold Setz 
	Version: 0.2
	Author URI: http://www.block-disposable-email.com/
	Text Domain: bdea 
	Domain Path: /bdea
 */

// Check if we are running PHP5 or above, otherwise die with an error message.
function bdea_activation_check()
{
        if (version_compare(PHP_VERSION, '5.0.0', '<'))
        {
                deactivate_plugins(basename(__FILE__));
                wp_die("Sorry, but you can't run this plugin, it requires PHP 5 or higher.");
        }
}
register_activation_hook(__FILE__, 'bdea_activation_check');

add_action('admin_menu', 'block_dea_menu');

function block_dea_menu() {
        add_options_page('Block DEA Options', 'Block DEA', 'manage_options', 'bdea-admin-menu', 'block_dea_options');
        add_action( 'admin_init', 'register_bdea_settings' );
}

function plugin_section_text() {
        echo '<p>This plugin requires an api key. You can get one at <a href="http://www.block-disposable-email.com/" target="_bdea">www.block-disposable-email.com</a>.</p>';
}


function plugin_setting_string() {
        $options = get_option('bdea_plugin_options');
        echo "<input id='plugin_text_string' name='bdea_plugin_options[bdea_api_key]' size='40' type='text' value='{$options['bdea_api_key']}' />";
}


function register_bdea_settings() {
        register_setting( 'bdea_plugin_options', 'bdea_plugin_options');
        add_settings_section('plugin_main', 'Main Settings', 'plugin_section_text', 'plugin');
        add_settings_field('plugin_text_string', 'BDEA Api key', 'plugin_setting_string', 'plugin', 'plugin_main');
}

 // Add a settings link in the plugin listing
	add_filter('plugin_action_links', 'plugin_action_links', 10, 2);

function block_dea_options() {
?>
<div>
<h2>Block Disposable Email</h2>
Options relating to the BDEA plugin.
<form action="options.php" method="post">
<?php settings_fields('bdea_plugin_options'); ?>
<?php do_settings_sections('plugin'); ?>

<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
</form></div>

<?php
}

function plugin_action_links($links, $file)
        {
                static $this_plugin;
                if (!$this_plugin)
                {
                        $this_plugin = plugin_basename(__FILE__);
                }

                if ($file == $this_plugin)
                {
                        $settings_link = '<a href="options-general.php?page=bdea-admin-menu">' . __('Settings') . '</a>';
                        array_unshift($links, $settings_link);
                }

                return $links;
        }

// Hooks, Funktionen
add_filter ( 'is_email', 'bdea_check' );

function bdea_check ($email){
        //ini_set('default_socket_timeout',5);
        list(, $domain) = explode('@', $email);

        $key = get_option('bdea_plugin_options');
        $request = 'http://check.block-disposable-email.com/api/json/'.$key['bdea_api_key'].'/'.trim($domain);

	//echo $request;

        if ($response = @file_get_contents($request))
		{
        	$dea = json_decode($response);

        	if ($dea->request_status == 'success')
                	{
                	if ($dea->domain_status == 'ok')
                        	{
                        	// do something like register ...
                        	return true;
                        	}

                	if ($dea->domain_status == 'block')
                        	{
                        	// deny registration ...
                        	return false;
                        	}
                	}
       		else return true;
		}
	else return true;
}

?>
