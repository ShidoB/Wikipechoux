<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleFlashCode.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title></title>
</head>

<div class="flashcode1">

    <body style="background-color: lightgray">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

        <div class="row">
            <div class="col-4 mx-auto text-center">
                <br>
                <h1>Flash Code</h1>
                <img src="image/flashCode.png" style="padding: 30px;" alt="Flash Code Image">

                <?php
                // Vérifier si des erreurs ont été transmises (par exemple, une erreur de code invalide)
                if (isset($erreur)) {
                    echo '<p style="color: red;">' . $erreur . '</p>';
                }
                ?>

                <!-- Afficher le formulaire -->
                <form action="./?action=flashCode" method="POST">
                </form>
            </div>
        </div>
        <br>
</div>