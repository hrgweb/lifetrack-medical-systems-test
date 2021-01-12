<?php

class Date
{
  protected function month($month)
  {
    $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    return $months[$month];
  }

  protected function currentYear()
  {
    return date('Y');
  }

  public function generateDate($month)
  {
    return $this->month($month) . ' ' . $this->currentYear();
  }
}
