<?php 
    
        $id_mat=$_GET['id_mat'];
        $servername = "localhost";
        $username = "root";
        $pasword = "";
        $dbname = "g_etudiant_php";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pasword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM matiere WHERE id_mat='$id_mat'";
            $conn->exec($sql);
            echo "<script>alert('Suppression reussite')</script>";
            echo "<script>window.location.href = 'form_matiere.php#mat'</script>";
        } catch (PDOException $e) {
            //throw $th;
            echo $sql ."<br>".$e->getMessage();
        }
        $conn=null;
     

?>