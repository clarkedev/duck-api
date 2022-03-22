<?php 
header("Content-Type: application/json");
function response($status, $data){
        switch ($status){
            case 200:
                $status_message = "ok";
                break;
            case 400:
                $status_message = "bad request";
                break;
            case 404:
                $status_message = "not found";
            break;
            case 403:
                $status_message = "forbidden";
                break;
            case 500:
                $status_message = "server error";
        }
    $response['status'] = $status;
    $response['status_message'] = $status_message;
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
    if (empty(trim($api_key))) response(400, "Missing api credentials");
    if (empty(trim($endpoint))) response(400, "Missing endpoint");
    if (empty(trim($content))) response(400, "Missing content type");
    if ($api_key != 'will8') response(400, "Invalid api credentials");
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
}