<?php
require_once 'Connexion.php';
//var_dump([$_POST]);
if (isset($_POST['query'])) {
    $mot = $_POST['query'];
    $mot = htmlspecialchars($mot);
    
    // Assume you have a table named 'mots' with columns 'id' and 'libelle'
    $sql = "SELECT libelle FROM mot WHERE libelle LIKE :mot AND id_theme = 1";
    
    $connexion = Connexion::getInstance();
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':mot', $mot . '%', PDO::PARAM_STR);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)) {
        echo json_encode($result);
    } else {
        echo json_encode(['message' => 'Aucune suggestion trouvée.']);
    }
} else {
    echo json_encode(['message' => 'Aucun mot fourni.']);
}
?>
