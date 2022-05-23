<?php

$bdd = mysqli_connect('localhost','root','','livreor');
mysqli_set_charset($bdd, 'utf8');

        // Lorsque le formulaire
    if (isset ($_POST['Valider']))
    {
        // On vérifie si les champs sont différent de vide donc j'utilise !empty
        if (!empty($_POST['login']) AND !empty($_POST['password']) AND !empty($_POST['password2']))
        {
            // htmlspecialchars sert pour que l'utilisateur ne rentre pas de balise HTML

            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $password2 = htmlspecialchars($_POST['password2']);
        
            // SI l'utilisateur confirme son mdp 
            if( $password == $password2)
            {
                //  ALORS ajout information nouveau utilisateur dans une base de donnée
                $ajoututilisateur = "INSERT INTO utilisateurs (login , password) VALUES ('$login','$password')";
                
                if (mysqli_query($bdd, $ajoututilisateur)) 
                {
                    // --
                    // SI les conditions sont toute remplis alors on se redirige vers la page de connexion
                    header('Location: connexion.php');
                    exit;
                }
            }
        }
        else 
        {
            // Sinon si les conditions ne sont pas toute remplis afficher $erreur
            $erreur = "<p>Veuillez rentrer tout les champs</p>";
        }
    }
?>


<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="./css/inscription.css">

     
    
    <title>Espace</title>
</head>

<body>
    <header>
        <div class="box_header">
            <div class="box_lien">
                <div><a href="./index.php">Accueil</a></div>
            </div>
        </div>
    </header>

        <div class = "main">
            <div class="box_titre_inscription">
                <h1>Inscrivez-vous !</h1>
                <h2>Entrez les données demandées :</h2>
            </div>

                <div class="box_form">
                    <div class="box2_form">
                        <form method="POST" action="">

                            <div>
                                <label for="Login : "></label>
                                <input type="text" name="login" placeholder="Votre login" size="25"/>
                                
                                <label for="Mot de passe : "></label>
                                <input type="password" name="password" placeholder="Votre mot de passe" size="25"/>
                                
                                <label for="Confirmation mot de passe : "></label>
                                <input type="password" name="password2" placeholder="Confirmation mot de passe" size="25"/>
                                  
                                <input type="submit" name="Valider" value="Valider" class="bouton_valider"/>
                            </div>
                        </form>
                    </div>         
                </div>
        </div>
        <footer>
        <div class="contact"><h3>© Copyright 2021 – La Philo</h3></div>
        </footer>
    </body>
</html>