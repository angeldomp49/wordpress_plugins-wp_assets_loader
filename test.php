<?php

$t = [
    'one' => '',
    'two' => 'a',
    'tree' => 'some',
    'four' => [
        'one_four' => '',
        'two_four' => 'two_four'
    ]
];

function deleteEmptyFieldsScripts( $fromOptionsPage ){
    return array_filter( $fromOptionsPage );
}

echo( var_dump( deleteEmptyFieldsScripts( $t ) ) );