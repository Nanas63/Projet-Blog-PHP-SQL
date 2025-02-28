<?php
require_once "../db/comments.php";

if (isset($_POST['first_name'])) {
    // Si j'ai un first_name en POST, ca veut dire que je dois traiter le formulaire et créer un commentaire
    $firstName = $_POST['first_name'];
    $content = $_POST['content'];
    $articleId = $_POST['articleId'];

    // On doit créer un nouveau commentaire
    $isSuccess = createComment($firstName, $content, $articleId);

    header("Location:/article.php?id=$articleId");
} else {
    header('Location:/archive.php');
}