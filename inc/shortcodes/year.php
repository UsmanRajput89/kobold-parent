<?php
//dynamic year
add_shortcode('year', 'year_shortcode');
function year_shortcode() {
  $year = date('Y');
  return $year;
}


?>