<?php
    $nom_form = $_POST['nom'];
    $prenom_form = $_POST['prenom'];
    $date_form=$_POST['date'];
    $servername = "localhost";
    $username = "root";
    $pasword = "";
    $dbname = "g_etudiant_php";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pasword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO etudiant(nom_etu,prenom_etu,datenais_etu) VALUES('$nom_form','$prenom_form','$date_form')";
            $conn->exec($sql);
            echo "<script>alert('Ajout reussi')</script>";
            echo "<script>window.location.href = 'form_etudiant.php#etudiant'</script>";
            //header('location:formulaire.php');
        }catch (PDOException $e) {
            //throw $th;
            echo $sql ."<br>".$e->getMessage();
        }
        $conn=null;      
?>