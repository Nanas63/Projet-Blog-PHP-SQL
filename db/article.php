<?php
require_once 'pdo.php';


//Permet de récupérer tous les articles
//@return array //

function getArticles()
{
    global $pdo;
    $sql = "SELECT a.*, c.color, c.label FROM `article` as a join category as c on c.id = a.category_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $articles = $stmt->fetchAll();
    return $articles;
}



function getArticle($id)
{
    global $pdo;
    $sql = "SELECT a.*, c.color, c.label FROM `article` as a join category as c on c.id = a.category_id WHERE a.id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":id" => $id,
    ]);

    $article = $stmt->fetch();
    return $article;
}

function getArticlesByCategory($categoryId)
{
    global $pdo;
    $sql = "SELECT * from article WHERE category_id = :category_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":category_id" => $categoryId,
    ]);

    $articles = $stmt->fetchAll();
    return $articles;
}

function createArticle($newtitle, $description, $auteur, $categoryId, $image ): bool
{
    global $pdo;
    $sql = "INSERT INTO article
    (title, description, auteur, category_id, image, create_at)
    VALUES (:title, :description :auteur, , :category_id, :image, NOW())
    ";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ":title" => $newtitle,
        ":description" => $description,
        ":auteur" => $auteur,
        ":category_id" => $categoryId,
        ":image" => $image,

    ]);
}

