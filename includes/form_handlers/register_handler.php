<?php
 // declaring variables 
$fullname = "";// full name
$Email = ""; // Email
$Password = "";// password 
$CPassword = "";// C . password 
$date = "" ;//sign up date 
$error_array = array();// holds error messages 

if(isset($_POST['register_button'])){

    //registration form values
    
    //Full Name 
    $fullname = strip_tags($_POST['fullname']);// remove html tags  
    $fullname = str_replace(' ','',$fullname);// remove spaces 
    $fullname = ucfirst(strtolower($fullname));//Uppercase first letter
    $_SESSION['fullname'] = $fullname;// stores full name name into sesssion varible 
    
    //email 
    $Email = strip_tags($_POST['email']);// remove html tags 
    $Email = str_replace(' ','',$Email);// remove spaces 
    $Email = ucfirst(strtolower($Email));//Uppercase first letter
    $_SESSION['email'] = $Email;// stores Email into sesssion varible 
    
    //password 

    $Password = strip_tags($_POST['password']);// remove html tags 
    $CPassword = strip_tags($_POST['confirmpassword']);// remove HTML tags 

    $date = date("Y-m-d"); // current date 

    // check if email is in valid format 
    if(filter_var($Email,FILTER_VALIDATE_EMAIL)){
          $Email = filter_var($Email,FILTER_VALIDATE_EMAIL);
          //check if email aleady exist 
          $e_check = mysqli_query($con , "SELECT email FROM users WHERE email = '$Email'");

         //count the number of rows returend 
          $num_rows = mysqli_num_rows($e_check);

          if($num_rows> 0 ){
              array_push($error_array,"Email already in use<br> ");
              
          }
    }
    else{
        array_push($error_array,"invalid format <br>"); 
    }

    // check valid full name 

    if(strlen($fullname) > 50 || strlen($fullname) < 2 ){
        array_push($error_array,"this name  is too short or too long <br>");
        
    }

    // check password 

    if($Password != $CPassword){
        array_push($error_array, "your password do not match <br>");
        
    }
    else {
        if(preg_match('/[^A-Za-z0-9]/',$Password)){
            array_push($error_array," your password can only conatin english characters or number <br>");
            
        }

    }
    if((strlen($Password) > 30) || (strlen($Password) < 5)){
        array_push($error_array ,"your password is too short or too long <br>" );
       
    }
    if(empty($error_array)){
      $Password = md5($Password); // Encrypte password before sending to database 

      //Generate username 

      $username = strtolower($fullname);
      
      $check_username_query = mysqli_query($con , "SELECT username FROM users WHERE username = '$username'");

      
      // if username exists add numbers to username 
      $i = 0;
      while(mysqli_num_rows($check_username_query) != 0){
        $i++;//add 1 to i 
        $username = $username . "_" . $i;
      $username = strtolower($fullname);
      $check_username_query = mysqli_query($con ,"SELECT username FROM users WHERE username = '$username'");

      
      }


      //Profile picture assigment 
      $rand = rand(1,5);
      if($rand == 1){
        $profile_pic = "img/default/1.png";
      }else if($rand == 2){
        $profile_pic = "img/default/2.png";
      }else if($rand == 3){
        $profile_pic = "img/default/3.png";
      }else if($rand == 4){
        $profile_pic = "img/default/4.png";
      }else if($rand == 5 ){
        $profile_pic = "img/default/5.png";
      }

      $query = mysqli_query($con , "INSERT INTO users VALUES ('','$fullname','$username','$Email','$Password','$date','$profile_pic','no')");
      array_push($error_array, "sing up successfully <br>");

      // Clear session variables 
     $_SESSION['fullname'] = "";
     $_SESSION['email'] = ""; 

    }

}



?>