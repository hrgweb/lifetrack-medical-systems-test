<?php

// CLASS
include_once 'Study.php';

// INTERFACE
include_once 'interface/HardwareInterface.php';

class Storage implements HardwareInterface
{
  protected const PER_STUDY = 1;
  protected const USE_PER_STUDY = 10;  // 10 MB STORAGE
  protected const COST_PER_GIGABYTE_PER_MONTH =  0.10; // 0.10 USD PER MONTH
  protected const PER_GIGABYTE_RAM = 1000;

  /**
   * == STORAGE ==
   * 
   * 1 STUDY = 10MB STORAGE
   * 1 GB STORAGE PER MONTH = 0.10 USD
   *
   */
  public function usePerMonth(array $inputs)
  {
    $no_of_studies = Study::computeGrowthPerMonth($inputs); // NUMBER OF STUDIES + STUDY GROWTH PER MONTH(%)

    return $no_of_studies * self::USE_PER_STUDY;
  }

  public function costPerMonth(array $inputs)
  {
    $qty_per_gb = $this->usePerMonth($inputs) / self::PER_GIGABYTE_RAM;

    return $qty_per_gb * self::COST_PER_GIGABYTE_PER_MONTH;
  }
}
