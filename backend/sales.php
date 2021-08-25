<?php

ob_start();

session_start();

include "connect.php";

class Sales
{
    public static function AddSales()
    {
        global $conn;

        $name = mysqli_real_escape_string($conn , $_POST['name'] );
        $phone = mysqli_real_escape_string($conn , $_POST['phone'] );
        $email = mysqli_real_escape_string($conn , $_POST['email'] );
        $country = mysqli_real_escape_string($conn , $_POST['country'] );
        $city = mysqli_real_escape_string($conn , $_POST['city'] );
        $address = mysqli_real_escape_string($conn , $_POST['address'] );
        $paying = mysqli_real_escape_string($conn , $_POST['paying'] );

        $sql = "INSERT INTO sales (number , name , email , country , city , address, paying) VALUES ('$phone' , '$name' , '$email' , '$country' , '$city' , '$address' , '$paying')";
        $result = mysqli_query($conn , $sql);

        if($result)
        {
            echo '<script type="text/javascript">
            location.replace("../dashboard/sales.php");
            </script>';
        }
        else
        {
            echo '<script>alert("Problem happened! please try again");';
        }
    }

    public static function DeleteSales()
    {
        global $conn;
        $script = $_POST['script'];
        $id = $_POST['delete_id'];

        $request =  mysqli_query($conn , "SELECT FROM sales WHERE id = $id");
        if(!empty($request))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../dashboard/sales.php");
			  </script>';
            die(); 
        }
        if(!empty($script))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../dashboard/sales.php");
			  </script>';
            die();
        }

        $sql = "DELETE FROM sales WHERE id= $id";

        if (mysqli_query($conn, $sql)) {

        $_SESSION['message'] = "course was deleted";
        echo '<script type="text/javascript">
				location.replace("../dashboard/sales.php");
			  </script>';

        }
    }
}

if(isset($_POST['add']))
{
    Sales::AddSales();
}

if(isset($_POST['delete']))
{
    Sales::DeleteSales();
}