<?php 
header("Content-Type: application/json");
function response($status, $data, $status_message){
    if(empty(trim($status_message))){
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
    }
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;
    $json = json_encode($response);
    echo $json;
}