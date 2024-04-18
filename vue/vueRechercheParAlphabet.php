<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleRechercheParAlphabet.css">
    <link rel="stylesheet" href="css/styleFond.css">
    <title></title>
</head>

<body>

    <div class="contenuRechercheParAlphabet">
        <div class="row">
            <div class="mx-auto text-center text-black">
                <form action="./?action=rechercheParAlphabet" method="POST">
                    <div>
                        <select name="lettre" id="lettre">
                            <?php for ($i = 65; $i <= 90; $i++) {
                            ?>
                                <option value="<?= chr($i) ?>"><?= chr($i) ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success" value="Rechercher" name="Rechercher" />
                    <br />
                </form>
                <br /><br />
            </div>

        </div>

        <div class="container">
            <br />

            <br /><br />
            <div class="row">
                <div class="col-md-8 mx-auto text-center">

                    <?php
                    if (isset($lesMots)) {
                    ?>
                        <h1 class="text">Résultat de la recherche</h1> <br><br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mot</th>

                                    <th scope="col">Thème</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lesMots as $unMot) {

                                ?>
                                    <tr>

                                        <td scope='row'>

                                            <a href="./?action=affichage&mot=<?= $unMot->getId() ?>"><?= $unMot->getLibelle() ?>
                                            </a>

                                            <?php // Ajout Icone photo pour les mots ayant des photos dans les listes
                                            if (ModeleMotDAO::isPhoto($unMot->getId())) {
                                            ?>
                                                <img src="./image/Icone_photo.png" alt="Icone Photo" width="18">
                                            <?php
                                            }
                                            ?>

                                        </td>
                                        <?php /*<td><?= $unMot->getDefinition() ?></td>
                        <td><?= $unMot->getDateCreation() ?></td>**/ ?>
                                        <td><?= $unMot->getTheme()->getLibelle() ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } else {
                        //echo "<br/><h2>Mot non référencé !</h2>";
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</body>