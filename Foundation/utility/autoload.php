<?php

/**
 * @param $className
 */
function my_autoloader($className)
{
    $firstLetter = $className[0];
    switch ($firstLetter)
    {
        case 'E':
            include_once( 'Entity/'. $className . '.php' );
            break;

        case 'F':
            include_once( 'Foundation/'. $className . '.php' );
            break;

        case 'V':
            include_once( 'View/'. $className . '.php' );
            break;

        case 'C':
            include_once( 'Controller/'. $className . '.php' );
            break;

        case 'm':
            include_once( $className . '.php' );
            break;

        case 's':
            include_once( 'Foundation/utility/'. $className . '.php');
            break;

        case 'c':
            include_once( 'utility/'. $className . '.php' );
            break;

        case 'I':
            include_once( $className . '.php' );
            break;
    }
}

spl_autoload_register('my_autoloader');

?>

