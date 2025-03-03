
<?php

require_once 'db/pdo.php';

include "components/header.php"; ?>


<?php


if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])) {
   


// Si j'ai un title en POST, ca veut dire que je dois traiter le formulaire et créer un article);
$nom = $_POST['nom'];

$prenom = $_POST['prenom'];
$email = $_POST['email'];
$motdepasse = $_POST['password'];


// INSERT INTO article(id, title, description, create_at, auteur, category_id, image) 
   // VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')

   
   $sql ="INSERT INTO utilisateur(nom, prenom, email, motdepasse)
    VALUES (:nom, :prenom,:email,:motdepasse)";
   
   $stmt = $pdo->prepare($sql);
   $stmt->execute([

      ":nom" => $nom,
      ":prenom" => $prenom,
      ":email" => $email,
      ":motdepasse" => $motdepasse,
   ]);
   
   header('Location: archive.php');
}

?>

<h1>Formulaire</h1>

<div class ="container">
   <form method="post" action="">
   
      <div class="mb-3">
         <label for="nom" class="form-label"><strong>Nom</strong></label>
         <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom">
      </div>

      <div class="mb-3">
         <label for="prenom" class="form-label"><strong>Prénom</strong></label>
         <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" rows="7"></input>
      </div>
      
      <div class="mb-3">
         <label for="email" class="form-label"><strong>Email</strong></label>
         <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" rows="7"></input>
      </div>

      <div class="mb-3">
         <label for="mot de passe" class="form-label"><strong>Mot de passe</strong></label>
         <input type="text" class="form-control" id="mot de passe" name="password" placeholder="Login" rows="7"></input>
      </div>

      <div class="col-12">
         <button class="btn btn-primary" type="submit">Envoyer</button>
      </div>
   </form>
</div>


<?php include "components/footer.php"; ?>