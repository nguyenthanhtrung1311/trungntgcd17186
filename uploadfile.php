<!DOCTYPE html>
<html>
    <head>
<title>upload file</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {
list-style: none;
}
</style>
</head>
<body>
<h1>UPLOAD FILE</h1>

<ul>
   <form class="form-signin" method="POST" enctype="multipart/form-data">
            <h2 class="form-signin-heading">Upload File</h2>
            <div class="form-group">
            <label for="InputFile">File input</label>
            <input type="file" name="file" id="InputFile">
            <p class="help-block">Upload Files </p>
      </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>
   </form>
</ul>

<?php

if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=Heroku', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-54-83-36-37.compute-1.amazonaws.com;port=5432;user=fsyfbnelcoqxzt;password=85d6fb4e290a64c0bd8e71e0648dc2b8917b1d20bdb812fd5bcf0feb17fe648e;dbname=df10272s944emd",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")));
}  

if($pdo === false){
     echo "ERROR: Could not connect Database";
}
?>

<?php
    // gioi han file upload khong qua 100kb
    $max_size = 100000000;
 
    // lay thong tin file upload
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $type = $_FILES['file']['type'];
    echo $name;
    echo $size;
    //echo $type;
    if(isset($name) && !empty($name)){
 
    // lay duoi file
    $extension = substr($name, strpos($name, '.') + 1);
 
    // kiem tra xem co dung la file hinh anh hay khong
    if( size<=$max_size){
        $location = "uploads/";
      echo move_uploaded_file($name, $location.$name);
        if(move_uploaded_file($name, $location.$name)){
      
            // dua thong tin file vao csdl
            $query = "INSERT INTO upload(name, size, type, location) VALUES ('$name', '$size', '$type', '$location$name')";
            $stmt = $pdo->prepare($query);
            
                 if($stmt->execute() == TRUE){
                    echo "Upload file successfully.";
                    } 
                 else {
                     echo "Upload failed";
                 }
        }
    else{
        echo "Chỉ hỗ trợ file dung lượng không quá 100 KiloBytes";
    }
 
    }else{
        echo "Chọn file upload";
    }
    }
 else {
       echo "File name must be not null"; 
}
?>

</body>
</html>