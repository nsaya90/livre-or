<?php

session_start();

$dataUser = $_SESSION['data'][0];
$id_user = $dataUser['id'];

if(isset($_POST['Modifier']))
{
 
    if(!empty($_POST['login']) AND !empty($_POST['password']))
    {

    $login = $_POST['login'];
    $password = $_POST['password'];
   
    $bdd = mysqli_connect('localhost','root','','livreor') or die("Impossible de se connecter : " . mysqli_connect_error());

    $requete = "UPDATE utilisateurs SET login = '$login', password='$password' WHERE id = '$id_user'";
    $exec_requete = mysqli_query($bdd,$requete);

            header("Location: connexion.php");
        
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/profil.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet"> 
    <title>Profil</title>
</head>

<header>
    <div class="box_header">
        <div class="box_lien">
            <div><a href="./index.php">Accueil</a></div>
            <div><a href="./livre-or.php">Livre d'or</a></div>
            <div><a href="./deconnexion.php">Déconnexion</a></div>
            
        
        </div>
    </div
</header>


<body>
<br>
<h1>Bienvenue sur votre profil</h1>

<div class="box_text">
    <ul>
        <li>Login : <?php echo $dataUser['login'] ?></li>
        <li>Mot de passe : <?php echo $dataUser['password'] ?></li>
        
    </ul>
</div>
    
        <div class="box_form_profil">

                <form method="POST" action="">
                <div class="txt1_profil"><p>Pour modifier vos informations veuillez remplire les champs suivant : </p></div>

                    <div>
                        <label for="Login : "></label>
                        <input type="text" name="login" placeholder="<?php echo $dataUser['login'] ?>" size="25"/>
                    </div> 
                    <div>
                            <label for="Mot de passe : "></label>
                            <input type="password" name="password" placeholder="<?php echo $dataUser['password']?>" size="25"/>
                    </div>
                    
                    <div class="box_btn">
                            <input type="submit" name="Modifier" value="Modifier" class="btn_valider"/>
                    </div>
                </form>
                
                    <div class="box_lien_lo">
                        <p>Pour rédiger un commentaire sur le livre d'or , veuillez cliquer sur ce <a href="./commentaire.php">lien</a></p>
                    </div>

        </div>
</body>
</html>

