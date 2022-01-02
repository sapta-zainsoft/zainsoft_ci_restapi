<?php

  //Post Method here
  if(isset($_POST['method']) == 'login'){
      $username = $_POST['username'];
      $password = $_POST['password'];

      if($username == "admin" && $password == "admin"){
          $response = array('returned_username' => "-admin-",
                            'returned_password' => "-admin-",
                            'message' => "Your credentials are so weak [USING_POST]!",
                            'response_code' => "1");
             echo json_encode($response);

      }else{
          $response = array('response_code' => "-1",
                            'message' => "invalid username or password");                    
             echo json_encode($response);
      }
  }

    //Get Method here
  else if(isset($_GET['method']) == 'login'){
      $username = $_GET['username'];
      $password = $_GET['password'];

      if($username == "admin" && $password == "admin"){
          $response = array('returned_username' => "=admin=",
                            'returned_password' => "=admin=",
                            'message' => "Your credentials are so weak [USING_GET]!",
                            'response_code' => "1");
               echo json_encode($response);
      }else{
          $response = array('response_code' => "-1",
                            'message' => "invalid username or password");                    
             echo json_encode($response);
      }
  }

  //If no method
  else{
          $response = array('response_code' => "-2",
          'message' => "invalid method");                    
               echo json_encode($response);
  }
?>