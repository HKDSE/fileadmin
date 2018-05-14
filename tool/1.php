<?php  
$no =$_GET["no"];
if ($no == '')
$no ='42ac8529';

$url = 'https://www.yylep.com/f-226-d/'.$no.'.zip?pan=ty';
//$url = 'https://www.yylep.com/f-226-d/75a6a49c.zip?pan=ty';
//$url = 'https://www.google.com';
//$url = 'http://www.google.com';
$curlCh = curl_init();
curl_setopt($curlCh, CURLOPT_URL, $url);
curl_setopt($curlCh, CURLOPT_REFERER, "https://api.gzwed.cc/mdparse11/ckplayer/ckplayer.swf");
//curl_setopt($curlCh, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($curlCh, CURLOPT_SSLVERSION,3);
curl_setopt($curlCh, CURLOPT_HEADER, TRUE); 
curl_setopt($curlCh, CURLOPT_NOBODY, TRUE);
            
$curlData = curl_exec ($curlCh);

echo $curlData ;
curl_close ($curlCh);
?>