<?php

namespace Ramphor\TermLayout\Setup;

use Exception;

class PageAsTermLayoutStructure
{
    protected static function createDatabaseTable()
    {
        /**
         * @var \wpdb
         */
        global $wpdb;

        $createdReferenceTableSQL = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ramphor_page_as_term_layout_references` (
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `post_id` BIGINT NOT NULL,
            `term_id` BIGINT NOT NULL,
            `primary_reference` INT NOT NULL DEFAULT '1',
            `redirect` BOOLEAN NULL DEFAULT FALSE,
            `created_by` BIGINT NULL,
            `created_on` DATETIME NOT NULL,
            `updated_on` DATETIME NOT NULL,
            PRIMARY KEY (`id`)
        )" . $wpdb->get_charset_collate();

        $createHistoryTableSQL = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ramphor_page_as_term_layout_modifies` (
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `reference_id` BIGINT NOT NULL,
            `data` LONGTEXT NOT NULL,
            `modified_by` BIGINT NOT NULL,
            `modified_on` DATETIME NOT NULL,
            PRIMARY KEY (`id`)
        ) " . $wpdb->get_charset_collate();

        try {
            $wpdb->query($createdReferenceTableSQL);
            $wpdb->query($createHistoryTableSQL);
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    public static function active()
    {
        static::createDatabaseTable();
    }
}
