<?php

$title = "Archive";
require_once 'db/article.php';
$articles = getArticles();

$articleOfCategoryOne = getArticlesByCategory(1);



include "components/header.php"; ?>


<!-- Pour chaque article for each -->
<!--Liste de card bootstrap par article-->
<!-- une card par article -->

<h1>Archives</h1>
<div class="container">

    <div class="row g-5">
        <?php foreach ($articles as $article) : ?>
            <div class="col-xl-4 col-lg-4 col-sm-6">

                <div class="card">
                    <img src=<?= $article['image'] ?> class="card-img-top" alt="livre">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article['title'] ?></h5>


                        <p class="card-text"><?= substr($article['description'], 0, 30) . "..."; ?></p>


                       <a href="article.php?id=<?php echo $article['id'];?> " class="btn btn-primary">En savoir plus"</a>

                    

                        
                        <button type="button" class="btn btn-primary position-relative">
                            Profile
                            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </button>




                    </div>
                </div>

            </div>

        <?php endforeach; ?>
    </div>
</div>
<?php include "components/footer.php"; ?>