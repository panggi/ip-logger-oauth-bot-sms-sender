<?php
include("geoip.inc");
include("geoipcity.inc");
include("geoipregionvars.php");

	if (isset($HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR']) && eregi("^[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}$", 
 
$HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR'])){
		$ip = $HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR'];
	}
	else{
		$ip = getenv("REMOTE_ADDR");
	}
$gic = geoip_open("GEOAPI-01.dat",GEOIP_STANDARD);
$gi = geoip_open("GEOAPI-02.dat",GEOIP_STANDARD);
$giisp = geoip_open("GEOAPI-03.dat",GEOIP_STANDARD);
$isp = geoip_org_by_addr($giisp,$ip);
$record = geoip_record_by_addr($gi,$ip);
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Detect Your IP location with Maps, Fast detection Country , Region , City , Latitude , Longitude , Metro code , Area Code , GeoIP based " />
        <meta name="keywords" content="ip2location, ip geo location, ip to location , GeoIP , Google Maps , County , City , ISP , Organization , Panggi Libersa" />
		<title>IPLoc.co.cc | IP Geo Location Info | Country , Region , City , Latitude , Longitude , Metro code , Area Code </title>
<style>
<!--
BODY {
	font-family: Tahoma, Verdana, sans-serif;
	font-size: 11px;
	font-weight: normal;
	text-decoration: none;
	color:#000;
	background-color: #FFF;
	cursor:crosshair;

}
TABLE {
border: 1px solid #000;
font-size: 11px;
}

TD {
color:#FFCC00;
}

INPUT,TEXTAREA,SELECT {
	color:#FFCC00;
	background-color : transparent;
	scrollbar-face-color:#333333;
	scrollbar-highlight-color:#333333;
	scrollbar-3dlight-color:#000000;
	scrollbar-darkshadow-color:#000000;
	scrollbar-shadow-color:#333333;
	scrollbar-arrow-color:#000000;
	scrollbar-track-color:#333333;
	FONT-SIZE: 11px;
	FONT-FAMILY: Tahoma, Verdana, sans-serif;
}

A:link {
COLOR: #000;
FONT-SIZE: 11px;
FONT-FAMILY: Tahoma, Verdana, sans-serif;
TEXT-DECORATION: none;
background-color : transparent;
}
A:visited {
COLOR: #000;
FONT-SIZE: 11px;
FONT-FAMILY:  Tahoma, Verdana, sans-serif;
TEXT-DECORATION: none;
background-color : transparent;
}
A:hover {
COLOR: red;
FONT-SIZE: 11px;
FONT-FAMILY: Tahoma, Verdana, sans-serif;
background-color : transparent;
}
A:active {
COLOR: #000;
FONT-SIZE: 11px;
FONT-FAMILY: Tahoma, Verdana, sans-serif;
TEXT-DECORATION: none;
background-color : transparent;
}
-->
</style>
	</head>
<body>
<center>
 
<h2>Your IP : <font color="#FF0000"><?php echo $ip; ?></font></h2><?php echo $isp; ?><br><br>

<b>Your Location Based on your IP : <font color="#000066"></b><img src="flags/flag_<?php echo strtolower(geoip_country_code_by_addr($gic, $ip));?>.gif">
<?php
echo $record->country_name . "\n";
echo $GEOIP_REGION_NAME[$record->country_code][$record->region] . "\n";
echo $record->city . "\n (";
echo $record->latitude . "\n , ";
echo $record->longitude . ")\n";
echo $record->metro_code . "\n";
echo $record->area_code . "\n";
 ?>
</font>

<br /><br />
<table><tr><td>
<iframe src="http://maps.google.com/maps/api/staticmap?markers=<?php echo geoip_country_name_by_addr($gic, $ip); ?>&maptype=hybrid&size=400x300&sensor=true&key=ABQIAAAA7NPZPVvwXQRVc2bpp2-08RT9Nwn0PQu4QtSWceAfyZAhS3UOORRemkycSgioEIQW0aYaZTJIORGUQQ" width="400" height="300" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"></iframe>
<iframe src="http://maps.google.com/maps/api/staticmap?markers=<?php echo geoip_country_name_by_addr($gic, $ip); ?>,<?php print $GEOIP_REGION_NAME[$record->country_code][$record->region]; ?>&maptype=terrain&size=400x300&sensor=true&key=ABQIAAAA7NPZPVvwXQRVc2bpp2-08RT9Nwn0PQu4QtSWceAfyZAhS3UOORRemkycSgioEIQW0aYaZTJIORGUQQ" width="400" height="300" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"></iframe><br />
<iframe src="http://maps.google.com/maps/api/staticmap?markers=<?php echo geoip_country_name_by_addr($gic, $ip); ?>,<?php print $record->city; ?>&maptype=terrain&size=400x300&sensor=true&key=ABQIAAAA7NPZPVvwXQRVc2bpp2-08RT9Nwn0PQu4QtSWceAfyZAhS3UOORRemkycSgioEIQW0aYaZTJIORGUQQ" width="400" height="300" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"></iframe>
<iframe src="http://maps.google.com/maps/api/staticmap?markers=<?php print $record->latitude ;?>,<?php print $record->longitude ; ?>&maptype=hybrid&size=400x300&sensor=true&key=ABQIAAAA7NPZPVvwXQRVc2bpp2-08RT9Nwn0PQu4QtSWceAfyZAhS3UOORRemkycSgioEIQW0aYaZTJIORGUQQ" width="400" height="300" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"></iframe>
</td></tr></table>
<br><br><a href="http://twitter.com/panggi">Panggi Libersa</a>
</center>
	</body>
</html>
 
<?php
$consumer_key = "cunsumer-key";
$consumer_secret = "consumer-secret";
$access_key = "access-key";
$access_secret = "access-secret";
 
require_once('oauth/twitteroauth/twitteroauth.php');
 
$connection = new TwitterOAuth ($consumer_key ,$consumer_secret , $access_key , $access_secret );
 
$connection->post('statuses/update', array('status' => 'IP : '. $ip .' '. $isp .','. $record->country_name .','. $GEOIP_REGION_NAME[$record->country_code][$record->region] .','. $record->city .', ('. $record->latitude .','. $record->longitude.') #iploc'));


geoip_close($gic);
geoip_close($gi); 
geoip_close($giisp);

?>
