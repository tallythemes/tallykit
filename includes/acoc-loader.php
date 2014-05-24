<?php
if ( ! function_exists( 'acoc_forceLoadFirst' ) ) {
    if ( ! class_exists( 'acoc_framework_plugin_checker' ) ) {
        class acoc_framework_plugin_checker {
            function __construct() {
                if ( is_admin() ) {
                    add_filter( 'admin_notices', array( $this, 'displayNotification' ) );
                }
            }
            public function displayNotification() {
                echo "<div class='error'><p><strong>"
                    . __( 'This plugin requires the <a href="@#">ACOC Framework</a> plugin.', "tallykit_textdomain" )
                    . sprintf( " <a href='%s'>%s</a>",
                        admin_url( "plugin-install.php?tab=search&type=term&s=acoc" ),
                        __( "Click here to search for the plugin.", "tallykit_textdomain" ) )
                    . "</strong></p></div>";
            }
        }
        new acoc_framework_plugin_checker();
    }
    // Stop executing the plugin until the framework is activated
    return;
}