<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleMotAleatoire.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title></title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <div class="contenuMotAleatoire">
        <div class="row">
            <div class="col-4 mx-auto text-center">

                <br> <br>
                <h1>Mot aléatoire</h1>

                <a href="./?action=motAleatoire" class="btn btn-primary">Mot aléatoire</a>

                <?php

                if (isset($motAleatoire['libelle']) && isset($motAleatoire['definition'])) {
                    echo "<p class = 'motAleatoire'> Mot : " . $motAleatoire['libelle'] . "<br> Définition : " . $motAleatoire['definition'] . "</p>";
                } else {
                    echo "<p>Aucun mot trouvé</p>";
                }
                ?>


            </div>
        </div>
    </div>

</body>