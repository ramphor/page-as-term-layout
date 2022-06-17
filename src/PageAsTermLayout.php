<?php
namespace Ramphor\TermLayout;

class PageAsTermLayout
{
    protected static $instance;

    const CONFIG_FILE_PATH = 'ramphor/configs/page-as-term-layout.php';

    private function __construct()
    {
        $this->loadModules();
        $this->iniHooks();
    }

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    protected function loadModules()
    {
        $manager = new ModuleManager();
        $manager->init();
        $manager->load();
    }

    public function iniHooks()
    {
        $referenceManager = new ReferenceManager();
        $referenceManager->installIfNeeded();
        if (is_admin()) {
            add_action('current_screen', [$referenceManager, 'createMetaOnEditScreen']);
        }
    }

    public static function getConfigFilePath()
    {
        return sprintf(
            '%s/%s',
            rtrim(WP_CONTENT_DIR, '/'),
            static::CONFIG_FILE_PATH
        );
    }
}
