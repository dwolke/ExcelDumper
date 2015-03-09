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

use ExcelDumper\XlsReader;

try {
  $data = new XlsReader('katalog.xls');
} catch (RuntimeException $e) {
  die($e->getMessage());
}

//echo mb_internal_encoding();
//var_dump($data->dump());

?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>ExcelDumper - Ex1</title>
</head>
<body>
  <table>
    <?php foreach ($data->dump() as $rows => $row) { ?>
    <tr>
      <?php foreach ($row as $col) { ?>
        <td><?php echo $col; ?></td>
      <?php } ?>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
