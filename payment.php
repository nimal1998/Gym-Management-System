<?php

    if($_POST['tokenId']) {

      require_once('vendor/autoload.php');
    require_once("db_connect.php");
      //stripe secret key or revoke key
      $stripeSecret = 'sk_test_j5k0976GOLSOtiRzbDLpKqat00og5iM3cY';

      // See your keys here: https://dashboard.stripe.com/account/apikeys
      \Stripe\Stripe::setApiKey($stripeSecret);

     // Get the payment token ID submitted by the form:
      $token = $_POST['tokenId'];

      // Charge the user's card:
      $charge = \Stripe\Charge::create(array(
          "amount" => $_POST['amount'],
          "currency" => "usd",
          "description" => "stripe integration in PHP with source code - tutsmake.com",
          "source" => $token,
       ));

$id=$_POST['id'];
$uid=$_POST['uid'];
$sql="insert into  user_packages (id,member_id) values('$id','$uid')";
$res=mysqli_query($conn,$sql);




       // after successfull payment, you can store payment related information into your database

        $data = array('success' => true, 'data'=> $charge);
        $sql="insert into  transaction (id,member_id,mode,amount,ref) values($id,$uid,'Stripe','$charge->amount','$charge->id')";
        $res=mysqli_query($conn,$sql);
        echo json_encode($data);
}
