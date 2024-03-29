<?php
/**
 * Created by PhpStorm.
 * User: plagu33
 * Date: 12/23/18
 * Time: 7:25 PM
 */

function FcmNotification($title,$body,$token,$actividad=null,$extra_data=null)
{

    //$actividad  ejemplo "cl.mmerino.counicados.horario"
    $fcmUrl   = config("app.fcmurl"); //url
    $fcmtoken = config("app.fcmtoken"); //Legacy server key

    $notification = [
        "title" => $title,
        "body" => $body,
        "android_channel_id" => "1986",
        "sound" => "default",
        "color" => "#2196F3",
        "click_action" => $actividad
    ];

    $fcmNotification = [
        //'registration_ids' => $tokenList, //multple token array
        'to'        => $token, //single token
        'notification' => $notification,
        'data' => $extra_data
    ];

    $headers = [
        'Authorization: key='.$fcmtoken,
        'Content-Type: application/json'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$fcmUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
    $result = curl_exec($ch);
    curl_close($ch);

    return true;

}
