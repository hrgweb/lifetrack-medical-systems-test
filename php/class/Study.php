<?php

class Study
{
  public static function computeGrowthPerMonth(array $inputs)
  {
    $study_per_day = (float) $inputs['studyPerDay'];
    $inputted_growth_per_month = (float) $inputs['studyGrowthPerMonth'];

    $percentage_growth = ($study_per_day * $inputted_growth_per_month) / 100;

    return $study_per_day + $percentage_growth;
  }
}
