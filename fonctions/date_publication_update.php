<?php
    include_once "../model/bdd.php";
    include_once "../fonctions/fonctions.php";
    include_once "../model/select.php";
    header('Content-Type: application/json; charset=utf-8');
    $publication = select_bdd($bdd, "publication", $where = "id = '".$_POST['id']."'", $limit = null, $offset = 0, $order = "id DESC", $random = false);
    if(count($publication)!=0)
    {
        $publication = $publication[0];
        $results = [
            "result" => "ok",
            "msg" => "ok".$publication['id'].' - '.$_POST['date']
        ];
    }

    // Retour en JSON
    echo json_encode($results, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>