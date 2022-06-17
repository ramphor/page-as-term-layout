<?php
namespace Ramphor\TermLayout\Setup;

use Exception;

class ConfigWriter
{
    protected $configFilePath;
    protected $configs;

    public function __construct($configs, $configPath)
    {
        $this->configFilePath = $configPath;
        $this->configs = $configs;
    }

    public function write($forceUpdate = true)
    {
        $dir = dirname($this->configFilePath);
        if (!file_exists($dir)) {
            try {
                mkdir($dir, 0755, true);
            } catch (Exception $e) {
                error_log($e->getMessage());
                return;
            }
        }
        if ($forceUpdate && file_exists($this->configFilePath)) {
            @unlink($this->configFilePath);
        }

        $h = fopen($this->configFilePath, 'w+');

        fwrite($h, '<?php' . str_repeat(PHP_EOL, 2));
        fwrite($h, 'return ');
        fwrite($h, var_export($this->configs, true));
        fwrite($h, ';' . PHP_EOL);

        fclose($h);
    }
}
