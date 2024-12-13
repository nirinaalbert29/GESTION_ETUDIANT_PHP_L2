<?php
    $num_form = $_POST['num_etu'];
    $id_form = $_POST['code'];
    $date_form=$_POST['date'];
    $note_form=$_POST['note'];
    $servername = "localhost";
    $username = "root";
    $pasword = "";
    $dbname = "g_etudiant_php";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pasword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO control(num_etu,id_mat,date_cont,note) VALUES('$num_form','$id_form','$date_form','$note_form')";
            $conn->exec($sql);
            echo "<script>alert('Ajout reussi')</script>";
            echo "<script>window.location.href = 'form_control.php'</script>";
            //header('location:formulaire.php');
        }catch (PDOException $e) {
            //throw $th;
            echo $sql ."<br>".$e->getMessage();
        }
        $conn=null;      
?>