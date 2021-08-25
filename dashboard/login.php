<?php
include 'includes/header.php';

if(isset( $_SESSION['kwAdmin'] ))
{
    echo '<script type="text/javascript">
            location.replace("index.php");
          </script>';
}
?> 

<style>

    .topbar
    {
        display: none !important;
    }

</style>

    <div class="row vh-100 d-flex justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="assets/images/logo-sm-dark.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Let's Get Started shoppingkw</h4>   
                                        <p class="text-muted  mb-0">Sign in to continue to shoppingkw.</p>  
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                     <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">                                        
                    <form class="text-left" method="post" action="../backend/admin.php">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <input id="email" name="email" type="text" class="form-control" placeholder="email" required>
                                </div>

                                <div id="password-field" class="field-wrapper mt-3 input mb-2">
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="text-center mt-5">
                                    <div class="field-wrapper">
                                        <button type="submit" name="loginEn" class="btn btn-primary w-100" value="">Log In</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!--end form-->
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                                <div class="card-body bg-light-alt text-center">
                                    <span class="text-muted d-none d-sm-inline-block">shoppingkw © <script>
                                        document.write(new Date().getFullYear())
                                    </script></span>                                            
                                </div>
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->

<?php include 'includes/footer.php'; ?> 
