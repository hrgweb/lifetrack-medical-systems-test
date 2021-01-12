<?php

include_once 'Date.php';

class Table
{
  protected $dt;

  public function __construct()
  {
    $this->dt = new Date();
  }

  protected function header()
  {
    return "
      <tr>
        <th>Date</th>
        <th>Number of Studies</th>
        <th>Cost Forecasted</th>
      </tr>
    ";
  }

  protected function row(array $inputs)
  {
    $data = [
      'one',
      'two',
      'three'
    ];

    $row = "";

    for ($i = 0; $i < (int)$inputs['monthsToForecast']; $i++) {
      $row .= "
        <tr>
          <td>{$this->dt->generateDate($i)}</td>
          <td>{$inputs['studyPerDay']}</td>
          <td>{$data[2]}</td>
        </tr>
      ";
    }

    return $row;
  }

  public function display(array $inputs)
  {
    $table = '<br>';
    $table .= "<table style='width:100%'>";
    $table .= $this->header();
    $table .= $this->row($inputs);
    $table .= "</table>";

    return $table;
  }
}
