<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Options du thème' ) )

    ->add_tab('Contact', [
        Field::make_text('email', 'Email')->set_attribute('type', 'email'),
		Field::make_text('phone', 'Téléphone'),
    ]);

?>
