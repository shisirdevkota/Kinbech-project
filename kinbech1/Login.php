<?php
  $conn= new mysqli ('localhost','root','','users');
  if($conn->connect_error){
      die('Connection Failed :'.$conn->connect_error);
  }
  else{
  if($_SERVER["REQUEST_METHOD"]=="POST"){
      $email=$_POST['email'];
      $password=$_POST['password'];

      $sql="SELECT * from res Where email='$email' AND password='$password'";
      $result = mysqli_query($conn, $sql);  
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result); 
      

      if($count==1){
          header("Location: ./HomePage.html");
          exit();
          
      }else{
          echo '<script>alert("Invalide Email or Pssword")</script>';
          
      }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./Login.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Fira Sans:wght@300;700;800&display=swap"
    />
  </head>
  <body>
    <form action="" method="POST">
    <div class="login3">
      <div class="content1">
        
      </div>
      <b class="login4">LOGIN</b>
      <button type="submit" class="singin">
        <b class="sign-in">LOGIN</b>
      </button>
      <div class="for"><a href="">Forget Password ?</a>
      </div>
      <input
        class="password-bar"
        type="password"
        placeholder="Password"
        name="password"
      />

      <input
        class="email-bar"
        type="email"
        placeholder="Email"
        name="email"
      />


      <div class="frame-parent">
        <div class="i-havent-account-wrapper">
          <div class="i-havent-account">Don't have account ?</div>
        </div>
        <div class="signup-wrapper">
          <button type="submit" class="signup">
        <a class="Signup" href="SingUp.html">SIGNUP</a>
      </button>
        </div>
      </div>
      
      <div class="kinbech1">KINBECH</div>
    </div>
    </form>
  </body>
</html>
