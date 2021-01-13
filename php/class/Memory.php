<?php

include_once 'Study.php';

class Memory
{
  // private $study;

  // protected const COST_PER_STUDY = 10;  // 10mb
  // protected const COST_PER_1000_STUDIES = 500; // 500mb
  // protected const ONE_GB_COST_PER_HOUR = 0.00553;
  // protected const ONE_GB_COST_PER_MONTH = 0.10;

  protected const PER_STUDIES = 1000;
  protected const COST_PER_THOUSAND_STUDIES = 500; // 500MB RAM
  protected const COST_GIGABYTE_RAM_PER_HOUR = 0.00553; // 0.00553 USD

  // public function __construct()
  // {
  //   $this->study = new Study();
  // }


  /**
   * ====== NOTE ======
   * 
   * == RAM ==
   * 1,000 STUDIES = 500 MB RAM
   * 1 GB RAM PER HOUR = 0.00553 USD 
   * 
   * == STORAGE ==
   * 1 STUDY = 10MB STORAGE
   * 1 GB STORAGE PER MONTH = 0.10 USD
   * 
   */
  public static function computeRamUsed(array $inputs)
  {
    $no_of_studies = Study::computeGrowthPerMonth($inputs); // NUMBER OF STUDIES + STUDY GROWTH PER MONTH
    $qty_of_ram = $no_of_studies / Memory::PER_STUDIES; // PER QTY = 500 MB RAM

    return (float) Memory::COST_PER_THOUSAND_STUDIES * $qty_of_ram . ' mb ram'; // RAM(MB) USED
  }
}
