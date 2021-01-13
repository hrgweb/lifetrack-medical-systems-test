<?php

interface HardwareInterface
{
  public static function usePerMonth(array $inputs);
  public static function costPerMonth(array $inputs);
}
