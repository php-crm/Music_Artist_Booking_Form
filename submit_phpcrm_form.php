<?php
if(ISSET($_POST))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];
  $artist_name=$_POST['artist_name'];
  $venue_name=$_POST['venue_name'];
  $address=$_POST['address'];
	$city=$_POST['city'];
  $state=$_POST['state'];
  $zip_code=$_POST['zip_code'];
  $country=$_POST['country'];
  $Website=$_POST['Website'];
	$event_name=$_POST['event_name'];
  $event_date_time=$_POST['event_date_time'];
  $dj_gear=$_POST['dj_gear'];
  $specify_dj_gear=$_POST['specify_dj_gear'];
  
  $field1="<b>Artist to Book:</b> ".$artist_name."<br>"."<b>Venue Name:</b> ".$venue_name."<br>"."<b>Address: </b>"."<br>"."Street: ".$address."<br>"."City: ".$city."<br>"."State: ".$state."<br>"."Zip Code: ".$zip_code."<br>"."Country: ".$country."<br>"."<b>Website:</b> ".$Website."<br>"."<b>Event Name:</b> ".$event_name."<br>"."<b>Event Date And Time:</b> ".$event_date_time."<br>"."<b>Do you have your own DJ gear?:</b> ".$dj_gear."<br>"."<b>Specification Of DJ Gear:</b> ".$specify_dj_gear;

}
else
{
echo "Thanks";	
exit();	
}
$Token_Key='#'; // Located in admin section under setup
$WebURL='#'; // CRM Url like https://www.abc.com/crm-folder
//Lead Fields
$post_data=array('name'=>$name,'phone'=>$phone,'field_1'=>$field1);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:thanks.php");
exit();
//echo $response;
?>