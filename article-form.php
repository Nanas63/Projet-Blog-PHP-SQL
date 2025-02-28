<?php

include "db/categories.php";
$title = "article-form";
$categories = getCategories();


include "components/header.php"; ?>

<h1>Formulaire</h1>


<form method="'post"  action="">
<label for="categorie-select" class="form-label"><strong>Choisir une categorie</strong></label>
<select class="form-select" id="categorie-select" name="category_id" aria-label="Default select example">
   <?php foreach ($categories as $category) : ?>
      <option value="<?= $category['id'] ?>"><?= $category['label'] ?></option>
   <?php endforeach; ?>
</select>

<div class="mb-3">
   <label for="exampleFormControlInput1" class="form-label"><strong>Titre</strong></label>
   <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez votre titre">
</div>
<div class="mb-3">
   <label for="exampleFormControlTextarea1" class="form-label"><strong>Contenu de l'article</strong></label>
   <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Entrez votre texte " rows="7"></textarea>
</div>
<div class="col-12">
   <button class="btn btn-primary" type="submit">Envoyer</button>
</div>
</form>





<?php include "components/footer.php"; ?>