<?php
    $api_key = 'AAAAXK4EON8:APA91bFlNOhvdosx4-j8GYP_1nlOs6zKnixYZuNz5YzaJysc4A01IPAQHW3pOyKYr1Z75GXQhLWBdqBc2ykxkh4TAwPn55VZjruC5_ioJ4jaktFF1ePPFcYXEYfvnmQSfD4hun8XagVO'; // api key for the project api key
    $reg_tok = 'd9r4TwXhqJk:APA91bHmi6CQObnRo-g9_hsdfwjZE_yGDmNY_X2n_dbyZNF8lqRZb2mYq6fNnEs1r8clJl_U8au_W0l1IT78sdpfbDEMrTDkdiQf2GORsXT67HMKlsygw5efBG_89a2kWJ43icHLjP2V'; // unique android phone app token

    $mess = 'Test Notification'; //message for send notification
    $reg_token = array($reg_tok);
    $message = $mess;
    //Creating a message array

    $msg = array
    (
        'message' => $message,
        'title' => 'Message from Simplified Coding',
        'subtitle' => 'Android Push Notification using GCM Demo',
        'tickerText' => 'Ticker text here...Ticker text here...Ticker text here',
        'vibrate' => 1,
        'sound' => 1,
        'largeIcon' => 'large_icon',
        'smallIcon' => 'small_icon'
    );
    //Creating a new array fileds and adding the msg array and registration token array here
    $fields = array
    (
        'registration_ids' => $reg_token,
        'data' => $msg
    );


//Adding the api key in one more array header
    $headers = array
    (
        'Authorization: key=' . $api_key,
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
        echo('Check that the JSON message is properly formatted and contains valid fields.');
    } else if ($status == 401) {
        echo('The sender account used to send a message could not be authenticated.');
    } else if ($status == 500) {
        echo('The server encountered an error while trying to process the request.');
    } else if ($status == 503) {
        echo('The server could not process the request in time.');
    } else if ($status == 200) {
        echo($result);
    }

    //Decoding json from result
    $res = json_decode($result);

    //Getting value from success
    $flag = $res->success;
    //if success is 1 means message is sent

    if ($flag == 1) {
        echo "send";
    } else {
        echo "not-send";
        }