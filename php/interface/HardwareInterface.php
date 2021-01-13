<?php

interface HardwareInterface
{
  public function usePerMonth(array $inputs);
  public function costPerMonth(array $inputs);
}
