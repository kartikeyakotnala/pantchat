<?php
ob_start();
$Name=strip_tags($_POST['Name']);
$Email=strip_tags($_POST['E-mail']);
$Sex=strip_tags($_POST['Sex']);
$Id=strip_tags($_POST['Id']);
$Year=strip_tags($_POST['Year']);
$body="Thank you for Signing with PantChat. The messaging site has been developed to bring the Pantnagar family and all the colleges in it a little closer. We thank you for your initiation. ";
$header='FROM:pantchat@localhost';
if( isset($Name) && !empty($Name) && isset($Id) && !empty($Id) && isset($Email) && !empty($Email)&& isset($Sex) && !empty($Sex)&& isset($Year) && !empty($Year)){
	$con=mysqli_connect('localhost','root','')or die('ERROR: COULD NOT CONNECT');
	$select=mysqli_select_db($con,'users')or die ('ERROR: TABLE NOT FOUND');
	$query="SELECT * FROM users WHERE Email='$Email' OR Id='$Id'";
	$query=mysqli_query($con,$query);
	$num=mysqli_num_rows($query);
		if($num!=0){
			echo 'The user already exists'."<br>";
			header('refresh:1; url=loginsignup.html');
		}
		else{
		$query="INSERT INTO `users` (`Name`, `Email`, `Sex`, `Id`, `Year`, `Status`) VALUES ('$Name', '$Email', '$Sex', '$Id', '$Year', '1')";
		$query=mysqli_query($con,$query);
		echo 'your entered fields were '.$Name.' '.$Email.' '.$Sex.' '.$Id.' '.$Year."<br>";
		mail($Email,'Welcome to PantChat',$body,$header);
		echo 'Welcome to Pantchat. you will be updated via mail'."<br>";
        echo "<H1>HAPPY CHATTING!!</H1>";
		session_start();
		$_SESSION['Name']=$Name;
		$_SESSION['key']=1;
		header('refresh:2; url=chat.php');
		}
	}
else{
echo 'Complete all fields';
header('refresh:1; url=loginsignup.html');
}	

 		
ob_end_flush();
?>