<?php include 'db.inc.php';
session_start();
$passMessage="";
if (isset($_SESSION['user'])) //checks whether a user has logged in
{
	if (isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['confirmPass']))
	{
		$old = $_POST['oldPass'];
		$new = $_POST['newPass'];
		$confirm = $_POST['confirmPass'];
		
		$user = $_SESSION['user'];
		
		$sql = "SELECT * FROM Employee WHERE LoginName = '$user' AND Password = '$_POST[oldPass]'";
		if (! mysqli_query($con,$sql))
		{
			echo "Error in select query ".mysqli_error($con);
		}
		else //PASSWORD INCORRECT
		{
			if (mysqli_affected_rows($con) == 0)
			{
				buildPage($old, $new, $confirm);
				$passMessage = "<font size = '4' color = 'red'>Old Password incorrect!</font>";
			}
			else //NEW PASSWORDS DO NOT MATCH
			{
				if($_POST['newPass'] != $_POST['confirmPass'])
				{
					buildPage($old, $new, $confirm);
					$passMessage = "<font size = '4' color = 'red'>New passwords do not match - Please try again.</font>";
				}
				else //UPDATING PASSWORD
				{
					$sql = "UPDATE Employee SET Password = '$_POST[newPass]'
					WHERE LoginName = '$user' ";
					if ( ! mysqli_query($con, $sql))//actual query
					{
						echo "Error in update query " .mysqli_error($con);
					}
					else
					{
						if(mysqli_affected_rows($con) == 0)
						{
							buildPage($old, $new, $confirm);
							$passMessage = "<font size = '4' color = 'red'>Sorry - Update not successful!</font>";
						}
						else //CORRECT OLD PASSWORD ENTERED
						{
							$passMessage = "<font size = '4' color = 'red'> Your password has been updated</font>
							<h3><input type = 'button' value = 'Proceed to Main Menu'
							onclick = 'window.location = \"mainMenu.html\"'></h3> "; 
						}
					}
				}
			}
		}
	}
	else
	{
		//build page for initial display
		buildPage("","","");
	}
}
else 
{
	echo '<link rel="stylesheet" href="loginandChange.css" type="text/css">
	<h1>ERROR</h1>You must be logged in to view this page';
}
function buildPage($o,$n,$c)//parameters for old, new, confirm
{
	echo "<body>
		  <form class ='Change' action='changePass.php' method='post'>
		  <h2 class='title'>A Dying Business</h2>
		  <div class='nameDiv'>
		  <h3>Change Password</h3>
		  <label>Old Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type = 'password' name = 'oldPass' id = 'oldPass' autocomplete = 'off' value = $o ></label><br><br>
		 
		  <label>New Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type = 'password' name= 'newPass' id = 'newPass' value = $n></label><br><br>
		  
		  <label>Re-enter Password: <input type = 'password' name = 'confirmPass' id = 'confirmPass' value = $c></label><br><br>
		  <input type = 'submit' value = 'Save Changes'>
		  
		  </div>
		  </form> ";
}  

mysqli_close($con);
?>
<HTML>
<HEAD>
<TITLE>Change Password</TITLE>
</HEAD>
<link rel="stylesheet" href="loginandChange.css" type="text/css">
</head>
<body bgcolor ="#000000" style="overflow: hidden">
<form action = "changePass.php" form class="confirmChange" method="POST">
<br>
<?php echo $passMessage;?>
</form>
<img class="middlePic" src="light tree middle.jpg" hspace="20">
<div class="bottom"> <p class="bottom">A Dying Business-Your Death is Our Business</p></div>
</body>
</html>
