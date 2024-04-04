<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styleAffichageMot.css">
  <title></title>
</head>

<body>

  <div class="contenuAffichage">
    <div class="row">
      <div class="col-4 mx-auto text-center">

        <?php
        if ($estTrouve) {
        ?>
          <!-- Affichage des informations sur le mot centré -->
          <h1>
            <?= $unMot->getLibelle() ?>
          </h1>
          <h2>
            <?= $unMot->getDefinition() ?>
          </h2>
          <?php if (ModeleMotDAO::isPhoto($unMot->getId())) : ?>
            <div class="slider-container">
              <div class="menu">
                <?php for ($i = 0; $i < count($lesPhotos); $i++) : ?>
                  <label for='slide-dot-<?= ($i + 1) ?>'></label>
                <?php endfor; ?>
              </div>

              <?php for ($i = 0; $i < count($lesPhotos); $i++) : ?>
                <input class="slide-input" id="slide-dot-<?= ($i + 1) ?>" type="radio" name="slides" checked>
                <img class="slide-img" src="./image/<?= $lesPhotos[$i]['fichier'] ?>">
              <?php endfor; ?>



          <?php endif;
        } ?>




          <!-- Affichage des photos si disponibles -->
          <?php if (ModeleMotDAO::isPhoto($unMot->getId())) : ?>
            <div class="slider-container">
              <div class="menu">
                <?php for ($i = 0; $i < count($lesPhotos); $i++) : ?>
                  <label for='slide-dot-<?= ($i + 1) ?>'></label>
                <?php endfor; ?>
              </div>

              <?php for ($i = 0; $i < count($lesPhotos); $i++) : ?>
                <input class="slide-input" id="slide-dot-<?= ($i + 1) ?>" type="radio" name="slides" checked>
                <img class="slide-img" src="./image/<?= $lesPhotos[$i]['fichier'] ?>">
              <?php endfor; ?>
            </div>
          <?php endif;

          ?>
            </div>
      </div>
    </div>
</body>