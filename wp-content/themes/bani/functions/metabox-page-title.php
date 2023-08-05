<?php

add_action( 'tf_create_options', 'bani_page_title_metabox' );

function bani_page_title_metabox() {

    if ( class_exists( 'TitanFramework' ) ) {
        $titan = TitanFramework::getInstance( 'bani' );

        $metaBox_page_title = $titan->createMetaBox( array(
            'name' => 'Page Title',
            'post_type' => 'page',
            'context' => 'side',
            'desc' => 'You can hide page title if you want to use page builders like Site Origin, Elementor, Beaver Builder etc.',
            'priority' => 'low'
        ) );

        // create options
        $metaBox_page_title->createOption( array(
            'id' => 'bani_hide_page_title',
            'type' => 'checkbox',
            'desc' => 'Hide Page Title',
            'default' => false,
        ) );
    }


}
