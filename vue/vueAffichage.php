<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styleAffichageMot.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title></title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

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