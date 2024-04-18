<?php
include "$racine/modele/ModeleMotDAO.php";
include "$racine/modele/ModelePhoto.php";
include "$racine/vue/vueEntete.php";

$message = '';
if (isset($_POST['Ajouter'])) {
    // $inpText = $_POST['query'];
    // $sql = 'SELECT mot.libelle FROM mot WHERE libelle LIKE :libelle';
    // $connexion = Connexion::getInstance();
    // $stmt = $connexion->prepare($sql);
    // $stmt->execute(['libelle' => '%' . $inpText . '%']);
    // $result = $stmt->fetchAll();

    $leMot = filter_input(INPUT_POST, "libelle", FILTER_SANITIZE_SPECIAL_CHARS);
    $mot = ModeleMotDAO::getMotbyLibellePrecis($leMot); 

    //Vérifie si les données nécessaires sont présentes dans $_POST
    if(isset($_POST['libelle']) && !empty($_POST['libelle']) && isset($_POST['definition']) && !empty($_POST['definition'])) {
        // Récupération des données du formulaire
        $libelle = filter_input(INPUT_POST, "libelle", FILTER_SANITIZE_SPECIAL_CHARS);
        $definition = filter_input(INPUT_POST, "definition", FILTER_SANITIZE_SPECIAL_CHARS);

        // Insertion du mot dans la table Mot
        $ok = ModeleMotDAO::insertMot($libelle, $definition );
        if (!$ok){
            $message .=  "Erreur de création du mot.";
            
        } else {
            $message .=  "Le mot a été ajouté avec succès.";
        

            // Gestion de l'image uploadée
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
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $message .= "Désolé, seuls les fichiers JPG, JPEG, PNG sont autorisés.";
                    $uploadOk = 0;
                }

                // Si tout est OK, enregistrer le fichier
                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["formFile"]["tmp_name"], $targetFile)) {
                        $ok = ModelePhotoDAO::insertPhoto($libelle, $insFile );
                        if (!$ok){
                            $message .=  "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                            
                        } 
                    }

                }
            }
         }
        }
    include "$racine/vue/vueEntete.php";
    include "$racine/vue/vueAjoutMot.php";
    }else{
        include "$racine/vue/vueEntete.php";
        include "$racine/vue/vueAjoutMot.php";
    }



