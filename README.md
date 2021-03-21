Ramphor Wallary
=

WordPress gallery for meta box and frontend post

# Installing

```
composer require ramphor/wallery
```

# Setup

## Use Wallery classes

```
<?php
use Ramphor\Wallery\Wallery;
use Ramphor\Wallery\Factory\MetaboxFactory;
````

## Create metabox

```
<?php
if ( class_exists( Wallery::class ) ) {
    $walleryFactory  = new MetaboxFactory();
    $walleryInstance = new Wallery( $walleryFactory );

    $walleryInstance->setId( 'the_key_name_to_store_gallary_to_database' );
}
```

## Render wallery metabox

```
<?php
add_action('add_meta_boxes', 'wallery_register_metabox');
function wallery_register_metabox() {
    add_meta_box(
        'metabox_id',
        ( 'Metabox Wallery Title', 'cominovel' ),
        array( $walleryInstance, 'render' ),
        'chapter'
    );
}
```
