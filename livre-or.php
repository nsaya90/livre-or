<?php
session_start();

$bdd = mysqli_connect('localhost','root','','livreor') or die("Impossible de se connecter : " . mysqli_connect_error());
$req = "SELECT * FROM utilisateurs";
$exec_req5 = mysqli_query($bdd,$req);
$req5 = mysqli_fetch_all($exec_req5, MYSQLI_ASSOC);


$ajout_commentaire = "Pour ajouter un commentaire veuillez suivre ce ";
$ajout_inscription = "Pour laisser un commentaire veuillez vous inscrire ";


$bdd = mysqli_connect('localhost','root','','livreor') or die("Impossible de se connecter : " . mysqli_connect_error());

// Requête bdd de la table "commentaires"
// Je récupère les données de ma bdd par ordre décroissant
$req3="SELECT * FROM utilisateurs INNER JOIN commentaires ON utilisateurs.id = commentaires.id_utilisateur ORDER BY commentaires.date DESC";
$exec_req3 = mysqli_query($bdd,$req3);
$results = mysqli_fetch_all($exec_req3,MYSQLI_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="./css/livre-or.css">

    <title>Livre d'or</title>
</head>

<body>
    <header>
        <div class="box_header">
            <div class="box_lien">
                <div><a href="./index.php">Accueil</a></div>
            </div>
        </div>
    </header>
    
    <div class="main_livre_or">
        <div class="box_titre_lo">
                <h1>Commentaires</h1>
        </div>
            <div class="box_main">
                <div class="box1_lo">
                    <table>
                        <?php
                        
                        foreach($results as $result)
                        {
                            echo '<tr><td>Posté le : '.$result['date'].' par '.$result['login'].'</td></tr>';
                            echo '<br><tr><td>'.$result['commentaire'].'</td></tr>';
                        }
                        ?>
                        </table>
                </div>

                <div class="box2_lo">
                     <?php

                    if(empty($_SESSION))
                    {
                        echo '<p>'.$ajout_inscription.'</p>'.'<a href="./inscription.php">ICI</a>';
                    }
                    else
                    {
                        echo '<p>'.$ajout_commentaire.'</p>'.'<a href="./commentaire.php">Lien</a>';
                    }
                    ?>
                </div>
            </div> 
        
        <footer>
                <div class="contact"><h3>© Copyright 2021 – La Philo</h3></div>
        </footer>
    </div>
</body>
</html>