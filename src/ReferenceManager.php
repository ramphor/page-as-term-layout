<?php
namespace Ramphor\TermLayout;

use Ramphor\TermLayout\References\PageReference;
use Ramphor\TermLayout\References\TermReference;
use Ramphor\TermLayout\Setup\PageAsTermLayoutStructure;
use WP_Screen;

class ReferenceManager
{
    const REFERENCE_TERM_AS_PRIMARY = 1;
    const REFERENCE_PAGE_AS_PRIMARY = 2;

    public function installIfNeeded()
    {
        if (did_action('plugins_loaded')) {
            register_activation_hook(PAGE_AS_TERM_LAYOUT, [PageAsTermLayoutStructure::class, 'active']);
        } else {
            if (!get_option('ramphor_page_as_term_layout_installed', 0)) {
                PageAsTermLayoutStructure::active();
                update_option('ramphor_page_as_term_layout_installed', true);
            }
        }
    }

    public function createMetaOnEditScreen()
    {
        $currentScreen = get_current_screen();
        if (is_a($currentScreen, WP_Screen::class)) {
            if ($currentScreen->base === 'post') {
                new PageReference($currentScreen->post_type);
            } elseif (isset($currentScreen->taxonomy)) {
                new TermReference($currentScreen->taxonomy);
            }
        }
    }
}
