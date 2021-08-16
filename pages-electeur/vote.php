<?php
session_start();  
$idele = $_SESSION['id_electeur']; 

if(isset($idele)){

$nom = $_SESSION['nomelecteur'];
$prenom = $_SESSION['prenomelecteur'];
$idele = $_SESSION['id_electeur'];
$commune =$_SESSION['commune'];
$bureau = $_SESSION['bureau'];

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ELECTION PRESIDENTIEL DU SENEGAL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ELECTION DU SENEGAL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">ACCUEIL</a>
      </li>
  </div>
</nav>
<div class="container">

    <h1 class="text-center">ELECTION PRESIDENTIEL DU SENEGAL</h1>
    <form action="" method="post">
    <?php

    ?>

    <p><h4>Id electeur : <?php echo $idele ?></h4</p>
    <p><h4>Nom : <?php echo strtoupper($nom) ?></h4></p>
    <p><h4>prenom : <?php echo strtoupper($prenom) ?></h4></p>
    <p><h4>Commune : <?php echo strtoupper($commune) ?></h4></p>
    <p><h4>Bureau : <?php echo strtoupper($bureau) ?></h4></p>
    <h2 class="text-center">Selectionnez le candidat à voter</h2>
        <?php
       
        include '../modele.php';
        $model = new Election();
        $rows = $model->listeCandidat();
        $vote = $model->vote();
        $i= 1;
        if(!empty($rows)){
            foreach($rows as $row){

        ?>


        <input type="radio" name="id_candidat" value="<?php echo $row['id_candidat'];?>">
        <label for=""><?php echo strtoupper($row['prenom_candidat']);?>  <?php echo strtoupper($row['nom_candidat']);?></label><br>
       
    <?php
         }
        }
    ?>


     
        <input class="text-center" type="submit" name="submit" value="Votez">        
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  



  <?php
}else{
  header('Location: http://vote/Admin_Electeur/index.php');
}


?>
<!-- script cdnbootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
crossorigin="anonymous"></script>
</body>
</html>
