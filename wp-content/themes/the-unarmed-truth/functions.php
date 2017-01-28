<?php

/*
 * Puzzle
 */

/*
 * Glob everything in the /theme/setup/ directory.
 * Require order does not matter.
 */
foreach (glob(get_stylesheet_directory() . '/theme/setup/*.php') as $filename) {
    require_once($filename);
}

?>
