<?php

require_once 'pdo.php';




function getCategories(){

    global $pdo;
    $sql = "SELECT * from category";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([]);
    $categories = $stmt->fetchAll();
    return $categories;
}

function getCategory($id){
    global $pdo;
    $sql = "SELECT * from category WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":id" => $id,
    ]);

    $category = $stmt->fetch();
    return $category;
}