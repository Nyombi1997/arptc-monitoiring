<?php
    include_once "../model/bdd.php";
    include_once "../model/select.php";
    header('Content-Type: application/json; charset=utf-8');
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    /* SI ON EST CONNECTER */
    if(isset($_SESSION['user_sharetolearn_987654321']))
    {
        $boutique = select_bdd($bdd, "utilisateur", $where = 'unique_id = "'.$_SESSION['user_sharetolearn_987654321'].'"', $limit = null, $offset = 0, $order = null, $random = false);
        if(count($boutique)!=0)
        {
            if(isset($_FILES['croppedImage'])){

                $uploadPath = "../asset/images/publication/images/";
                $fileName = "publication_image_".time().".png";

                move_uploaded_file($_FILES['croppedImage']['tmp_name'],$uploadPath.$fileName);
                $results = [
                    "result" => "ok",
                    "msg" => $fileName
                ];

            }
        }
        else
        {
            $results = [
                "result" => "error",
                "msg" => "Vous n'êtes plus connecter"
            ];
        }
    }
    else
    {
        $results = [
            "result" => "error",
            "msg" => "Vous n'êtes plus connecter"
        ];
    }

    // Retour en JSON
    echo json_encode($results, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>