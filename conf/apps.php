<?php
/**
 * Add all of the Spout/Bear apps that you want to make use of here.
 * The App Module will be loaded ONLY the default library.
 * See: Mackstar\Spout\App\Module\AppModule for an example.
 */ 

return [
    'site' => 'Mackstar',
    'apps' => [
        'mackstar' => ['namespace' => 'Mackstar\\Site'],

    ],
    'default' => 'mackstar'
];