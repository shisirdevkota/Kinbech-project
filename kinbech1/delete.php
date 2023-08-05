<?php 

$conn = new mysqli('localhost','root','','users'); 
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM `res` WHERE `id`='$id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>
