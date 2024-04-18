<?php
include_once "$racine/classes/Mot.php";
require_once("Connexion.php");
require_once("ModeleMotDAO.php");

class ModelePhotoDAO
{
    public static function  isPhoto($idMot)
    {
        $sql = "select count(*) as nb from photo where id_mot = " . $idMot;
        $isPhoto = true;
        $req = Connexion::getInstance()->query($sql);
        $nb = $req->fetchColumn();

        if ($nb == 0) {
            $isPhoto = false;
        }

        return $isPhoto;
    }


    public static function getPhoto($idMot)
    {
        if (self::isPhoto($idMot)) {

            $req = Connexion::getInstance()->prepare("Select fichier from photo where id_mot = " . $idMot);
            $req->execute();
            $lesPhotos = $req->fetchall();
            return $lesPhotos;
        }
    }

    public static function insertPhoto($libelle, $insFile)
    {
        $ok = false;
        $mot = ModeleMotDAO::getIdByLibellePrecis($libelle);
        $id_mot = $mot->getId();
        // Insertion de l'image dans la table Photo
        $sql = "INSERT INTO Photo (fichier, id_mot) VALUES (:fichier, :id_mot)";
        $req = Connexion::getInstance()->prepare($sql);
        $req->bindValue(':id_mot', $id_mot, PDO::PARAM_INT);
        $req->bindValue(':fichier', $insFile);
        if ($req->execute()) $ok = true;
        return $ok;
    }

    public static function modifierPhoto($idPhoto, $nouveauFichier)
    {
        $sql = "UPDATE photo SET fichier = :nouveauFichier WHERE id_mot = :idPhoto";
        $req = Connexion::getInstance()->prepare($sql);
        $req->bindValue(':nouveauFichier', $nouveauFichier);
        $req->bindValue(':idPhoto', $idPhoto, PDO::PARAM_INT);
        return $req->execute();
    }

    // Supprimer une photo de la base de données
    public static function supprimerPhoto($idPhoto)
    {
        $sql = "DELETE FROM Photo WHERE id = :idPhoto";
        $req = Connexion::getInstance()->prepare($sql);
        $req->bindValue(':idPhoto', $idPhoto, PDO::PARAM_INT);
        return $req->execute();
    }
}
