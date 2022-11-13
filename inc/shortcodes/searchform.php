<?php
//dynamic year
add_shortcode('searchform', 'searchform');
function searchform() {
  
  return '<form role="search" method="get" id="searchform" class="searchform" action="http://launchpad.kimdev.com/">
            <label class="screen-reader-text" for="s">Search for:</label>
            <input type="text" value="" name="s">
            <input type="submit" value="Search" class="button">
          </form>';
}


?>