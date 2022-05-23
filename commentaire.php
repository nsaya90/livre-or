<?php

session_start();

    $bdd = mysqli_connect('localhost','root','','livreor') or die("Impossible de se connecter : " . mysqli_connect_error());

    $dataUser = $_SESSION['data'][0];
    $id_user = $dataUser['id'];
    $id_utilisateur = $dataUser['login'];

    var_dump($id_user);



if(isset($_POST['valider']))
{
    

    if (!empty($_POST['texte']))
    {
        $commentaire =  mysqli_real_escape_string($bdd,$_POST['texte']);
        $bdd = mysqli_connect('localhost','root','','livreor') or die("Impossible de se connecter : " . mysqli_connect_error());

        $req ="INSERT INTO commentaires (id_utilisateur, commentaire, date) VALUES ('$id_user','$commentaire',NOW())";
        $exec_requete = mysqli_query($bdd,$req);
        
        header("Location:livre-or");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/commentaire.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet"> 

    <title>Commentaire</title>
</head>


<body>

    <header>
        <div class="box_header">
            <div class="box_lien">
                <div><a href="./index.php">Accueil</a></div>
                <div><a href="./livre-or.php">Livre d'or</a></div>
                <div><a href="./deconnexion.php">Déconnexion</a></div>
            </div>
        </div>
    </header>

    <form method="POST" action="">

        <h2>Votre commentaire : </h2>
            <div>
                <textarea name="texte" cols="50" rows="10"></textarea>
            </div> 
        
            <div>
                <input type="submit" name="valider" value="Valider" class="btn_valider"/>
            </div>
    </form>

    <footer>
            <div class="contact"><h3>© Copyright 2021 – La Philo</h3></div>
    </footer>
    
</body>
</html>

