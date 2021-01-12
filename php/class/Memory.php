<?php

class Memory
{
  const COST_PER_STUDY = 10;
  const COST_PER_1000_STUDIES = 500;
  const ONE_GB_COST_PER_HOUR = 0.00553;
  const ONE_GB_COST_PER_MONTH = 0.10;

  public function costPerStudy()
  {
    return Memory::COST_PER_STUDY;
  }

  public function oneGbCostPerHour()
  {
    return Memory::ONE_GB_COST_PER_HOUR;
  }

  public function oneGbCostPerMonth()
  {
    return Memory::ONE_GB_COST_PER_MONTH;
  }
}
