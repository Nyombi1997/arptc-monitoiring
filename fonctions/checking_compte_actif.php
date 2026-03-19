<?php
    if(isset($_SESSION['user_sharetolearn_987654321']))
    {
        $user = select_bdd($bdd, "utilisateur", $where = 'unique_id = "'.$_SESSION['user_sharetolearn_987654321'].'"', $limit = null, $offset = 0, $order = null, $random = false);
        if(count($user)!=0)
        {
            $user = $user[0];
            $profile = '<img src="'.ASSET.'images/profile/default.jpg" alt="" srcset="" id="profile_utilisateur">';
            if($user['profile']!='')
            {
                $profile = '<img src="'.ASSET.'images/profile/'.$user['profile'].'" alt="" srcset="" id="profile_utilisateur">';
            }
            $nom = $user['nom'];
            $email = $user['adresse_email'];
            $description = $user['description'];
            $unique_id = $_SESSION['user_sharetolearn_987654321'];
            /* verifier si l'utilisateur a déjà reçu l'email de bienvenue */
            /* $verif_welcome_email = select_bdd($bdd, "bienvenue_email", $where = 'client_unique_id = "'.$user['unique_id'].'"', $limit = null, $offset = 0, $order = null, $random = false);
            if(count($verif_welcome_email)==0)
            {
                welcome($email = $user['adresse_email']);
                $insert_data = [
                    "client_unique_id" => $user['unique_id']
                ];
                insert_bdd($bdd, "bienvenue_email", $insert_data);
            } */
        }
        else
        {
            // Rediriger vers une page d'erreur ou afficher un message
            header("Location:/404");
            exit();
        }
    }
    else
    {
        // Rediriger vers une page d'erreur ou afficher un message
        header("Location:/404");
        exit();
    }
?>