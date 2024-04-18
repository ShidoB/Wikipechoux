<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styleFond.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Ajouter un mot</title>

</head>

<body class="text-white">
    <div class="container p-5">
        <h1 class="display-5 text-center p-4">Ajouter un Mot</h1>
        <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
        <div class="row mt-5">
            <div class="col-md-8 mx-auto rounded p-4">
                <form action="./?action=ajoutMot" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Libelle du mot</span>
                        <input required type="text" class="form-control" name="libelle" aria-label="With textarea">
                    </div>
                    <?php
                    if (isset($mot)) {
                        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $mot->getLibelle() . " existe déjà" . '</a>';
                    }
                    ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Definition du mot</span>
                        <textarea class="form-control" name="definition" aria-label="With textarea"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" type="file" id="formFile" name="formFile" accept="image/*" onchange="checkFile(this)">
                    </div>
                    <button type="submit" class="btn btn-primary" name="Ajouter">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($message)) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $message . '</a>';
    }
    ?>
</body>

</html>