<?php
require_once "../db/article.php";


if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['auteur']) && isset($_POST['category_id']) && isset($_POST['image'])) {

    // Si j'ai un title en POST, ca veut dire que je dois traiter le formulaire et créer un article

    $title = $_POST['title'];
    $description = $_POST['description'];
    $auteur = $_POST['auteur'];
    $category_id = $_POST['category_id'];
    $image = $_POST['image'];

    // On doit créer un nouveau article
    $issucces= createArticle($title, $description, $auteur, $category_id, $image);


    header("Location:/article.php?id=$articleId");
} else {
    header('Location:/archive.php');
}