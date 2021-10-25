<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "formdb";

$connect = mysqli_connect($server, $user, $password, $database);

if ($connect){
  echo '<script type="text/javascript">alert("DataBase Connected Successfully . . . ! !");</script>';
};

extract($_POST);

if (isset($_POST["submit"])) {

    $Names = mysqli_real_escape_string( $connect, $_POST['name'] );
    $Emails = mysqli_real_escape_string( $connect, $_POST['email'] );
    $Password = mysqli_real_escape_string( $connect, $_POST['password'] );
    $ConfirmPassword = mysqli_real_escape_string( $connect, $_POST['confirmpassword'] );

    if($Password == $ConfirmPassword) {

        $query = "insert into registered_users (Names, Emails, Password) values ('$Names','$Emails','$Password')";
 
        $InsertData = mysqli_query($connect,$query);

        if($InsertData){
           
         ?>
           
            <script>

              alert("Signup Successfully . . . ! !");

              location.replace('./signup.html');

            </script>
         
         <?php
        
        } else {

         ?>
           
            <script>

              alert("Cann't Signup  . . . ! !");

              location.replace('./signup.html');

            </script>
         
         <?php

        };

    } else {

     ?>
        
        <script>

          alert("Password Doesn't Matchig  . . . ! !");

          location.replace('./signup.html');

        </script>
     
     <?php

    };

};

?>