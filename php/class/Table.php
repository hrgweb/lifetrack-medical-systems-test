<?php

include_once 'Date.php';
include_once 'Study.php';

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
    $growthPerMonth = Study::computeGrowthPerMonth($inputs);

    for ($i = 0; $i < (int)$inputs['monthsToForecast']; $i++) {
      $row .= "
        <tr>
          <td>{$this->date->generateDate($i)}</td>
          <td>{$inputs['studyPerDay']} ({$growthPerMonth})</td>
          <td>{$growthPerMonth}</td>
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
