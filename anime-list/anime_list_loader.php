<?php

class AnimeListLoader extends MvcPluginLoader {

    var $db_version = '1.0';
    var $tables = array();

    function activate() {
    
        // This call needs to be made to activate this app within WP MVC
        
        $this->activate_app(__FILE__);
        
        // Perform any databases modifications related to plugin activation here, if necessary

        require_once ABSPATH.'wp-admin/includes/upgrade.php';
    
        add_option('anime_list_db_version', $this->db_version);
        
        global $wpdb;

        $sql = '
        CREATE TABLE ' . $wpdb->prefix . 'anime_lists (
          id int(11) NOT NULL auto_increment,
          title varchar(255) NOT NULL,
          poster varchar(255) NOT NULL,
          plot TEXT NOT NULL,
          genres TEXT default NULL,
          producer varchar(255) NOT NULL,
          PRIMARY KEY  (id)
        )';

        dbDelta($sql);
        
    }

    function deactivate() {
    
        // This call needs to be made to deactivate this app within WP MVC
        
        $this->deactivate_app(__FILE__);
        
        require_once ABSPATH.'wp-admin/includes/upgrade.php';

        // Perform any databases modifications related to plugin deactivation here, if necessary
    
        global $wpdb;

        $sql = 'DROP TABLE ' . $wpdb->prefix . 'anime_lists';
        $wpdb->query($sql);

    }

}

?>