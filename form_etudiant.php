<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../projetJs/css/bootstrap.css">
<link rel="stylesheet" href="../projetJs/css/bootstrap.min.css">
<link rel="stylesheet" href="etudiant.css">

<script src="../projetJs/js/jquery.js"></script>
    <script src="../projetJs/js/bootstrap.js"></script>
    <script src="../projetJs/js/bootstrap.min.js"></script>
    <script src="../projetJs/js/popper.min.js"></script>
<script>
  $(function(){
  $(document).ready(function(){
$('.myBtn').on('click', function() {
  modal.style.display = "block";
  $tr = $(this).closest('tr');
  var  data = $tr.children("td").map(function(){
    return $(this).text();
  }).get();
  $('#code').val(data[0]);
   $('#lib').val(data[1]);
   $('#pu').val(data[2]);
   $('#qt').val(data[3]);
});
});

});
</script>

</head>
<body>

<div style="margin-left:80px;">
  <h1 style="color:green">Gestion d'Etudiant</h1>
</div>
   
<h2 style="color:red">Saisir nouveau Etudiant</h2>

<div class="container">
  <form action="insert_etudiant.php" method="post" id="etudiant">
    <label for="fname">Nom Etudiant   :</label>
    <input type="text" id="nom" name="nom" placeholder="nom..">
    <div>
      <p style="color: red" id="erreur1"></p>
    </div>
  
    <label for="lname">Prénom Etudiant   :</label>
    <input type="text" id="prenom" name="prenom" placeholder="Prenom...">
    <div>
      <p style="color: red" id="erreur2"></p>
    </div>
    <label for="lname" style="margin-left: 10px;">Date de naissance   :</label>
    <input type="date" id="date" name="date">
    <div>
      <p style="color: red" id="erreur3"></p>
    </div>
    <input type="submit" value="E N R E G I S T R E R ">
  </form>
</div>
<script src="../projetJs/controle_produit.js"></script>

<div class="container">
      <h2 style="color:red">Listes des Etudiant</h2>           
      <table class="table table-dark" id="tab">
        <thead>
          <tr>
            <th>Numero etudiant</th>
            <th>Nom etudiant</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th>Suppression</th>
            <th>Modification</th>
            
          </tr>
        </thead>
        <?php
            $servername = "localhost";
            $username = "root";
            $pasword = "";
            $dbname = "g_etudiant_php";
    
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pasword);
                $resultat = $conn->prepare("SELECT * FROM etudiant");
                $resultat->execute();
                $res = $resultat->fetchall();
                foreach ($res as $etudiant){
                    $num = $etudiant['num_etu'];
                    echo "<tr>";
                    echo "<td>".$etudiant['num_etu']."</td>";
                    echo "<td>".$etudiant['nom_etu']."</td>";
                    echo "<td>".$etudiant['prenom_etu']."</td>";
                    echo "<td>".$etudiant['datenais_etu']."</td>";
                    echo "<td><a href='#'class='myBtn btn btn-danger'>Supprimer</a></td>";
                    echo "<td><a  href='#' class=' btn btn-primary'  >Modifier</a></td>";
                   
                    echo "</tr>";
                }
            } catch (\Throwable $th) {
                //throw $th;
                echo $sql ."<br>".$e->getMessage();
            }
        ?>
      </table>
    </div>

           <!-- -->

           <!-- Trigger/Open The Modal -->



<!-- The Modal -->
<div id="myModal" class="modal" role="dialog">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Modal Header</h2>
    </div>
    <div class="modal-body">
      <h2>Effectuer la modification</h2>
      <div class="container">
        <form action="" method="post">
            <input type="hidden" name="code" id="code">
            <label for="lname">Nom</label>
            <input type="text" id="lib" name="lib" placeholder="Nom.." value="<?= (isset($prod["libelle"])) ? $prod["libelle"]:"" ?>">

            <label for="lname">Prenom</label>
            <input type="text" id="pu" name="pu" placeholder="Prenom..">

            <label for="lname">Date</label>
            <input type="date" id="date" name="qt">
            <input type="submit" name="valide" value="V A L I D E R">
        </form>
        </div>
    </div>
    

    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementsByClassName("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 




// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<!--modal facture-->
<div class="container">
  

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<!---modal suprr-->
<button onclick="document.getElementById('id01').style.display='block'">Open Modal</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" action="https://www.w3schools.com/action_page.php">
    <div class="container">
      <h1>Delete Etudiant</h1>
      <p>Voulez-vous vraiment supprimer?</p>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <?php
            echo'<button type="button" href="delete_etudiant.php?num_etu=$num" class="deletebtn">Delete</button>';
        ?>
    </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>

<!-- Mirrored from www.w3schools.com/howto/tryit.asp?filename=tryhow_css_contact_form by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Dec 2020 09:02:24 GMT -->
</html>

<?php
if(isset($_POST['valide'])){
//  var_dump($_POST);

  $servername = "localhost";
        $username = "root";
        $pasword = "";
        $dbname = "g_etudiant_php";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pasword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //libelle= '".4."' ,prix_produit,quantite_stock"
            $sql = 'UPDATE  etudiant SET nom_etu="'.$_POST['lib'].'", prenom_etu="'.$_POST['pu'].'", datenais_etu="'.$_POST['qt'].'" WHERE num_etu="'.$_POST['code'].'"';
            $conn->exec($sql);
            echo "<script>alert('Bien modifier')</script>";
            echo "<script>window.location.href = 'form_etudiant.php'</script>";
            //header('location:formulaire.php');
        }catch (PDOException $e) {
            //throw $th;
            echo $sql ."<br>".$e->getMessage();
        }
        $conn=null;
        
}

