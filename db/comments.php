<?php

require_once 'pdo.php';




function getCommentsByArticle($articleId){

    global $pdo;
    $sql = "SELECT * from comment WHERE article_id = :article_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":article_id" => $articleId]);
    $comments = $stmt->fetchAll();
    return $comments;
}

function createComment($firstName, $content, $articleId): bool
{
    global $pdo;
    $sql = "INSERT INTO comment 
    (first_name, content, article_id, create_at)
    VALUES (:first_name, :content, :article_id, NOW())
    ";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ":first_name" => $firstName,
        ":content" => $content,
        ":article_id" => $articleId,
    ]);
}