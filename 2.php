<?php  
$no =$_GET["no"];if ($no == '')$no ='http://www.google.com';
$url =$no;$homepage = file_get_contents( $url );
    $homepage= str_replace('<a href="http', '<a href="?no=http', $homepage);    $homepage= str_replace('<a href="/', '<a href="?no='.$no.'/', $homepage);

echo $homepage;?><form action="2.php" method="get"> no: <input type="text" name="no"><br><input type="submit"></form>
