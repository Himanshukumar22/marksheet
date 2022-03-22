<?php session_start();
session_regenerate_id(true);
ob_start();
if(!isset($_SESSION['loginUserName'])){

    echo '<script> location.href = "index.php";</script>';
}
if($_SESSION['loginUserID']==0){
$c_em1=$_SESSION['loginUserEmail'];
$que = mysqli_query($conn,"select * from users WHERE UserEmail='$c_em1'");
$us = mysqli_fetch_assoc($que);
$c_id1=$us['UserID'];
session_start();
$_SESSION['loginUserID'] = 	$c_id1;
}

?>
<?php include_once('includes/head.php');?>

 <!-- Boxed -->
    <div class="boxed">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-address">  
                            <div class="custom-info">
                                <span>Have any questions?</span> 
                                <i class="fa fa-reply"></i><?php echo $_SESSION['support_email'];?> 
                                <i class="fa fa-phone"></i><?php echo $_SESSION['support_no'];?>      
                            </div>
                        </div><!-- /.flat-address -->
                    </div><!-- /.col-md-8 -->              
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.top -->

        <!-- Header -->            
        <header  class="header clearfix"> 
            <div class="header-wrap clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-8">
                            <div id="logo" class="logo col-md-3">
                                    <img src="upload/<?php echo $_SESSION['logo'];?>" alt="images" width="150" style="height:70px" >
                            </div><!-- /.logo -->
                            </div>
                            <div class="btn-menu">
                                <span></span>
                            </div><!-- //mobile menu button -->
                         
                            
                            <div class="nav-wrap">                                
                                <nav id="mainnav" class="mainnav">
                                    <ul class="menu"> 
                                        <li>
                                        <?php if($_SESSION['loginUserName']!=''){ ?> 
                                            <a class="active" href="updateprofile.php?id=<?=$_SESSION['loginUserID'];?>">Update Profile
                                            </a>
                                        <?php } ?> </li>
                                       <li>
                                        <?php if($_SESSION['loginUserName']!=''){ ?> 
                                            <a href="logout.php">Logout
                                            </a>
                                        <?php } ?>
                                       </li>
                                       
                                    </ul>
                                </nav>
                            </div>
                        </div><!-- /.col-md-9 -->
                    </div><!-- /.container -->             
            </div><!-- /.header-inner --> 
        </header><!-- /.header -->
    </div>

