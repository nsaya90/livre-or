<?php

    if(isset($_POST['valider'])) {

        // Si le login et le mdp est entré
        if(!empty($_POST['login'] && !empty($_POST['mdp']))) {

            

           

            $bdd = mysqli_connect('localhost','root','','livreor') or die("Impossible de se connecter : " . mysqli_connect_error());

            // Requête SELECT avec un WHERE du login égal au login inséré et password égal au password insérer pour afficher la l'entrée qui correspond a l'utilisateur 
            // Renvoie un array vide si l'utilisateur n'existe pas 
            $requete = ' SELECT * FROM utilisateurs WHERE login = "'.$_POST['login'].'" AND password = "'.$_POST['mdp'].'" ';
            $exec_requete = mysqli_query($bdd,$requete);
            $rep = mysqli_fetch_all($exec_requete,MYSQLI_ASSOC);
        
            // Si l'array n'est pas vide donc si l'utilisateur est présent dans la BDD 
            if(!empty($rep)) 
            {
                session_start();

               // Je stock le resultat de la requête dans une variable session 
                $_SESSION['data'] = $rep;
               
                // et je redirige vers la page de profile 
                header('Location: profil.php');
                exit;

                
            } 
         
            // SI array vide alors aucun utilisateur 
            
            else {

                $erreur = "Aucun utilisateur";
            }


        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link rel="stylesheet" href="./css/connexion.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet"> 
    
</head>

<body>
    <header>
        <div class="box_header">
            <div class="box_lien">
                <div><a href="./index.php">Accueil</a></div>
            </div>
        </div>
    </header>
        <div class="main_connexion">
                <div class="box_connexion">
                    <h1>Connexion</h1>
                    <h2>Entrez vos identifiants :</h2>

                    <div class="box_form">
                
                        <form method="POST" action="">
                        
                            <div class="box2_form">
                                <div>  
                                <label for="Login : "></label>
                                <input type="text" name="login" placeholder="Votre login"/> 
                                </div>
                                
                                <div>
                                <label for="Mot de passe : "></label>
                                <input type="password" name="mdp" placeholder="Votre mot de passe"/> 
                                </div> 
                            </div>
                            </div>
                                <div class="box_btn">
                                <input type="submit" name="valider" value="Valider" class="btn_valider">
                            </div>
                            <div class="box_erreur">
                                <?php
                                if (isset($erreur))
                                {
                                    echo '<p>'.$erreur = "Aucun utilisateur".'</p>';
                                }
                                ?> 
                            </div> 
                        </form>
                    </div>
                </div>
                      
                <footer>
                <div class="contact"><h3>© Copyright 2021 – La Philo</h3></div>
                </footer>
        </div>

</body>
</html>
