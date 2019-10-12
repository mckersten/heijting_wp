<?php
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die( 'Direct access not allowed!' );
}

function sgr_delete($array) {
	foreach ($array as $one) {
		delete_option("sgr_{$one}");
	}	
}

sgr_delete(array("site_key", "secret_key", "login_check_disable"));
