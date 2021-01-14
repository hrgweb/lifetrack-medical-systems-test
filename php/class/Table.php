<?php

include_once 'Date.php';
include_once 'Memory.php';
include_once 'Study.php';

class Table
{
  protected $date;
  protected $memory;
  protected $study;

  public function __construct(Study $study)
  {
    $this->date = new Date();
    $this->study = $study;
    $this->memory = new Memory(new Study($this->study->inputs));
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

  protected function row()
  {
    $row = "";
    $inputs = $this->study->inputs;

    for ($i = 0; $i < (int)$inputs['monthsToForecast']; $i++) {
      $row .= "
        <tr>
          <td>{$this->date->generateDate($i)}</td>
          <td>{$this->study->displayComputedGrowthPerMonth()}</td>
          <td>$ {$this->memory->costForecasted()}</td>
        </tr>
      ";
    }

    return $row;
  }

  public function display()
  {
    $inputs = $this->study->inputs;

    $table = '<br>';
    $table .= "<table style='width:100%'>";
    $table .= $this->header();
    $table .= $this->row($inputs);
    $table .= "</table>";

    return $table;
  }
}
