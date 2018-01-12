<?php  
$no =$_GET["no"];if ($no == '')$no ='050127b7';
$url ='https://tools.keycdn.com/curl-query.php?url=https%3A%2F%2Fapi.123fanyi.cc%2Ff-7-d%2F'.$no.'.mp4&referrer=https%3A%2F%2Fapi.gzwed.cc';$homepage = file_get_contents( $url );
if(strpos($homepage, "location: ")==true){
$homepage= str_replace('location: ', '<a href="', $homepage);
$homepage= str_replace('x-powered-by', '">HERE............</a>', $homepage);
}
echo $homepage;
?>
<form action="1.php" method="get">
no: <input type="text" name="no"><br>
<input type="submit"></form>
