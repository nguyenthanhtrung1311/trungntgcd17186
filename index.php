<html>
 <head>
  <title>Database Test</title>
 </head>
 <body>
 <?php echo '<h1>Hello Teacher Ho Van Phi, This is my cloud app</h1>'; 
 
 ?>

 <style>
 	#A {
 	 	float: left;
 	 	border-style: : solid;
		border-width: 1px;
		border-color: silver;
 	 }

 	#B {
 	 	float: left;
 	 	margin-left: 20px;
 	 	margin-top: -130px;
 	 }
 	#B input[type="submit"] {
 		font-size: 0.9em;
    	color: #fff;
   	 	background-color: #403b37;
   	 	border: none;
    	padding: 2px;
   	 	width: 30%;
   		outline: none;
   	 	text-align: center;
 	}
 </style>
 <h2>My Infomation</h2>
 <p>Name: Nguyen Thanh Trung</p>
 <p>ID: GCD17186</p>
 <p>Class: GCD0818</p>
 <p>My Full body photo</p>
 <div id="A">
 	<img src="trungcloud.jpg" alt="" height="350" width="350">
 </div>
 
 <div id="B">
 	<a href="ConnectToDB.php" target="_blank" ><input type="submit" value="Connect Database" ></a>
     <br/>
     <a href="InsertData.php" target="_blank" ><input type="submit" value="Insert data to the database" ></a>
     <br/>
     <a href="UpdateData.php" target="_blank" ><input type="submit" value="Update data to the database" ></a> 
    <br/>
    <a href="DeleteData.php" target="_blank" ><input type="submit" value="Delete data to the database" ></a> 

 </div>

     
 </body>
</html>