<html>
<title>抓天氣</title>
<style type="text/css">
<!--
body {
    color:#3233EF;
    margin: 0px;
}
-->
</style>
<html>
<body width="717" height="186"><font size="4">
 
<?php
$contents = file_get_contents("http://realtek.accu-weather.com/widget/realtek/weather-data.asp?location=cityId:315040");
$result = array();
preg_match_all("/</?temperature>(.*?)</?temperature>/", $contents, $temperature,PREG_SET_ORDER); //溫度
preg_match_all("/</?realfeel>(.*?)</?realfeel>/", $contents, $realfeel,PREG_SET_ORDER); //體感溫度
preg_match_all("/</?weathertext>(.*?)</?weathertext>/", $contents, $weathertext,PREG_SET_ORDER); //天氣敘述
preg_match_all("/</?windspeed>(.*?)</?windspeed>/", $contents, $windspeed, PREG_SET_ORDER);//風速
preg_match_all("/</?weathericon>(.*?)</?weathericon>/", $contents, $weathericon, PREG_SET_ORDER);//天氣小圖
 
echo "溫度:".$temperature[1];
echo "<br>";
echo "體感溫度:".$realfeel[1];
echo "<br>";
echo "敘述:".$weathertext[1];
echo "<br>";
echo "風速:".$windspeed[0][1];
echo "<hr>";
echo "<img src='http://api.accuweather.com/developers/Media/Default/WeatherIcons/".$weathericon[0][1]."-s.png'>";
echo "<br>";
?>
 
</font>
</body>
</html>