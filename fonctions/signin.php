<?php
    include_once "../model/bdd.php";
    include_once "../model/select.php";
    header('Content-Type: application/json; charset=utf-8');

    $nom = html_entity_decode(filter_var($_POST['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $email = html_entity_decode(filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $unique_id = uniqid('user_', true);
    // Hachage du mot de passe
    $mdp = password_hash(
        html_entity_decode(filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)),
        PASSWORD_DEFAULT
    );

    $verif_pseudo_user = only_select("utilisateur", "nom = '$nom'", $order = null, $limit = null);
    $verif_email_user = only_select("utilisateur", "adresse_email = '$email'", $order = null, $limit = null);
    
    if($verif_pseudo_user)
    {
        $results = [
            "result" => "error",
            "msg" => "Le nom d'utilisateur est déjà utiliser"
        ];
    }
    else if($verif_email_user)
    {
        $results = [
            "result" => "error",
            "msg" => "L'adresse email est déjà utiliser"
        ];
    }
    else
    {
        $insert_data = [
            "nom" => $nom,
            "adresse_email" => $email,
            "mdp" => $mdp,
            "unique_id" => $unique_id
        ];

        insert_bdd($bdd, "utilisateur", $insert_data);

        /* creer des slugs s'il y'en a pas */
        createSlugIfNeeded($bdd, "utilisateur");

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_sharetolearn_987654321'] = $unique_id;

        $results = [
            "result" => "ok",
            "msg" => ""
        ];
    }

    // Retour en JSON
    echo json_encode($results, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>