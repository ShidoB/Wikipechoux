<?php

include "$racine/vue/vueEntete.php";
include "$racine/vue/vueGererMot.php";
// Inclure les modèles requis

include "$racine/modele/ModelePhoto.php";
// Vérifier si une action est définie dans l'URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Vérifier l'action à effectuer
    switch ($action) {
        case 'modifierPhoto':
            // Vérifier si les données POST sont présentes
            if (isset($_POST['formFile']) && isset($_POST['nouveauFichier'])) {
                $idPhoto = $_POST['idPhoto'];
                $targetDir = "image/"; // Dossier où enregistrer les fichiers
                $targetFile = $targetDir . basename($_FILES["formFile"]["name"]);
                $insFile = basename($_FILES["formFile"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Si l'utilisateur a téléchargé une image
                if (!empty($_FILES["formFile"]["tmp_name"])) {
                    // Vérification de la taille du fichier
                    if ($_FILES["formFile"]["size"] > 2 * 1024 * 1024) {
                        $message .= "Désolé, le fichier est trop volumineux.";
                        $uploadOk = 0;
                    }

                    // Vérification du type de fichier
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        $message .= "Désolé, seuls les fichiers JPG, JPEG, PNG sont autorisés.";
                        $uploadOk = 0;
                    }

                    // Si tout est OK, enregistrer le fichier
                    if ($uploadOk == 1) {
                        if (move_uploaded_file($_FILES["formFile"]["tmp_name"], $targetFile)) {
                            $ok = ModelePhotoDAO::insertPhoto($libelle, $insFile);
                            if (!$ok) {
                                $message .= "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                            }
                        }
                    }
                }
            }
                    
            break;

        case 'supprimerPhoto':
            // Vérifier si le nom de la photo est présent dans l'URL
            if (isset($_GET['nomPhoto'])) {
                $nomPhoto = $_GET['nomPhoto'];

                // Supprimer la photo de la base de données
                $resultat = ModelePhotoDAO::supprimerPhoto($nomPhoto);

                // Rediriger vers la page précédente
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
            break;

        default:
            // Rediriger vers une page d'erreur ou afficher un message d'erreur
            break;
    }
}
