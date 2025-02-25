<?php

$articles = [1, 2, 3, 4, 5];
$title = "Archive";


include "components/header.php"; ?>


<!-- Pour chaque article for each -->
<!--Liste de card bootstrap par article-->
<!-- une card par article -->


<div class="container">
    <h1>Archives</h1>
    
    <div class="row g-5">
        <?php foreach ($articles as $article) :?>
        <div class="col-xl-4 col-lg-4 col-sm-6">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title <?= $article ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>

        <?php endforeach; ?>
    </div>
</div>    
    <?php include "components/footer.php"; ?>