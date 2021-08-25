<?php
include 'includes/top-ar.php';

$title = "تسجيل الدخول - ايديورام";
$description = "قم بتسجيل الدخول علي اديورام لتستطيع الوصول الي جميع الكورسات";
$keywords = "Eduram , اديورام , courses , كورسات , كورسات تعليمية , ثانوية عامة , تسجيل الدخول";

include 'includes/seo-ar.php';
include 'includes/header.php';
?>
	
<br><br>
    
	<!-- Intro Courses intro-section -->
	<section class="login justify-content-center" style ="padding:20px;margin:20px 0;">
        
            <div class="container ll p-3 my-3" >
                
                <div class="border lll">
                    <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">تسجيل الدخول</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">حساب جديد</a>
  </li>
  
</ul>

                <div class="text-center">
                    <a href="index.php">
                <img src="images/logo-2.png" class="imagee mb-2" /></a>
                    <h3 style="color:#eb5d1e;" class="mb-4 mt-4">نظام تعليمي متكامل</h3>
                    </div>

            
                
                    <br/><br/>
                  
<div class="tab-content" id="pills-tabContent">
    
  <div class="tab-pane text-center fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    
      <!-- Sign in  Form -->
      
                        <form method="post" action="../backend/admin.php">
                            <div class="form-group">
                                <input type="email" required class="form-control" name="username" placeholder="الايميل"/>
                            </div>
                            <div class="form-group">
                                <input type="password" required class="form-control" name="password" placeholder="كلمة المرور"/>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" name="loginAr" class="btn btn-Secondary px-5 mt-5" style="background-color:#eb5d1e;color:#fff;">تسجيل الدخول</button>
                            </div>
                        </form>
        
       
    </div>
    
  <div class="tab-pane text-center fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    
      <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" >
                            <div class="form-group">
                                <input type="text" name="fname" required class="form-control" placeholder="الاسم الاول"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lname" required class="form-control" placeholder="الاسم الاخير"/>
                            </div>
                            <div class="form-group">
                                <input type="number" name="number" required class="form-control" placeholder="رقم الهاتف"/>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" required class="form-control" placeholder="الايميل"/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass" required class="form-control" placeholder="كلمة المرور"/>
                            </div>
                            
                            <div class="form-group form-button">
                                <button type="submit" class="btn btn-Secondary px-5 mt-5" name="signup" style="background-color:#eb5d1e;color:#fff;">تسجيل</button>
                            </div>
                        </form>
      
      <?php
                              
                     if(isset($_POST['signup']))
                     {
                         $fname = $_POST['fname'];
                         $lname = $_POST['lname'];
                         $number = $_POST['number'];
                         $email = $_POST['email'];
                         $pass = $_POST['pass'];
                         
                         $q = "select * from users where email = '$email'";
                         $result = mysqli_query($con , $q);
                          if(mysqli_num_rows($result) > 0)
                          {
                              echo '<script>alert("This email already exists! please try another one");</script>';
                          }
                         else
                         {
                             $qu = "insert into users (first_name , last_name , phone , email , password) values ('$fname' , '$lname' , '$number' , '$email' , '$pass')";
                         
                             $res = mysqli_query($con , $qu);
                             if($res == true)
                             {
                                   $qid = "select id from users where email = '$email'";
                                   $resultid = $con->query($qid);

                                   $data = $resultid->fetch_assoc();
                                  if($data)
                                  {
                                      $userid = $data['id'];
                                      $_SESSION['isLogin']=true;
                                      $_SESSION['email'] = $email;
                                      $_SESSION['first_name']=$fname;
                                      $_SESSION['last_name']=$lname;
                                      $_SESSION['phone']=$number;
                                      $_SESSION['id'] = $userid ;

                                      echo '<script type="text/javascript">
                        location.replace("student-profile-ar.php");
                      </script>';
                                  }
                                 else
                                 {
                                     echo '<script>alert("Your new email was created but problem happened when loggign in so you have to login yourself");</script>';
                                     echo '<script type="text/javascript">
                        location.replace("login-ar.php");
                      </script>';
                                 }
                                  
                             }
                             else
                             {
                                 echo '<script>alert("Problem happened! please try again");</script>';
                             }
                         }
                     }
        
        ?>
    
    </div>
    
</div>
            </div>
            </div>
        
        </section>
	<!-- End intro Courses -->

    <style>
    
        .ll
        {
            padding: 0 300px !important;
        }
        .lll
        {
            padding: 50px;
        }
        .imagee
        {
            width: 70%;
        }
        
        @media(max-width:991px) and (min-width:537px)
        {
            .ll
            {
                padding: 0 60px !important;
            }
        }
        
        @media(max-width:536px)
        {
            .ll
            {
                padding: 0 0 !important;
            }
            .lll
            {
                padding: 20px 10px;
            }
        }
    </style>
    
		
	<?php include 'includes/footer-ar.php'; ?>