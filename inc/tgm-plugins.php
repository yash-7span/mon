<?php

//Autoload ACF with TGM
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'mon_register_required_plugins' );

function mon_register_required_plugins() {

  $plugins = array(
    array(
			'name'      => 'Advanced Custom Fields (ACF®)',
      'slug'      => 'advanced-custom-fields-pro',
      'source'    => get_template_directory() . '/inc/plugins/advanced-custom-fields-pro.zip',
      'required'  => false,
      'force_activation'   => false, 
      'force_deactivation' => false,
    ),    
  );

  $config = array(
    'id'           => '_ss',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => true,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
  );

tgmpa( $plugins, $config );
}
