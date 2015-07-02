<?php
/*
Plugin Name: Anime List
Plugin URI: 
Description: 
Author: 
Version: 
Author URI: 
*/

register_activation_hook(__FILE__, 'anime_list_activate');
register_deactivation_hook(__FILE__, 'anime_list_deactivate');

function anime_list_activate() {
    require_once dirname(__FILE__).'/anime_list_loader.php';
    $loader = new AnimeListLoader();
    $loader->activate();
}

function anime_list_deactivate() {
    require_once dirname(__FILE__).'/anime_list_loader.php';
    $loader = new AnimeListLoader();
    $loader->deactivate();
}

?>