<?php
header("Content-Type: application/json");

function response($status,$status_message, $data){
    header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}
function data(){
    $a = array(
        'https://api.wclarke.dev/media/duck1.jpg',
        'https://api.wclarke.dev/media/duck2.jpg',
        'https://api.wclarke.dev/media/duck3.jpg',
        'https://api.wclarke.dev/media/duck4.jpg',
        'https://api.wclarke.dev/media/duck5.jpg',
        'https://api.wclarke.dev/media/duck6.jpg',
        'https://api.wclarke.dev/media/duck7.jpg',
        'https://api.wclarke.dev/media/duck8.jpg',
        'https://api.wclarke.dev/media/duck9.jpg',
        'https://api.wclarke.dev/media/duck10.jpg',
        'https://api.wclarke.dev/media/robs_duck.jpg'
        );
    $rand = rand(0,10);
    return $a[$rand];
}
if ($_SERVER['REQUEST_METHOD']=='GET'){
    $rand_duck = data();
    response(200, "Ducks", $rand_duck);
}