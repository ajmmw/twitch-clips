<?php

$id = '';
$client_id = '';
$access_tokrn = '';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.twitch.tv/helix/clips?broadcaster_id=' . $id);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Client-ID: ' . $client_id, 'Authorization: Bearer ' . $access_token]);
$output   = curl_exec($ch);
$response = json_decode($output);
curl_close($ch);
if (!empty($response->data)) {
	$clipurl = 'http://clips.twitch.tv/' . $response->data[0]->id;
	sleep(5);
	echo $clipurl
}
