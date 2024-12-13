<?php
    $id_form = $_POST['id'];
    $nom_form = $_POST['nom'];
    $coef_form=$_POST['coef'];
    $servername = "localhost";
    $username = "root";
    $pasword = "";
    $dbname = "g_etudiant_php";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pasword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO matiere(id_mat,nom_mat,coeff_mat) VALUES('$id_form','$nom_form','$coef_form')";
            $conn->exec($sql);
            echo "<script>alert('Ajout reussi')</script>";
            echo "<script>window.location.href = 'form_matiere.php'</script>";
            //header('location:formulaire.php');
        }catch (PDOException $e) {
            //throw $th;
            echo $sql ."<br>".$e->getMessage();
        }
        $conn=null;      
?>