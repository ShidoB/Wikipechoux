<?php
// vueEntete.php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleEntete.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title></title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>


    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top ">
        <div class="container-fluid">
            <a class="navbar-brand" href="./?action=acceuil">Wikipechoux</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./?action=acceuil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./?action=intro">Introduction</a>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Autre
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li>
                                <h5 class="dropdown-header">Mots</h5>
                            </li>

                            <li><a class="dropdown-item" href="./?action=rechercheParAlphabet">Recherche par Mot</a>
                            </li>
                            <li><a class="dropdown-item" href="./?action=theme">Recherche par Thème</a></li>
                            <li><a class="dropdown-item" href="./?action=motAleatoire">Mot Aléatoire</a></li>

                            <hr class="dropdown-divider">
                    </li>

                    <li>
                        <h5 class="dropdown-header">Autre</h5>
                    </li>
                    <li><a class="dropdown-item" href="./?action=madeleines">Madeleine</a></li>
                    <li>
                    <li><a class="dropdown-item" href="./?action=flashCode">Flash Code</a></li>
                    <li><a class="dropdown-item" href="./?action=historique">Historique</a></li>
                </ul>
                </li>
                <?php
                //if (isset($_SESSION['login'])) {
                ?>

                    <li class="nav-item dropdown">
                        <button class="btn text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestion de l'Encyclopédie
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li>
                                <h5 class="dropdown-header">Gestion des Mots</h5>
                            </li>

                            <li><a class="dropdown-item" href="./?action=gererMot">Gerer les mots</a>
                            </li>
                            <li><a class="dropdown-item" href="./?action=ajoutMot">Ajouter un mot</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <h5 class="dropdown-header">Gestion des Madeleines</h5>
                            </li>
                            <li><a class="dropdown-item" href="./?action=">Gerer les madeleines</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <h5 class="dropdown-header">Gestion des Montres</h5>
                            </li>
                            <li><a class="dropdown-item" href="./?action=">Gerer les montres</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./?action=login&type=out">Se déconnecter</a>
                    </li>

                <?php //} else { ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./?action=login&type=in">Se
                            connecter</a>
                    </li>
                <?php //} ?>
                </ul>
            </div>
        </div>
    </nav>

</body>