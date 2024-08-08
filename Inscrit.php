<?php
// Connexion à la base de données
$serveur = "localhost"; // Adresse du serveur MySQL
$utilisateur = "rootr"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "merv"; // Nom de la base de données
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}



// Vérifier si l'utilisateur existe déjà
$requete_verif = "SELECT * FROM merveille WHERE email = '$email'";
$resultat_verif = $connexion->query($requete_verif);

if ($resultat_verif->num_rows > 0) {
    // L'utilisateur existe déjà, afficher un message d'erreur par exemple
    echo "Un utilisateur avec cet email existe déjà.";
} else {
    // L'utilisateur n'existe pas, procéder à l'insertion
    $requete_insertion = "INSERT INTO utilisateurs (nom, email, motdepasse) VALUES ('$nom', '$email', '$motdepasse')";
    
    if ($connexion->query($requete_insertion) === TRUE) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription : " . $connexion->error;
    }
}

// Fermer la connexion
$connexion->close();
?>
