<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 14.05.2015
 * Time: 21:32
 */

namespace App\Classes;

class Log {

    public $data = [];
    protected $path = LOG_DIR;
    protected $filename;

    public function __construct() {
        $this->filename = $this->path . date('d-m-Y') . '.log';
    }
    public function write() {
        $content = date('d-m-Y H:i:s') . "\t Caught Exception: " . implode(' | ', $this->data) . "\n";
        file_put_contents($this->filename, $content, FILE_APPEND);
    }

    public function read() {

        if (file_exists($this->filename)) {
            return file($this->filename, FILE_SKIP_EMPTY_LINES);
        }
        return false;
    }

}


