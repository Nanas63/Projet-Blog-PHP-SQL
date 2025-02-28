<?php


// On prépare ses identifiants pour se connecter à la BDD
$dsn = 'mysql:dbname=blog;host=127.0.0.1;port=3306;charset=utf8';
$user = 'root';
$password = '';

// On va ESSAYER de se connecter (mais ça peut casser AIE !)
try {
    // On renseigne nos identifiant pour créer la connection (PDO)
    $pdo = new PDO($dsn, $user, $password);

    // On peut ensuite renseigner des options par défaut comment par exemple ici, le fait
    // que l'on veuille toujours récupérer les résultats sous format "tableau associatif"
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    print('Erreur : ' . $e->getMessage());

}