<?php

                if(empty($_SESSION))
                {
                    
                        echo '<a href="./index.php">Accueil</a> 
                        <a href="./inscription.php">Inscription</a> 
                        <a href="./connexion.php">Connexion</a> 
                        <a href="./livre-or.php">Livre d or</a>';
                    
                }
                else
                {
                    echo '<a href="./index.php">Accueil</a> 
                    <a href="./profil.php">Profil</a> 
                    <a href="./deconnexion.php">Deconnexion</a> 
                    <a href="./livre-or.php">Livre d or</a>'; 
                }
?>