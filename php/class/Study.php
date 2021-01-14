<?php

class Study
{
  public $inputs;

  public function __construct(array $inputs)
  {
    $this->inputs = $inputs;
  }

  public function computeGrowthPerMonth()
  {
    $study_per_day = (float) $this->inputs['studyPerDay'];
    $inputted_growth_per_month = (float) $this->inputs['studyGrowthPerMonth'];

    $percentage_growth = ($study_per_day * $inputted_growth_per_month) / 100;

    return $study_per_day + $percentage_growth;
  }

  public function displayComputedGrowthPerMonth()
  {
    $studyPerDay = number_format($this->inputs['studyPerDay']);
    $growthPerMonth = number_format($this->computeGrowthPerMonth());

    return $studyPerDay . ' (' . $growthPerMonth . ')';
  }
}
