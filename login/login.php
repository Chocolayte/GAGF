<?php

    if (isset($_POST['pass']) AND $_POST['pass'] ==  "alextacky") // Si le mot de passe est bon, par exemple alextacky
    {
    // On affiche lui affiche l'interface et les services auxquels il a accès
    ?>
        <p>
           Bienvenue sur votre espace qui vosu permet d'acceder à vos fonctionnalités 
        </p>
		
        <?php
    }
    else // Sinon, on affiche un message d'erreur
    {
        echo '<p> Mot de passe incorrect</p>'; // et on le renvoie lui propose mot de passe oublié? ou alors de rentrer sur la page de connexion !
    }
    ?>
    