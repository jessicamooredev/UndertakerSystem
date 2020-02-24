<?php include 'db.inc.php';
session_start();
$loginMessage ="";
if (isset($_POST['loginName']) && isset($_POST['passWord']))
{
	$attempts = $_SESSION['attempts'];
	
	$sql = "SELECT LoginName,Password 
			FROM Employee
			WHERE LoginName = '$_POST[loginName]' 
			AND Password = '$_POST[passWord]' ";
	
	if(!mysqli_query($con, $sql))
	{
		echo "Error in query ". mysqli_error($con);
	}
	else
	{
		if(mysqli_affected_rows($con) == 0)
		{
			$attempts++;
			
			if($attempts <=3)
			{
				$_SESSION['attempts'] = $attempts;
				buildPage($attempts);
				
				$loginMessage = "<h2><font size='4' color='red'>No record found with this login name and 
								 password combination - Please try again.</font></h2> ";
			}
			else 
			{
				$loginMessage = "<h2><font size = '4' color = 'red'>Sorry - You have used all 3 attempts</h2>
				<h2>Shutting Down...</font></h2> ";
			}
		}
		else //FOUND A RECORD MATCHING THE LOGINNAME AND PASSWORD
		{
			$_SESSION['user'] = $_POST['loginName']; //session variable to keep track of the login name
			
			echo 	"<body>
					 <form class='loginandChange' action='login.php' method='post'>
					 <div class='nameDiv'>
					 <h2>Login successful!</h2>
					
					 <h3>Do you want to change your password or go directly to the main menu?</h3>
							  
					 <input type='button' value='Change Password' 
					 onclick = 'window.location = \"changePass.php\"' >		  
					 <input type ='button' value='Main Menu' onclick = 'window.location = \"mainMenu.html\"'>
					 </div></form> ";
		}
	}
} 
else //BUILDING PAGE FOR INITIAL DISPLAY
{
	$attempts = 1;
	$_SESSION['attempts'] = $attempts;
	buildPage($attempts);
}

function buildPage($att)
{
	echo "<body>
		  <form class='loginandChange' action = 'login.php' method='post'>
		  <h1 class='heading'>A Dying Business</h1>
		  <div class='nameDiv'>
		 
		  <label>Login Name: <input type='text' name='loginName' id='loginName' autocomplete='off'/></label><br><br>
		  <label>Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='password' name='passWord' id='passWord'/></label><br><br>
		  <input type ='submit' value='Login'>
		  </div>
		  </form> ";
}
mysqli_close($con);
?>
<HTML>
<HEAD>
<TITLE>Login</TITLE>
</HEAD>
<link rel="stylesheet" href="loginandChange.css" type="text/css">
</head>
<body bgcolor ="#000000" style="overflow: hidden">
<form action = "login.php" form class="confirmLogin" method="POST">
<?php echo $loginMessage;?>
</form>
<img class="middlePic" src="light tree middle.jpg" hspace="20">
<div class="bottom"> <p class="bottom">A Dying Business-Your Death is Our Business</p></div>
</body>
</html>
