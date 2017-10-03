<?php
ob_start();
$Name=strip_tags($_POST['Name']);
$Id=strip_tags($_POST['Id']);

if( isset($Name) && !empty($Name) && isset($Id) && !empty($Id)){
	$con=mysqli_connect('localhost','root','')or die('ERROR: COULD NOT CONNECT');
	$select=mysqli_select_db($con,'users')or die ('ERROR: TABLE NOT FOUND');

		$query="SELECT * FROM users WHERE Name='$Name' AND Id='$Id'";
		$query=mysqli_query($con,$query);
		$num=mysqli_num_rows($query);
		$result=mysqli_fetch_assoc($query);
		if($num==0){
			echo "No such user exists, kindly signup first";
			header('refresh:2; url=loginsignup.html');
		}
		else{
		echo $result['Email']."<br>";
		session_start();
		$_SESSION['Name']=$Name;
		$_SESSION['key']=1;
        echo "<H1>HAPPY CHATTING!!</H1>";
		header('refresh:2; url=chat.php');
		}
}
else{
echo 'Complete all fields';
header('refresh:1; url=loginsignup.html');
}	

 		
ob_end_flush();
?>