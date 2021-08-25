<?php

ob_start();

session_start();
include "connect.php";

class Users
{

    //

    public static function LoginAr()
    {
        global $conn;

        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $password = mysqli_real_escape_string($conn , md5($_POST['password']));

        $sql = "select * from users where email = '$email' AND password = '$password'";
        $result = mysqli_query($conn , $sql);
        $data = $result->fetch_assoc();
        
        if ($data)
        {
            $_SESSION['isLoginkw'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $data['name'];
            $_SESSION['id'] = $data['id'];

            echo '<script type="text/javascript">
            location.replace("../index.php");
            </script>';
        }
        else
        {
            echo '<script>alert("Email or password is wrong. Please try again")</script>';
        }
    }

    //

    public static function LoginEn()
    {
        global $conn;

        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $password = mysqli_real_escape_string($conn , md5($_POST['password']));

        $sql = "select * from users where email = '$email' AND password = '$password'";
        $result = mysqli_query($conn , $sql);
        $data = $result->fetch_assoc();
        
        if ($data)
        {
            $_SESSION['isLoginkw'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $data['name'];
            $_SESSION['id'] = $data['id'];

            echo '<script type="text/javascript">
            location.replace("../index-en.php");
            </script>';
        }
        else
        {
            echo '<script>alert("Email or password is wrong. Please try again")</script>';
        }
    }

    //

    public static function SignUpAr()
    {
        global $conn;
        
        $name = mysqli_real_escape_string($conn , $_POST['name'] );
        $phone = mysqli_real_escape_string($conn , $_POST['phone'] );
        $age = mysqli_real_escape_string($conn , $_POST['age'] );
        $address = mysqli_real_escape_string($conn , $_POST['address'] );
        $email = mysqli_real_escape_string($conn , $_POST['email'] );
        $password = mysqli_real_escape_string($conn , md5($_POST['password'] ));

        $query = "INSERT INTO users (name , number , age , address , email , password) VALUES ('$name' , '$phone' , '$age' , '$address' , '$email' , '$password')";

        $result = mysqli_query($conn , $query);

        if($result)
        {
            $check_email = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn , $check_email);
            $data = $result->fetch_assoc();

            if($data)
            {
                $_SESSION['isLoginkw']=true;
                $_SESSION['username'] = $data['name'];
                $_SESSION['email']= $data['email'];
                $_SESSION['id']= $data['id'];

                echo '<script type="text/javascript">
                        location.replace("../account-details.php");
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

    //
    
    public static function SignUpEn()
    {
        global $conn;
        
        $name = mysqli_real_escape_string($conn , $_POST['name'] );
        $phone = mysqli_real_escape_string($conn , $_POST['phone'] );
        $age = mysqli_real_escape_string($conn , $_POST['age'] );
        $address = mysqli_real_escape_string($conn , $_POST['address'] );
        $email = mysqli_real_escape_string($conn , $_POST['email'] );
        $password = mysqli_real_escape_string($conn , md5($_POST['password'] ));

        $query = "INSERT INTO users (name , number , age , address , email , password) VALUES ('$name' , '$phone' , '$age' , '$address' , '$email' , '$password')";

        $result = mysqli_query($conn , $query);

        if($result)
        {
            $check_email = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn , $check_email);
            $data = $result->fetch_assoc();

            if($data)
            {
                $_SESSION['isLoginkw']=true;
                $_SESSION['username'] = $data['name'];
                $_SESSION['email']= $data['email'];
                $_SESSION['id']= $data['id'];

                echo '<script type="text/javascript">
                        location.replace("../account-details-en.php");
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

    //

    public static function UsersDetails()
	{
		global $conn;
		$userid = $_SESSION['id'];
		$name = mysqli_real_escape_string($conn , $_POST['name']);
		$email = mysqli_real_escape_string($conn , $_POST['email']);
		$phone = mysqli_real_escape_string($conn , $_POST['phone']);

		$sql = "UPDATE users SET name = '$name' , email = '$email' , number = '$phone'  WHERE id = '$userid'";
		$result = mysqli_query($conn , $sql);

		if ($result) {
			echo  '<script type="text/javascript">
			location.replace("../account-details.php");
		  </script>';
		}
		else {
			$_SESSION['error'] = "An error occurred, Add again";
		}
    }

    //

    public static function UsersDetailsEn()
	{
		global $conn;
		$userid = $_SESSION['id'];
		$name = mysqli_real_escape_string($conn , $_POST['name']);
		$email = mysqli_real_escape_string($conn , $_POST['email']);
		$phone = mysqli_real_escape_string($conn , $_POST['phone']);

		$sql = "UPDATE users SET name = '$name' , email = '$email' , number = '$phone'  WHERE id = '$userid'";
		$result = mysqli_query($conn , $sql);

		if ($result) {
			echo  '<script type="text/javascript">
			location.replace("../account-details-en.php");
		  </script>';
		}
		else {
			$_SESSION['error'] = "An error occurred, Add again";
		}
    }

    //

    public static function AddAddress()
	{
		global $conn;
		$country = mysqli_real_escape_string($conn , $_POST['country']);
		$address_details = mysqli_real_escape_string($conn , $_POST['address']);
		$phone = mysqli_real_escape_string($conn , $_POST['phone']);
		$user_id = mysqli_real_escape_string($conn , $_POST['user_id']);

		$sql = "INSERT INTO users_address (country , address_details , phone , user_id ) values ('$country' , '$address_details' , '$phone' , '$user_id' )";

		$result = mysqli_query($conn , $sql);
		if ($result) {
			echo '<script type="text/javascript">
        location.replace("../account-addresses.php");
        </script>';
		}
	}

    //

    public static function AddAddressEn()
	{
		global $conn;
		$country = mysqli_real_escape_string($conn , $_POST['country']);
		$address_details = mysqli_real_escape_string($conn , $_POST['address']);
		$phone = mysqli_real_escape_string($conn , $_POST['phone']);
		$user_id = mysqli_real_escape_string($conn , $_POST['user_id']);

		$sql = "INSERT INTO users_address (country , address_details , phone , user_id ) values ('$country' , '$address_details' , '$phone' , '$user_id' )";

		$result = mysqli_query($conn , $sql);
		if ($result) {
			echo '<script type="text/javascript">
        location.replace("../account-addresses-en.php");
        </script>';
		}
	}

    //

    
	public static function EditAddressEn()
	{
		global $conn;
		$userid = $_SESSION['id'];
		$country = mysqli_real_escape_string($conn , $_POST['country']);
		$address_details = mysqli_real_escape_string($conn , $_POST['address_details']);
		$phone = mysqli_real_escape_string($conn , $_POST['phone']);

		$sql = "UPDATE users_address SET country = '$country' , address_details = '$address_details' , phone = '$phone'  WHERE user_id = '$userid'";
		$result = mysqli_query($conn , $sql);

		if ($result) {
			echo  '<script type="text/javascript">
			location.replace("../account-addresses-en.php");
		  </script>';
		}
		else {
			$_SESSION['error'] = "An error occurred, Add again";
		}
	}

    //

    public static function deleteAddressEn()
    {
        global $conn;
        $script = $_POST['script'];
        $userId = $_POST['delete_id'];

        $request =  mysqli_query($conn , "SELECT FROM users_address WHERE id = $userId");
        if(!empty($request))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../account-addresses-en.php");
			  </script>';
            die(); 
        }
        if(!empty($script))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../account-addresses-en.php");
			  </script>';
            die();
        }

        $sql = "DELETE FROM users_address WHERE id= $userId";

        if (mysqli_query($conn, $sql)) {

        $_SESSION['message'] = "course was deleted";
        echo '<script type="text/javascript">
				location.replace("../account-addresses-en.php");
			  </script>';

        }
            
        
        
    }

    //

    public static function AddAddressAr()
	{
		global $conn;
		$country = mysqli_real_escape_string($conn , $_POST['country']);
		$address_details = mysqli_real_escape_string($conn , $_POST['address']);
		$phone = mysqli_real_escape_string($conn , $_POST['phone']);
		$user_id = mysqli_real_escape_string($conn , $_POST['user_id']);

		$sql = "INSERT INTO users_address (country , address_details , phone , user_id ) values ('$country' , '$address_details' , '$phone' , '$user_id' )";

		$result = mysqli_query($conn , $sql);
		if ($result) {
			echo '<script type="text/javascript">
        location.replace("../account-addresses-en.php");
        </script>';
		}
	}

    //

    
	public static function EditAddressAr()
	{
		global $conn;
		$userid = $_SESSION['id'];
		$country = mysqli_real_escape_string($conn , $_POST['country']);
		$address_details = mysqli_real_escape_string($conn , $_POST['address_details']);
		$phone = mysqli_real_escape_string($conn , $_POST['phone']);

		$sql = "UPDATE users_address SET country = '$country' , address_details = '$address_details' , phone = '$phone'  WHERE user_id = '$userid'";
		$result = mysqli_query($conn , $sql);

		if ($result) {
			echo  '<script type="text/javascript">
			location.replace("../account-addresses-en.php");
		  </script>';
		}
		else {
			$_SESSION['error'] = "An error occurred, Add again";
		}
	}

    //

    public static function deleteAddressAr()
    {
        global $conn;
        $script = $_POST['script'];
        $userId = $_POST['delete_id'];

        $request =  mysqli_query($conn , "SELECT FROM users_address WHERE id = $userId");
        if(!empty($request))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../account-addresses-en.php");
			  </script>';
            die(); 
        }
        if(!empty($script))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../account-addresses-en.php");
			  </script>';
            die();
        }

        $sql = "DELETE FROM users_address WHERE id= $userId";

        if (mysqli_query($conn, $sql)) {

        $_SESSION['message'] = "course was deleted";
        echo '<script type="text/javascript">
				location.replace("../account-addresses-en.php");
			  </script>';

        }
            
        
        
    }

    //

    public static function EditUser()
    {
        $id = $_SESSION['user_id'];
        global $conn;

        $name = mysqli_real_escape_string($conn , $_POST['name'] );
        $phone = mysqli_real_escape_string($conn , $_POST['phone'] );
        $age = mysqli_real_escape_string($conn , $_POST['age'] );
        $address = mysqli_real_escape_string($conn , $_POST['address'] );
        $email = mysqli_real_escape_string($conn , $_POST['email'] );

        $sql = "UPDATE users SET name = '$name' , number = '$phone' , age = '$age' , address = '$address' , email = '$email' WHERE id = '$id'";
		$result = mysqli_query($conn , $sql);


		if ($result) {
			echo  '<script type="text/javascript">
			location.replace("../dashboard/users.php");
		  </script>';
		}
		else {
			$_SESSION['error'] = "An error occurred, Edit again";
		}
    }

    //

    public static function DeleteUser()
    {
        global $conn;
        $script = $_POST['script'];
        $userId = $_POST['delete_id'];

        $request =  mysqli_query($conn , "SELECT FROM users_address WHERE id = $userId");
        if(!empty($request))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../dashboard/users.php");
			  </script>';
            die(); 
        }
        if(!empty($script))
        {
            $_SESSION['error'] = "Not Allowed";
            echo '<script type="text/javascript">
				location.replace("../dashboard/users.php");
			  </script>';
            die();
        }

        $sql = "DELETE FROM users WHERE id= $userId";

        if (mysqli_query($conn, $sql)) {

        $_SESSION['message'] = "course was deleted";
        echo '<script type="text/javascript">
				location.replace("../dashboard/users.php");
			  </script>';

        }
            
        
    }

}

//

if (isset($_POST['login-ar'])) {
	Users::LoginAr();
}

//

if (isset($_POST['login-en'])) {
	Users::LoginEn();
}

//

if (isset($_POST['signup-ar'])) {
	Users::SignUpAr();
}

//

if (isset($_POST['signup-en'])) {
	Users::SignUpEn();
}

//

if (isset($_POST['edit'])) {
	Users::UsersDetails();
}

//

if (isset($_POST['edit-en'])) {
	Users::UsersDetailsEn();
}

//

if (isset($_POST['add-en'])) {
	Users::AddAddressEn();
}

//

if (isset($_POST['add-en'])) {
	Users::AddAddressEn();
}

//

if (isset($_POST['edit-address-en'])) {
	Users::EditAddressEn();
}

//

if (isset($_POST['delete-add-en'])) {
	Users::deleteAddressEn();
}

//

if (isset($_POST['add-ar'])) {
	Users::AddAddressAr();
}

//

if (isset($_POST['edit-address-ar'])) {
	Users::EditAddressAr();
}

//

if (isset($_POST['delete-add-ar'])) {
	Users::deleteAddressAr();
}

//

if (isset($_POST['edit-user'])) {
	Users::EditUser();
}

//

if (isset($_POST['delete-user'])) {
	Users::DeleteUser();
}
?>