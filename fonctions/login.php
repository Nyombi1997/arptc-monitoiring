<?php
    include_once "../model/bdd.php";
    include_once "../model/select.php";
    header('Content-Type: application/json; charset=utf-8');

    $email = html_entity_decode(filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    // Hachage du mot de passe
    $mdp = password_hash(
        html_entity_decode(filter_var($_POST['mdp'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)),
        PASSWORD_DEFAULT
    );
    $user = select_bdd($bdd, "utilisateur", $where = 'adresse_email = "'.$email.'"', $limit = null, $offset = 0, $order = null, $random = false);
    if(count($user)==0)
    {
        $results = [
            "result" => "error",
            "msg" => "L'adresse email ou le mot de passe est incorrect."
        ];
    }
    else
    {
        if(password_verify($_POST['mdp'], $user[0]['mdp']))
        {
            $results = [
                "result" => "ok",
                "msg" => "compte"
            ];
            $_SESSION['user_sharetolearn_987654321'] = $user[0]['unique_id'];
        }
        else
        {
            $results = [
                "result" => "error",
                "msg" => "L'adresse email ou le mot de passe est incorrect."
            ];
        }
    }

    // Retour en JSON
    echo json_encode($results, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>