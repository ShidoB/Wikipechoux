<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleTheme.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title></title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <div class="contenu">
        <div class="col-4 mx-auto text-center">
            <form action="./?action=theme" method="POST">
                <div>
                    <select name="theme" id="theme">
                        <?php
                        foreach ($lesThemes as $unTheme) {
                        ?>
                            <option value="<?= $unTheme->getId() ?>"><?= $unTheme->getLibelle() ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-success" value="Rechercher" name="Rechercher2" />
            </form>
        </div>
        <br>
        <div class="container">
            <div class="col-md-8 mx-auto text-center">
                <?php
                if (isset($lesMots) &&  !is_null($lesMots[0])) {
                ?>
                    <h1 class="text-center">Résultat de la recherche du theme : <br> <?= $unTheme->getLibelle() ?></h1>
                    <br>
                    <br>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Mot</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($lesMots as $unMot) {
                            ?>
                                <tr>
                                    <td scope='row'>
                                        <a href="./?action=affichage&mot=<?= $unMot->getId() ?>"><?= $unMot->getLibelle() ?></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo "<br/><h2>Mot non référencé !</h2>";
                }
                ?>
            </div>
        </div>
    </div>
    <style>
        .contenu {
            overflow-y: auto;
            height: 75%;
            /* Ajout de cette propriété pour garantir une largeur maximale de 100% */
            padding: 15px;
            /* Ajout de padding pour améliorer l'apparence */
        }
    </style>
</body>