<?php

include_once 'Date.php';
include_once 'Study.php';
include_once 'Memory.php';
include_once 'Storage.php';

class Table
{
  protected $date;

  public function __construct()
  {
    $this->date = new Date();
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
    $row = "";
    $studyPerDay = number_format($inputs['studyPerDay']);
    $growthPerMonth = number_format(Study::computeGrowthPerMonth($inputs));
    $costForecasted = number_format((float) Memory::costPerMonth($inputs) + (float) Storage::costPerMonth($inputs), 2);

    for ($i = 0; $i < (int)$inputs['monthsToForecast']; $i++) {
      $row .= "
        <tr>
          <td>{$this->date->generateDate($i)}</td>
          <td>{$studyPerDay} ({$growthPerMonth})</td>
          <td>$ {$costForecasted}</td>
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
