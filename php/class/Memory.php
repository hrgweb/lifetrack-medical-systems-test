<?php

// CLASS
include_once 'Study.php';
include_once 'Storage.php';

// INTERFACE
include_once 'interface/HardwareInterface.php';

class Memory implements HardwareInterface
{
  protected $study;
  protected $storage;
  protected const PER_STUDIES = 1000;
  protected const COST_PER_THOUSAND_STUDIES = 500; // 500MB RAM
  protected const COST_GIGABYTE_RAM_PER_HOUR = 0.00553; // 0.00553 USD
  protected const PER_GIGABYTE_RAM = 1000;
  protected const NO_HOURS_PER_DAY = 24;
  protected const HOURS_PER_MONTH = 730;

  public function __construct(Study $study)
  {
    $this->study = $study;
    $this->storage = new Storage(new Study($this->study->inputs));
  }

  /**
   * == RAM ==
   * 
   * 1,000 STUDIES = 500 MB RAM
   * 1 GB RAM PER HOUR = 0.00553 USD 
   * 
   */
  public function usePerMonth()
  {
    $no_of_studies = $this->study->computeGrowthPerMonth(); // NUMBER OF STUDIES + STUDY GROWTH PER MONTH(%)
    $amount_of_ram = $no_of_studies / self::PER_STUDIES; // PER QTY = 500 MB RAM

    return self::COST_PER_THOUSAND_STUDIES * $amount_of_ram; // RAM(MB) USED
  }

  public function costPerMonth()
  {
    // RAM USED / COST GB RAM PER HOUR
    $qty = (float) $this->usePerMonth() / (float) self::PER_GIGABYTE_RAM;

    return ($qty * self::COST_GIGABYTE_RAM_PER_HOUR) * self::HOURS_PER_MONTH;
  }

  public function costForecasted()
  {
    return number_format((float) $this->costPerMonth() + (float) $this->storage->costPerMonth(), 2);
  }
}
