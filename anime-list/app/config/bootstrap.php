<?php
add_action( 'wp_enqueue_scripts', 'animelists_enqueue_scripts' );

function animelists_enqueue_scripts($options) {
    wp_register_style('animelists_style', mvc_css_url('anime-list', 'anime-lists.css'));
    wp_enqueue_style('animelists_style');
}