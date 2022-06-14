<?php
/**
 * Plugin Name: Page As Term Layout
 * Author: Ramphor Premium
 * Author URI: https://puleeno.com
 * Version: 1.0
 */

if (defined('PAGE_AS_TERM_LAYOUT')) {
    define('PAGE_AS_TERM_LAYOUT', __FILE__);
}

$autoloader = dirname(__FILE__) . '/packages/autoload.php';
if (file_exists($autoloader)) {
    require_once $autoloader;
}

if (class_exists(\Ramphor\TermLayout\PageAsTermLayout::class)) {
    $GLOBALS['page_as_term_layout'] = \Ramphor\TermLayout\PageAsTermLayout::getInstance();
}
