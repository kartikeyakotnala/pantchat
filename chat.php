<!doctype hmtl>
<html lang='en'>
<head>
	<title>PantChat</title>
	<meta charset='UTF-8'/>
	<meta name='keyword' content='chat,pantnagar,pantchat,stranger'/>
	<meta name='description' content='PantChat is a chatting wesite designed to bring all the colleges of Pantnagar University together '/>
	<meta name='author' content='K.K'/>
	<meta name='viewport' content='width=device-width,initial-scale=1.0'/>
</head>
<?php
session_start();
if(empty($_SESSION['key'])or !isset($_SESSION['key'])or $_SESSION['key']=='Undefined' ){
	echo "<h2>IMPROPER MEANS KINDLY RETURN</h2>";
	header('refresh:2;url=loginsignup.html');
}
?>

<body class='container-fluid img-responsive' background='images\rainbow.jpg'>	
<div class='row'>
	
<div class='col-md-10 col-md-offset-1' >	
	<header class='row'>
		<div class='common row'>
			<div class='col-md-3 col-sm-3 col-xs-8 '><a href='index.html'><img class='img-responsive' src='images\chat.png'></a></div>
			<form action='http://localhost/myprojects/pantchat/LogOut.php'>
				<button class='col-md-1 col-md-offset-7 col-sm-2 col-sm-offset-6 col-xs-3 col-xs-offset-1 button1 text' style='color:white; background:rgb(43,202,51);'>LogOut</button>
			</form>
		</div>
	</header><br>
	
	<section class='container-fluid'>
		<div class='row common'>
			<div class='col-md-10 col-md-offset-1'><h1 style='color:rgb(62,62,62);font-family:Daggersquare;'>ChatBox</h1>
				<div class='common' ><pre style='margin-botton:0 0 0 0; height:330px; overflow:yes;' id='messageBox'></pre>
				</div>
				<div class='row'> <!-- for buttons below chat box-->
					<button class='button1 text' style=' display:inline; color:white; background:rgb(43,202,51);'>NEW</button>
					<div style='display:inline; float:right;'>
						<form method='post'>
							<input autofocus='autofocus' style='margin-top:10px;  padding:1px,1px,1px,1px; border-radius:10px; opacity:.8' type='text' id='message' name='message'/>
							<button class='button1 text' style='color:white; background:rgb(43,202,51); margin-left:3px;'>SEND</button>
						</form>
					</div>
				</div>
			</div>
		<div>
	</section>
	<br>
	<div class='container-fluid'>
		<div class='row'>	
			<footer class='col-md-12'>
				<p  class='text' style='display:inline;'>Contact: pantchat@gmail.com  
					<img style='float:right;' class=' col-md-1 col-xs-3 col-sm-2 img-responsive' src='images/footer.png'/><br>
					Follow us on facebook: <a href='_BLANK'> FacebookPage PantChat</a></p><br>
					<button class='button1' style='font-size:10px; margin-top:3px;'><b><span style='color:blue'>Crafted By:</span><span style='color:rgb(0,162,232)'> K.K</span></b></button>
			</footer>
		</div>
	</div>	
	
	
</div>	
</div>	
</body>
<?php
if(!empty($_POST['message']) ){
	$message=$_POST['message'];
	$file=fopen("chat.txt","a");//file name will be according to id no
	fwrite($file,$_SESSION['Name']);
	fwrite($file,":");
	fwrite($file,$message);
	fwrite($file,"\n");
	fclose($file);
}
?>
	
<div>	
		<link rel='stylesheet' href='mystyle.css'/>	
		<link rel='stylesheet' href='bootstrap\css\bootstrap.min.css'/>
		<link rel='stylesheet' href='bootstrap\css\bootstrap-theme.min.css'/>
		<script type='text/javascript' src='bootstrap\js\jquery-3.2.1.min.js'></script>
		<script>
		//	setInterval(function(){document.getElementById('messageBox').scrollTop=document.getElementById('messageBox').scrollHeight},1000);
			setInterval(function(){
				$.ajax({
					type:"POST",
					url:"chat.txt",
					success:chat
				});
				
			},100);
			function chat(data){
					$("#messageBox").text(data);
				}
		</script>
		
</div>		
</html>	