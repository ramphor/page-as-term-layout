<?php
namespace Ramphor\TermLayout;

class PageAsTermLayout
{
    protected static $instance;

    private function __construct() {
    }

    public static function getInstance() {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}
