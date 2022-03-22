<?php 
header("Content-Type: application/json");
function response($status, $data){
    header("HTTP/1.1 ".$status);
    $response['status'] = $status;
    $response['data'] = $data;
    $json = json_encode($response);
    echo $json;
}
function rand_array($array){
    $count = count($array)-1;
    return $array[rand(0,$count)];
}
/*
ENDPOINTS
https://api.wclarke.dev/v2/?key=******&end=image&content=random-duck
*/
if ($_SERVER['REQUEST_METHOD']=='GET'){
    $api_key = $_GET['key'];
    $endpoint = $_GET['end'];
    $content = $_GET['content'];
    switch ($api_key){
        case "wclarkey":
            switch($endpoint){
                case "image":
                    switch($content){
                        case "random-duck":
                            $duck_urls = [
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
                            ];
                            $random_duck = rand_array($duck_urls);
                            response(200, $random_duck);
                        break;
                        default:
                            response(400, "Invalid content type");
                    }
                    break;
                default:
                    response(400, "Invalid endpoint");
            }
        break;
        default:
            response(400, "Invalid api credentials");
    }
   
}