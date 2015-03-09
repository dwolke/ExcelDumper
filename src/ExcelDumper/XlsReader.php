<?php
/**
 * ExcelDumper (http://www.dw-labs.de/ExcelDumper)
 *
 * @author     Daniel Wolkenhauer <dw@dwolke.de>
 * @copyright  Copyright (c) 2005-2015 Daniel Wolkenhauer
 * @link       http://github.com/dwolke/ExcelDumper
 * @version    0.1.1
 */

namespace ExcelDumper;

use ExcelDumper\XlsParser;

/**
* 
*/
class XlsReader
{

  protected $excelDocument;

  /**
   * @var array
   */
  protected $sheets = array();

  /**
   * Konstruktor
   *
   * @param string $file Name der Exceldatei
   * @param bool $storeExtendedInfo unklar: erweiterte Infos speichern ???
   * @param string $outputEncoding unklar: Zeichensatz für Output ???
   */
  public function __construct($file = '') {
    
    if ($file === '') {
      throw new \RuntimeException('Dateiname darf nicht leer sein.', 1);
    }

    if (!file_exists($file)) {
      throw new \RuntimeException('Die angegebene Datei wurde nicht gefunden.', 1);
    }

    mb_internal_encoding('8bit');

    //$this->excelDocument = 'ein Exceldocument';

    $this->excelDocument = new XlsParser($file);
    $this->sheets = $this->excelDocument->getSheets();

    //var_dump($this->sheets[0]);

  }

  public function sheetCount()
  {
    return count($this->sheets);
  }

  public function rowCount($sheet = 0)
  {
    return $this->sheets[$sheet]['numRows'];
  }

  public function columnCount($sheet = 0)
  {
    return $this->sheets[$sheet]['numCols'];
  }

  public function getFileInfo()
  {
    // code
  }

  public function dump($sheet = 0)
  {
    
    $ret = [];

    for ($row = 1; $row <= $this->rowCount($sheet); $row ++) {

      $columns = null;

      for ($col = 1; $col <= $this->columnCount($sheet); $col ++) {
        $columns[$col] = $this->val($row, $col, $sheet);
      }
      
      $ret[$row] = $columns;

    }

    return $ret;
  }

  public function val($row, $col, $sheet = 0)
  {

    //$col = $this->getCol ($col);
    
    if (array_key_exists($row, $this->sheets[$sheet]['cells']) && array_key_exists($col, $this->sheets[$sheet]['cells'][$row])) {
      return $this->sheets[$sheet]['cells'][$row][$col];
    }

    return '';

  }

  public function value($row, $col, $sheet = 0)
  {
    // code
  }

  public function info($row, $col, $type, $sheet = 0)
  {
    // code
  }

  public function raw($row, $col, $sheet = 0)
  {
    // code
  }

  public function format($row, $col, $sheet = 0)
  {
    // code
  }

  public function formatIndex($row, $col, $sheet = 0)
  {
    // code
  }

  public function xfRecord($row, $col, $sheet = 0)
  {
    // code
  }

  public function xfProperty($row, $col, $sheet = 0, $property)
  {
    // code
  }
  

}
