<?php 
  function randomConfirmationNum() {
   $stamp = date("Ymdhis");
    $random_id_length = 6;
    $rndid = generateRandomString( $random_id_length );

    return $orderid = $stamp ."-". $rndid;
      //echo($orderid);
	//echo strlen ($orderid); srting lenght 32
  } 

    function generateRandomString($length = 10) {
      $characters = '0123456789';
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
      return $randomString;
    }
   //caling function
  $d = randomConfirmationNum();