<?php

require_once 'db/pdo.php';
include "db/categories.php";

$title = "article-form";
$categories = getCategories();


include "components/header.php"; ?>

<?php


if (isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['auteur']) && isset($_POST['category_id']) && isset($_POST['image'])) {


// Si j'ai un title en POST, ca veut dire que je dois traiter le formulaire et créer un article);
$newTitle = $_POST['titre'];

$description = $_POST['contenu'];
$auteur = $_POST['auteur'];
$categoryId = $_POST['category_id'];
$image = $_POST['image'];

// INSERT INTO article(id, title, description, create_at, auteur, category_id, image) 
   // VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')

   $sql = "INSERT INTO article(title, description, create_at, auteur, category_id, image)
   VALUE(:title, :description, NOW(), :auteur, :category_id, :image)";
   
   $stmt = $pdo->prepare($sql);
   $stmt->execute([
      ":title" => $newTitle,
      ":description" => $description,
      ":auteur" => $auteur,
      ":category_id" => $categoryId,
      ":image" => $image,
   ]);
   
   header('Location: archive.php');
}

?>

<h1>Formulaire</h1>

<div class="container">
   <form method="post" action="">
      <label for="categorie-select" class="form-label"><strong>Choisir une categorie</strong></label>

      <select class="form-select" id="categorie-select" name="category_id" aria-label="Default select example">
         <?php foreach ($categories as $category) : ?>
            <option value="<?= $category['id'] ?>"><?= $category['label'] ?></option>
         <?php endforeach; ?>
      </select>

      <div class="mb-3">
         <label for="titre" class="form-label"><strong>Titre</strong></label>
         <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez votre titre">
      </div>

      <div class="mb-3">
         <label for="contenu" class="form-label"><strong>Contenu de l'article</strong></label>
         <textarea class="form-control" id="contenu" name="contenu" placeholder="Entrez votre texte" rows="7"></textarea>
      </div>

      <div class="mb-3">
         <label for="auteur" class="form-label"><strong>Auteur</strong></label>
         <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Entrez votre prénom" rows="7"></input>
      </div>

      <div class="mb-3">
         <label for="image" class="form-label"><strong>Image</strong></label>
         <input type="text" class="form-control" id="auteur" name="image" placeholder="Insérer une image" rows="7"></input>
      </div>

      <div class="col-12">
         <button class="btn btn-primary" type="submit">Envoyer</button>
      </div>
   </form>
</div>




<?php include "components/footer.php"; ?>