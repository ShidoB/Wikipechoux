<!DOCTYPE html>
<?php
// Intégration des modèles
include_once "$racine\modele\ModeleMotDAO.php";
include_once "$racine\classes\Mot.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $mot = filter_input(INPUT_POST, "mot");
  $mot = strtoupper($mot);
  $unMot = ModeleMotDAO::getMotbyLibelle($mot);
  $idMot = $unMot->getId();
  $lesPhotos = ModeleMotDAO::getPhoto($idMot);
  $libelle = $unMot->getLibelle();
  $estTrouve = true;
} else {
  $estTrouve = false;
}
?>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/stylerechercheMot.css">
  <link rel="stylesheet" href="css/styleFond.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="">
  <div class="container p-4">
    <div class="row mt-4 ">
      <div class="col-md-8 mx-auto rounded p-4">
        <h3 class="text-center font-weight-bold">Rechercher un mot</h3>
        <hr class="my-1">
        <!--action="./?action=affichage" -->
        <form id="searchForm" method="POST">
          <div class="input-group">
            <!-- onfocus="clearPlaceholder(this)-->
            <input class="form-control form-control-lg" type="text" name="mot" id="mot" placeholder="Saisir un mot..." onfocus="clearPlaceholder(this)" aria-label=".form-control-lg example">
            <br>
            <script src="controleur/script.js"></script>
          </div>
          <div class="input-group-append">
            <input type="submit" name="submit" value="Rechercher" class="btn btn-info btn-lg rounded-3">
          </div>
        </form>
      </div>
      <div class="col-md-5" style="position: relative;margin-top: -1px;margin-left: 215px;">
        <div class="list-group" id="showList">
          <!-- Here autocomplete list will be display -->
        </div>
      </div>
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
              <!-- Carrousel Bootstrap -->
              <?php if (ModeleMotDAO::isPhoto($unMot->getId())) : ?>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <?php for ($i = 0; $i < count($lesPhotos); $i++) : ?>
                      <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                        <img src="./image/<?= $lesPhotos[$i]['fichier'] ?>" class="d-block w-100" alt="...">
                      </div>
                    <?php endfor; ?>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
                <div class="mt-3">
                  <button class="btn btn-secondary" id="showTableBtn">Modifier/Supprimer les images</button>
                </div>
              <?php endif; ?>
            <?php };
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal pour afficher le tableau -->
  <div class="modal fade" id="tableModal" tabindex="-1" aria-labelledby="tableModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-black" id="tableModalLabel">Tableau des images</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($lesPhotos as $photo) : ?>
                <tr>
                  <td><img src="./image/<?= $photo['fichier'] ?>" alt="<?= $photo['fichier'] ?>" class="img-thumbnail w-50"></td>
                  <td>
                    <form method="post" action="./controleur/ctrlGererMot.php?action=modifierPhoto">
                      <input class="m-1" type="hidden" name="idPhoto" value="<?= $idMot ?>">
                      <input type="file" name="nouveauFichier" value="<?= $photo['fichier'] ?>" class="form-control m-1" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                      <button type="submit" class="btn btn-success m-1">Modifier</button>
                    </form>

                    <!-- Ajouter ce lien pour chaque ligne dans le tableau modal -->
                    <a href="./controleur/ctrlGererMot.php?action=supprimerPhoto&idPhoto=<?= $idMot ?>" class="btn btn-danger">Supprimer</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    function clearPlaceholder(input) {
      input.placeholder = '';
    }

    $(document).ready(function() {
      $('#showTableBtn').click(function() {
        $('#tableModal').modal('show');
      });
    });
  </script>

</body>

</html>