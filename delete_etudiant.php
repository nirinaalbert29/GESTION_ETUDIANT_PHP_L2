<?php 
    
        $num=$_GET['num_etu'];
        $servername = "localhost";
        $username = "root";
        $pasword = "";
        $dbname = "g_etudiant_php";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pasword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM etudiant WHERE num_etu='$num'";
            $conn->exec($sql);
            echo "<script>alert('Suppression reussite')</script>";
            echo "<script>window.location.href = 'form_etudiant.php#etudiant'</script>";
        } catch (PDOException $e) {
            //throw $th;
            echo $sql ."<br>".$e->getMessage();
        }
        $conn=null;
     

?>