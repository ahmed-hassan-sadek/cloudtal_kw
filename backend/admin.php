<?php

ob_start();

session_start();

include "connect.php";

class Admin
{

    public static function LoginAdminAr()
    {
        global $conn;
        $password = mysqli_real_escape_string($conn , md5($_POST['password']) );
        $email = mysqli_real_escape_string($conn , $_POST['email'] );

        $sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn , $sql);
        $data = $result->fetch_assoc();
        if($data)
        {
            $_SESSION['kwAdmin']=true;
            $_SESSION['email'] = $data['email'];
            $_SESSION['first_name']=$data['name'];
            $_SESSION['last_name']=$data['number'];
            $userId = $data['id'];
            
            echo '<script type="text/javascript">
            location.replace("../dashboard/index.php");
            </script>';
        }
        else
        {
            echo '<script>alert("Email or password is wrong. Please try again")</script>';
        }
    }

    //

    public static function LoginAdminEn()
    {
        global $conn;
        $password = mysqli_real_escape_string($conn , md5($_POST['password']) );
        $email = mysqli_real_escape_string($conn , $_POST['email'] );

        $sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn , $sql);
        $data = $result->fetch_assoc();
        if($data)
        {
            
            $_SESSION['kwAdmin']=true;
            $_SESSION['email'] = $data['email'];
            $_SESSION['name']=$data['name'];
            $_SESSION['phone']=$data['number'];
            $userId = $data['id'];
            
            echo '<script type="text/javascript">
            location.replace("../dashboard/index.php");
            </script>';
        }
        else
        {
            echo '<script>alert("Email or password is wrong. Please try again")</script>';
        }
    }

    //

    public static function AddAdmin()
    {
        global $conn;
        
        $name = mysqli_real_escape_string($conn , $_POST['name'] );
        $phone = mysqli_real_escape_string($conn , $_POST['phone'] );
        $email = mysqli_real_escape_string($conn , $_POST['email'] );
        $password = mysqli_real_escape_string($conn , md5($_POST['password'] ));

        $query = "INSERT INTO admins (email , password , name , number) VALUES ('$email' , '$password' , '$name' , '$phone' )";

        $result = mysqli_query($conn , $query);

        if($result)
        {
            $check_email = "SELECT * FROM admins WHERE email = '$email'";
            $result = mysqli_query($conn , $check_email);
            $data = $result->fetch_assoc();

            if($data)
            {
                $_SESSION['kwAdmin']=true;
                $_SESSION['name'] = $data['name'];
                $_SESSION['email']= $data['email'];
                $_SESSION['id']= $data['id'];

                echo  '<script type="text/javascript">
                location.replace("../dashboard/admins.php");
              </script>';
            }
            else
            {
                echo '<script>alert("mail already used ")</script>';
            }
        }
        else {
            echo '<script>alert("Email or password is wrong. Please try again")</script>';
        }

    }

    public static function EditAdmin()
    {
        $id = $_SESSION['adminId'];
        global $conn;
		$name = mysqli_real_escape_string($conn , $_POST['name']);
		$phone = mysqli_real_escape_string($conn , $_POST['phone']);
		$email = mysqli_real_escape_string($conn , $_POST['email']);

		$sql = "UPDATE admins SET email = '$email' , name = '$name' , number = '$phone'  WHERE id = '$id'";
		$result = mysqli_query($conn , $sql);

		if ($result) {
			echo  '<script type="text/javascript">
			location.replace("../dashboard/admins.php");
		  </script>';
		}
		else {
			$_SESSION['error'] = "An error occurred, Add again";
		}
    }

    //

    public static function deleteAdmin()
    {
        global $conn;
        $script = $_POST['script'];
        $id = $_POST['delete_id'];

        $request =  mysqli_query($conn , "SELECT FROM admins WHERE id = $id");
        if(!empty($request))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../dashboard/admins.php");
			  </script>';
            die(); 
        }
        if(!empty($script))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../dashboard/admins.php");
			  </script>';
            die();
        }

        $sql = "DELETE FROM admins WHERE id= $id";

        if (mysqli_query($conn, $sql)) {

        $_SESSION['message'] = "course was deleted";
        echo '<script type="text/javascript">
				location.replace("../dashboard/admins.php");
			  </script>';

        }
            
        
        
    }



}

if (isset($_POST['add'])) {
	Admin::AddAdmin();
}

if (isset($_POST['edit'])) {
	Admin::EditAdmin();
}

if (isset($_POST['delete'])) {
	Admin::deleteAdmin();
}

if(isset($_POST['loginAr']))
{
    Admin::LoginAdminAr();
}

if(isset($_POST['loginEn']))
{
    Admin::LoginAdminEn();
}

?>