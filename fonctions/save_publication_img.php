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
            $data = json_decode(file_get_contents("php://input"), true);

            $message = $data['message'];
            $tags = $data['tags'];
            $img = $data['img'];
            $unique_id = uniqid('publication_', true);
            /* ajouter publication */
            $insert_data = [
                "unique_id" => $unique_id,
                "client_unique_id" => $_SESSION['user_sharetolearn_987654321'],
                "message" => $message,
                "image" => 1,
                "video" => 0,
                "document" => 0,
            ];
            insert_bdd($bdd, "publication", $insert_data);
            /* ajouter media publication */
            $insert_data = [
                "publication_unique_id" => $unique_id,
                "media_ref" => $img,
            ];
            insert_bdd($bdd, "publication_media", $insert_data);

            foreach($tags as $tag){

                $tag = str_replace("#","",$tag);

                $check_tags = select_bdd($bdd, "tags", $where = 'tag = "'.$tag.'"', $limit = null, $offset = 0, $order = null, $random = false);
                /* ajouter new tag */
                if(count($check_tags) == 0)
                {
                    $insert_data = [
                        "tag" => $tag,
                    ];
                    insert_bdd($bdd, "tags", $insert_data);
                }
                /* joindre tag à publication */
                $check_tags = select_bdd($bdd, "publication_tags", $where = 'tag = "'.$check_tags[0]['id'].'" AND publication_tags = "'.$unique_id.'"', $limit = null, $offset = 0, $order = null, $random = false);
                if(count($check_tags) == 0)
                {
                    $insert_data = [
                        "tag" => $check_tags[0]['id'],
                        "publication_tags" => $unique_id,
                    ];
                    insert_bdd($bdd, "publication_tags", $insert_data);
                }                                
            }

            $results = [
                "result" => "ok",
                "msg" => ""
            ];
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