<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/vitrine.css" media="all"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <title> Prestachope </title>
  </head>
  <body>
    <div class="contenue">
        <?php
          include_once "vitrine_controlleur.php";
          $instanceController = new vitrine_controlleur();
          $allcat=$instanceController->IncludeAllCategorie();
          foreach ($allcat as $allcate)
          {

              $cat=$instanceController->IncludeCategorie($allcate->getIdCategorie());
              foreach ($cat as $cate)
              {
                  ?>
                    <div class="produitbycat">
                        <div class="Nom">
                          <h1> Nos <?php echo $cate->getCategorieProduit();?></h1> <br>
                          <a href="index.php?categorie=<?php echo $cate->getIdCategorie();?>&page=pagerecherche"> Plus de <?php echo $cate->getCategorieProduit();?> <i class="fas fa-arrow-right"></i> </a>
                        </div>
                  <?php
               }
                  ?>
                        <div class="listproduit">
                        <?php
                        $content=$instanceController->IncludeProduit($allcate->getIdCategorie());
                        foreach ($content as $contents)
                        {
                        ?>
                        <div class="descProduit">
                            <div class="produit">
                                <a href="index.php?produit=<?php echo $contents->getId()?>&page=detail"><img class="imgProduit" src= "<?php echo $contents->getImage() ?>"></a><br>
                            </div>
                            <div class="texte">
                              <h3> <?php echo $contents->getNom() ?> </h3>
                              <p> <?php echo $contents->getDescription() ?></p>
                              <p> <?php echo $contents->getPrix() ?> €</p>
                            </div>
                            <button class="btnpanier"> <a href="index.php?page=achat&nom=<?php echo $contents->getNom()?>">Ajouter </a></button>
                        </div>
                          <?php
                        }
                        ?>
                        </div>
                    </div>
              <?php
          }
        ?>
    </div>
  </body>
</html>
