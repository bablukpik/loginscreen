<?php session_start(); include "config.php";

if(isset($_SESSION['user_name']))
{
	header("Location: index.php");
}

if(!empty($_POST['form_email']) and !empty($_POST['form_email'])){
	$form_email = $_POST['form_email'];
	$form_password = md5($_POST['form_password']);


		
	$sql = "SELECT * FROM tbl_users WHERE user_email = '$form_email' and user_password = '$form_password'";
	$result = $conn->query($sql);
	
	
	if ($result) {
		$row = $result->fetch_assoc();
		$_SESSION['user_name'] 		= $row["user_name"];
		$_SESSION['user_email'] 	= $row["user_email"];
		$_SESSION['full_name'] 		= $row["full_name"];
		header("Location: index.php");
	}else{
		header("Location: login.php");
	}
}else{
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Login Screen</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
<div class="signin-form">

	<div class="container">
     
        
       <form action="login.php" class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Login Screen</h2><hr />
        
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="form_email" id="user_email" />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="form_password" id="password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
				<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
        </div>  
      
      </form>

    </div>
    
</div>
    
<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>
<?php } ?>