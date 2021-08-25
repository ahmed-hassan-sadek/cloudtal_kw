<?php
include("includes/header-en.php");
$id = $_GET['id'];
$_SESSION['user_id'] = $id;
$qshow = "SELECT * FROM users where id='$id'";
$result = mysqli_query($conn , $qshow);
$data = $result->fetch_assoc();

?>

<div id="content" class="main-content">
            <div class="layout-px-spacing">

<form enctype="multipart/form-data" method="post" action="../backend/Users.php">
                    <h2 class="text-center mt-5 mb-5">Editing User (<?= $data['name'] ?>)</h2>
                    <div class="row">
                    
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="name" type="text" placeholder="Your name" value="<?= $data['name'] ?>" class="form-control" />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="phone" type="text" placeholder="Your phone number" value="<?= $data['number'] ?>" class="form-control" />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="age" type="text" placeholder="Your age" value="<?= $data['age'] ?>" class="form-control" />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="address" type="text" placeholder="Your address" value="<?= $data['address'] ?>" class="form-control" />
                    
                    </div>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <div class="form-group">
                    
                        <input name="email" type="text" placeholder="Your mail" value="<?= $data['email'] ?>" class="form-control" />
                    
                    </div>
                        
                        </div>
 
                        <div class="col-lg-12 text-center">
                        
                            <button name="edit-user" class="btn btn-primary px-5 mt-5">Edit</button>
                        
                        </div>

                    </div>

                </form>
                
    </div>
</div>
                
    <?php

if(isset($_POST['up1']))
{
    $name = $_POST['name'];
    $number = $_POST['number'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $id = $_GET['id'];

    $qupro = "UPDATE users SET name = '$name' , number = '$number' , age = '$age' , address = '$address' , email = '$email' where id='$id'";

    $res = mysqli_query($conn , $qupro);
    
    if($res)
    {
        echo '<script>alert("Edit success");
                     if ( window.history.replaceState )
                     {
                        window.history.replaceState( null, null, window.location.href );
                     }
                     location.reload();
                     </script>';
    }
    else
    {
        echo '<script>alert("Problem happened! please try again");';
    }
}
        
        ?> 



<?php include('includes/footer.php'); ?>