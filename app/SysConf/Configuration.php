<?php

namespace App\SysConf;

use Illuminate\Support\Arr;

class Configuration
{
    public array $config;

    public $path;

    public function __construct($path = '')
    {
        $this->path = $path;
        $this->config = json_decode(file_get_contents(config_path($path)), true);
    }

    public function load($file)
    {
        $this->config = json_decode(file_get_contents(config_path($file)), true);

        return $this->config;
    }

    public function save()
    {
        $fc = fopen(config_path($this->path), 'w');
        fwrite($fc, json_encode($this->config));
        fclose($fc);
    }

    public static function get($file, $key)
    {
        $configuration = json_decode(file_get_contents(config_path($file)), true);

        return Arr::get($configuration, $key);
    }

    public static function set($file, $key, $value)
    {
        $configuration = json_decode(file_get_contents(config_path($file)), true);
        $result = Arr::set($configuration, $key, $value);
        file_put_contents(config_path($file), json_encode($configuration));

        return $result;
    }
}
