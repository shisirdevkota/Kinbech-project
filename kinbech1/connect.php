<?php
    //data
    $firstname= $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $cpassword=$_POST['cpassword'];

    //database connction 
    $conn = new mysqli('localhost','root','','users',); 
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    else{//check email 
        $SELECT="SELECT email from res Where email = ? limit 1"; 
        $INSERT = "INSERT INTO res (firstname, lastname, email, password,cpassword)
             values(?,?,?,?,?)"; 

             $stmt = $conn->prepare($SELECT);
             $stmt->bind_param("s",$email);
             $stmt->execute();
             $stmt->bind_result($email);
             $stmt->store_result();
             $rnum=$stmt->num_rows;

             if($rnum==0){
                $stmt->close();

                $stmt=$conn->prepare($INSERT);
                $stmt->bind_param("sssss",$firstname,$lastname,$email,$password,$cpassword);
                $stmt->execute();
                echo"New record sucessfully";
                header("Location: ./Login.php");
                exit(); 
             }else{
                echo "Someone already register using this email";
             }
             $stmt->close();
             $conn->close();


    }

?>