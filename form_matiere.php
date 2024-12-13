<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../projetJs/css/bootstrap.css">
<link rel="stylesheet" href="../projetJs/css/bootstrap.min.css">
<link rel="stylesheet" href="matiere.css">
<link rel="stylesheet" href="w3.css">

<script src="../projetJs/js/jquery.js"></script>
    <script src="../projetJs/js/bootstrap.js"></script>
    <script src="../projetJs/js/bootstrap.min.js"></script>
    <script src="../projetJs/js/popper.min.js"></script>
</head>
<script>
  $(function(){
  $(document).ready(function(){
$('.yourBtn').on('click', function() {
  modal.style.display = "block";
  $tr = $(this).closest('tr');
  var  data = $tr.children("td").map(function(){
    return $(this).text();
  }).get();
  $('#id').val(data[0]);
   $('#nome').val(data[1]); 
   $('#pren').val(data[2]);
});
});

});
</script>
<body>
  <nav>
  <h2>Matiere</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<div class="w3-container">
<div  style="text-align:center;background-color: cadetblue;">
  <nav>
      <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Ajout</button>
  </nav>
  </div>
<div style="text-align:center;background-color: cadetblue;color: chocolate;"><h2>Listes des matières</h2></div>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
  <form action="insert_matiere.php" id="mat" method="POST">
    <h1>Ajout nouveau matière</h1>

    <label for="email"><b>Code Matière</b></label>
    <input type="text" placeholder="Enter code" name="id" required>

    <label for="psw"><b>Nom matière</b></label>
    <input type="text" placeholder="Enter Nom matière" name="nom" required>

    <label for="email"><b>Coefficient</b></label>
    <nav>
        <select id="coef" name="coef" style="width: 100%;">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
    </nav>

    <button type="submit" class="btn">Ajouter</button>
  </form>
      </div>
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>
</div>

<table class="table table-dark table-striped"  id="myTable" style="margin-left: 20px;margin-right: 10px;">
  <tr class="header">
    <th style="width:20%;">code Matiere</th>
    <th style="width:20%;">Nom matiere</th>
    <th style="width:20%;">coefficient matiere</th>
    <th style="width:20%;">Modification</th>
    <th style="width:20%;">Suppression</th>
  </tr>
  <?php
            $servername = "localhost";
            $username = "root";
            $pasword = "";
            $dbname = "g_etudiant_php";
    
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pasword);
                $resultat = $conn->prepare("SELECT * FROM matiere");
                $resultat->execute();
                $res = $resultat->fetchall();
                foreach ($res as $matiere){
                    $id_mat = $matiere['id_mat'];
                    echo "<tr>";
                    echo "<td>".$matiere['id_mat']."</td>";
                    echo "<td>".$matiere['nom_mat']."</td>";
                    echo "<td>".$matiere['coeff_mat']."</td>";
                    echo "<td><a  href='#' class='yourBtn btn btn-secondary'>Modifier</a></td>";
                    echo "<td><a href='delete_matiere.php?id_mat=$id_mat'class='myBtn btn btn-danger'>Supprimer</a></td>";
                   
                    echo "</tr>";
                }
            } catch (\Throwable $th) {
                //throw $th;
                echo $sql ."<br>".$e->getMessage();
            }
        ?>
</table>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>




<div id="yourModal" class="modal" >

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>MODIFICATION MATIERE</h2>
    </div>
    <div class="modal-body">
    <div class="container">
        <form action="" method="post">

        
        
    </div>
    <div class="form-group">
    <label for="email">CODE MATIERE</label>
    <input type="text" class="form-control" id="id" name = "id_x">
  </div>
    
    <div class="form-group">
    <label for="email">NOM MATIERE</label>
    <input type="text" class="form-control"  id="nome" name = "nom_x" >
  </div>
  <div class="form-group">
    <label for="email">COEFFICIENT MATIERE</label>
    <input type="text" class="form-control"  id="pren" name = "prenom_x">
  </div>
    </div>
    <div class="modal-footer">
    <input type="submit" value="VALIDER LA MODIFICATION" name="modifier" class="btn btn-secondary">
    </div>
    </form>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("yourModal");

// Get the button that opens the modal
var btn = document.getElementsByClassName("yourBtn");

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
</body>
</html>
<?php
if(isset($_POST['modifier'])){
//  var_dump($_POST);

   $servername = "localhost";
   $username = "root";
   $password ="";
   $dbname = "g_etudiant_php";
    
   try {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = 'UPDATE  matiere SET id_mat="'.$_POST['id_x'].'", nom_mat="'.$_POST['nom_x'].'", coeff_mat="'.$_POST['prenom_x'].'" WHERE id_mat="'.$_POST['id_x'].'"';
       $conn->exec($sql);
       echo "<script>alert('Bien modifier')</script>";
       echo "<script>window.location.href = 'form_matiere.php'</script>";
   }
   catch(PDOException $e){
       echo  $sql."<br>".$e->getMessage();
   }
   $conn=null;
}

?>
