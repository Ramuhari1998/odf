<?php
    require_once('http://127.0.0.1/Nist_forum/header.php');
?>
<head>	
	
	<style>
		
				  .button {
					display: inline-block;
					padding: 15px 25px;
					font-size: 12px;
					cursor: pointer;
					text-align: center;
					text-decoration: none;
					outline: none;
					color: #fff;
					background-color: #008CBA;
					border: none;
					border-radius: 15px;
					box-shadow: 0 6px #999;
					position:relative;
					top:300px;
					left:-250px;
				  }

					.button:hover {background-color: #3e8e41}

					.button:active {
					background-color: #3e8e41;
					box-shadow: 0 5px #666;
					transform: translateY(4px);
					}
			</style>
	</head> 
<center>
	<body>
	         
			<!--
			<button onClick="location.href='http://127.0.0.1/Nist_forum/login.php'" class="button">My Questions</button>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <button  onClick="location.href='http://127.0.0.1/Nist_forum/signup.php'" class="button">My Answers</button>
			-->
			<input type="button" name="sub" id="btnGoID" value="My Questions" class="PageTextBox"/>
			<input type="button" name="sub" id="btnGoID" value="My Answers" class="PageTextBox"/>		
	</body>
</center>

<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
?>