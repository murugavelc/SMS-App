<?php
function gcm_notification($devic_id,$msg)
{
    //$server_key = 'AAAAXK4EON8:APA91bFlNOhvdosx4-j8GYP_1nlOs6zKnixYZuNz5YzaJysc4A01IPAQHW3pOyKYr1Z75GXQhLWBdqBc2ykxkh4TAwPn55VZjruC5_ioJ4jaktFF1ePPFcYXEYfvnmQSfD4hun8XagVO'; // Server key for the project FCM
    $server_key = 'AAAAfRSbyhs:APA91bH1j0pi0HgfZ3dYPlXwDn8sKAuLL76qyWxaXHes7yTCzY2u83YsE7MVorze_Ntu_OVeh-8B41LgytCBacaT5tUFElR4fe-SfkNlRRun2AQdpQJg4ScmAaxvvYMDU3bEDGeBF7vQ';
    //$device_id = 'd9r4TwXhqJk:APA91bHmi6CQObnRo-g9_hsdfwjZE_yGDmNY_X2n_dbyZNF8lqRZb2mYq6fNnEs1r8clJl_U8au_W0l1IT78sdpfbDEMrTDkdiQf2GORsXT67HMKlsygw5efBG_89a2kWJ43icHLjP2V'; // unique android phone device id
    $device_id = $devic_id;

    $reg_token = array($device_id);
    $message = $msg; //message for send notification

    //Creating a message array
    $res = array();

    $res =array(
        'title' => 'Message from SMS Chat',
        'body' => $message
    );


    //Creating a new array fileds and adding the msg array and registration token array here
    $fields = array
    (
        'to' => $device_id,
        'notification' => $res,
        'priority' => 'high'
    );

//Adding the api key in one more array header
    $headers = array
    (
        'Authorization: key=' . $server_key,
        'Content-Type: application/json'
    );

    //Using curl to perform http request
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    //Getting the result
    $result = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Show Error Notofication
    if ($status == 400) {
        return('Check that the JSON message is properly formatted and contains valid fields.');
    } else if ($status == 401) {
        return('The sender account used to send a message could not be authenticated.');
    } else if ($status == 500) {
        return('The server encountered an error while trying to process the request.');
    } else if ($status == 503) {
        return('The server could not process the request in time.');
    } else if ($status != 200) {
        return($result);
    }

    //Decoding json from result
    $res = json_decode($result);

    //Getting value from success
    $flag = $res->success;
    //if success is 1 means message is sent

    if ($flag == 1) {
        return "send";
    } else {
        return "not-send";
    }

}
