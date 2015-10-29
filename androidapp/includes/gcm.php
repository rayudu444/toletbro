<?php

// API access key from Google API's Console
define('API_ACCESS_KEY', 'AIzaSyD0XVYXy-8u0GIhBrMIpVghHQfWveDEBYA');

class GCM {
    //put your code here

    // constructor

	function __construct() {

    }
  public function send_notification($gcm_regid,$message) {

  		

      $url = 'https://android.googleapis.com/gcm/send';

      $mess = array

    (

    	'message' 	=> $message

    );

      $fields = array

    (

    	'registration_ids' 	=> $gcm_regid,

    	'data'			=> $mess

    );

     

    $headers = array

    (

    	'Authorization: key=' . API_ACCESS_KEY,

    	'Content-Type: application/json'

    );

    //echo json_encode( $fields );



    // Open connection

            $ch = curl_init();

     

            // Set the url, number of POST vars, POST data

            curl_setopt($ch, CURLOPT_URL, $url);

     

            curl_setopt($ch, CURLOPT_POST, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     

            // Disabling SSL Certificate support temporarly

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

     

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $fields ));

     

            // Execute post

            $result = curl_exec($ch);

            if ($result === FALSE) {

                die('Curl failed: ' . curl_error($ch));

            }

     

            // Close connection

            curl_close($ch);

            

            return  $result;

     }

 }

// prep the bundle

?>