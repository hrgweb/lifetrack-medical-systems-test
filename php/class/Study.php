<?php

include_once 'Memory.php';
include_once 'Storage.php';
class Study
{
  protected $memory;
  protected $storage;

  public function __construct()
  {
    $this->memory = new Memory();
    $this->storage = new Storage();
  }

  public static function computeGrowthPerMonth(array $inputs)
  {
    $study_per_day = (float) $inputs['studyPerDay'];
    $inputted_growth_per_month = (float) $inputs['studyGrowthPerMonth'];

    $percentage_growth = ($study_per_day * $inputted_growth_per_month) / 100;

    return $study_per_day + $percentage_growth;
  }

  public function costForecasted(array $inputs)
  {
    return number_format((float) $this->memory->costPerMonth($inputs) + (float) $this->storage->costPerMonth($inputs), 2);
  }
}
