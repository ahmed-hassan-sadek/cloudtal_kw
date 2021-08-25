<?php
include('includes/header-en.php');
?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <h2 class="mt-5 mb-5">All Messages</h2>
                
                
                        
                        <?php
                    
                    $qshow = "select * from messages";
                    $res = mysqli_query($conn , $qshow);
                    
                    while($product = mysqli_fetch_array($res))
                    {
                        echo '<div class="message">
                
                    <div class="row">
                        
                        <div class="col-lg-6">
                        
                            <p>Name: '.$product['name'].'</p>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <p>Number: '.$product['number'].'</p>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <p>Email: '.$product['email'].'</p>
                        
                        </div>
                        
                        <div class="col-lg-6">
                        
                            <p>Subject: '.$product['subject'].'</p>
                        
                        </div>
                        
                        <div class="col-lg-12">
                        
                            <p>message: '.$product['message'].'</p>
                        
                        </div>
                        
                        <a href="delete/messages-delete.php?id='.$product['id'].'"><h2>X</h2></a>
                        
                        </div>
                
                </div>';
                    }
                    
                    ?>
                    

                <style>
                
                    .message
                    {
                        margin-top: 20px;
                        padding: 20px;
                        border: 1px solid #888ea8;
                        position: relative;
                    }
                    .message h2
                    {
                        position: absolute;
                        top: 30%;
                        right: 5%;
                        color: red;
                        cursor: pointer;
                    }
                    
                </style>

            </div>
            
        </div>
        <!--  END CONTENT AREA  -->

<?php include('includes/footer.php') ?>