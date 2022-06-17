<?php
namespace Ramphor\TermLayout;

use Jankx\Abstractions\Abstracts\Module;
use Jankx\Abstractions\ModuleLoader;
use Ramphor\TermLayout\Modules\Redirection;

class ModuleManager
{
    protected $loaders = [];

    public function init()
    {
        $modules = apply_filters('ramphor/term/layout/modules', [
            Redirection::class,
        ]);

        foreach ($modules as $moduleClass) {
            if (!is_a($moduleClass, Module::class, true)) {
                continue;
            }
            array_push($this->loaders, new ModuleLoader($moduleClass, 'ramphor/term/layout/modules/load'));
        }
    }

    public function load()
    {
        do_action('ramphor/term/layout/modules/load');
    }
}
