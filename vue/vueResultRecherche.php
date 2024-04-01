<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <div class="row">
        <div class="col-4 mx-auto text-center">
            <form action="./?action=dico" method="POST">
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

</body>

</html>