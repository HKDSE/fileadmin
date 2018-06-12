<?php
// ---------------------------
// Edit variables (3 variables)
// ---------------------------
// File to split, is its not in the same folder with filesplit.php, full path is required.
$filename = "http://.zip"; 
// Target folder. Splitted files will be stored here. Original file never gets touched.
// Do not append slash! Make sure webserver has write permission on this folder.
$targetfolder = '/opt/app-root/src/tmp';
// File size in Mb per piece/split. 
// For a 200Mb file if piecesize=10 it will create twenty 10Mb files
$piecesize = 100; // splitted file size in MB




// ---------------------------
// Do NOT edit this section
// ---------------------------
$buffer = 1024;
$piece = 1048576*$piecesize;
$current = 0;
$splitnum = 1;
if(!file_exists($targetfolder)) {
 if(mkdir($targetfolder)) {
  echo "Created target folder $targetfolder".br();
 }
}
if(!$handle = fopen($filename, "rb")) {
 die("Unable to open $filename for read! Make sure you edited filesplit.php correctly!".br());
}
$base_filename = basename($filename);
$piece_name = $targetfolder.'/'.$base_filename.'.'.str_pad($splitnum, 3, "0", STR_PAD_LEFT);
if(!$fw = fopen($piece_name,"w")) {
 die("Unable to open $piece_name for write. Make sure target folder is writeable.".br());
}
echo "Splitting $base_filename into $piecesize Mb files ".br()."(last piece may be smaller in size)".br();
echo "Writing $piece_name...".br();
while (!feof($handle) and $splitnum < 999) {
 if($current < $piece) {
  if($content = fread($handle, $buffer)) {
   if(fwrite($fw, $content)) {
    $current += $buffer;
   } else {
    die("filesplit.php is unable to write to target folder. Target folder may not have write permission! Try chmod +w target_folder".br());
   }
  }
 } else {
  fclose($fw);
  $current = 0;
  $splitnum++;
  $piece_name = $targetfolder.'/'.$base_filename.'.'.str_pad($splitnum, 3, "0", STR_PAD_LEFT);
  echo "Writing $piece_name...".br();
  $fw = fopen($piece_name,"w");
 }
}
fclose($fw);
fclose($handle);
echo "Done! ".br();
exit;
function br() {
 return (!empty($_SERVER['SERVER_SOFTWARE']))?'<br>':"\n";
}
?> 
