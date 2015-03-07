<?php
/**
 * ExcelDumper (http://www.dw-labs.de/ExcelDumper)
 *
 * @author     Daniel Wolkenhauer <dw@dwolke.de>
 * @copyright  Copyright (c) 2005-2015 Daniel Wolkenhauer
 * @link       http://github.com/dwolke/ExcelDumper
 * @version    0.1.1
 */


// Autoload files using Composer autoload
if (file_exists('../vendor/autoload.php')) {
  require_once __DIR__ . '/../vendor/autoload.php'; 
}

if (!class_exists('ExcelDumper\XlsReader')) {
  die('Klasse nicht gefunden. Run `php composer.phar install`.');
}

use ExcelDumper\XlsReader;



try {
  $data = new XlsReader('katalog.xls');
} catch (RuntimeException $e) {
  die($e->getMessage());
}


var_dump($data, $data->sheetCount());


?>
