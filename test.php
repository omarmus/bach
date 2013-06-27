<?php 
  $height = str_replace('px', '', '202px');
  $line_height = $height - $height*.3*2;
  $line_height = $line_height > 12 ? $line_height : 12;
  $font_size = $line_height / 1.2;
  echo "LH: " . $line_height . " - FS: ". $font_size;
?>