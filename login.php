<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login form</title>
<script>
	function checkData()
	{
		//Kiem tra ô user có dữ liệu hay không
		var a = document.getElementById('user');
		if(a.value=='')
		{
			alert('Bạn phải nhập username');
			a.focus();
			return false;
		}
		//Kiem tra ô password
		var a = document.getElementById('pass');
		if(a.value=='')
		{
			alert('Bạn phải nhập password');
			a.focus();
			return false;
		}

		return true;
	}
</script>
</head>

<body>
<form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onSubmit="return checkData()">
    <table width="300" border="1" align="center" cellpadding="5">
      <caption>
        ĐĂNG NHẬP
      </caption>
      <tr>
        <th scope="row" width="30%">User</th>
        <td><input type="email" name="user" id="user" placeholder="Nhập email"></td>
      </tr>
      <tr>
        <th scope="row">Pass</th>
        <td><input type="password" id="pass" name="pass" placeholder="Mật khẩu"></td>
      </tr>
      <tr>
        <th colspan="2"><input type="submit" value="Login"></th>
      </tr>
    </table>
</form>
</body>
<script>
	document.getElementById('user').focus();
</script>
<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["pass"]) && $_POST["user"]) {

		$pass = test_input($_POST["pass"]);
	  //$name = test_input($_POST["name"]);
	  $email = test_input($_POST["user"]);

	}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


	if (isset($_POST["pass"]) && $_POST["user"]) {
		$myfile = fopen("newfile.txt","w") or die ("Unable to open file!");

		$email = $email . "\n";
		$pass = $pass . "\n";
		fwrite($myfile, 'email:' . $email);

		fwrite($myfile, 'pass:' . $pass);

		fclose($myfile);

		echo 'Success';
	}

?>

<?php
//Configuration
/*
$host = 'localhost';
$user = 'shop';
$pass_db = 'phd_shop 123';
$db   = 'shop';

// Connection

$link = mysqli_connect($host,$user,$pass_db,$db) or die('No connection');

//UTF8

mysqli_set_charset($link,'utf8');

//sql
if (isset($_POST["pass"]) && $_POST["user"]) {

	$sql = 'INSERT INTO `nn_user` (`password`, `email`) VALUES (' . '\'' . $pass . '\', \''  . $email . '\')' ;
	//query
	 echo mysqli_query($link,$sql) ? 'User\'s data saved' :  'Email đã được sử dụng';
}
*/
?>

</html>
