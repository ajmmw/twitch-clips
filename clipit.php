<?php
/* The ID is your twitch user_id NOT your channels username
   The TOKEN is your generated auth token used to created clips on your behalf see: https://twitchtokengenerator.com */
   
	$id = '';
	$token = '';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.twitch.tv/helix/clips?broadcaster_id='.$id);
	curl_setopt( $ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $token]);
	$output   = curl_exec($ch);
	$response = json_decode($output);
	curl_close($ch);
	if (!empty($response->data)) {
		echo 'Clip created: http://clips.twitch.tv/'.$response->data[0]->id;
	} 
