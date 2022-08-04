<?php 

        if(empty($_POST['nm'])) {
            echo ("<h3>Error, Must insert a name </h3><br>");
        }else {
            $name=$_POST['nm'];
        }
        if(empty($_POST['em'])) {
            echo ("<h3>Error, Must insert an email </h3><br>");
        }else {
            $email=$_POST['em'];
        }
        if(empty($_POST['ms'])) {
            echo ("<h3>Error, Please insert your message </h3>");
        }else {
            $message=$_POST['ms'];
        }

        $conn = new mysqli ("localhost","root","","test");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

        $stmt=$conn->prepare("INSERT INTO Contact(name,email,message) VALUES(?,?,?)");
        $stmt->bind_param("sss",$name,$email,$message);
        $stmt->execute();
        $stmt->close();
        $conn->close(); 

        echo ("<hr><h3> Your message was succesfully sent to us Thank you!")

?>