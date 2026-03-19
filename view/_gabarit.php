<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title_page ?></title>
    <!-- cropper -->
    <link rel="stylesheet" href="<?= ASSET ?>css/cropper.min.css?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/css/cropper.min.css") ?>">
    <script src="<?= ASSET ?>js/cropper.min.js?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/js/cropper.min.js") ?>"></script>
    <!-- font style -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= ASSET ?>css/fontawesome/css/all.min.css?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/css/fontawesome/css/all.min.css") ?>">
    <!-- fontedo -->
    <link rel="stylesheet" href="<?= ASSET ?>css/fontedo/style.css?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/css/fontedo/style.css") ?>">
    <!-- css -->
    <link rel="stylesheet" href="<?= ASSET ?>css/style.css?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/css/style.css") ?>">
    <link rel="stylesheet" href="<?= ASSET ?>css/responsive.css?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/css/responsive.css") ?>">
    <!-- swiper -->
    <link rel="stylesheet" href="<?= ASSET ?>css/swiper.min.css?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/css/swiper.min.css") ?>">
    <script src="<?= ASSET ?>js/swiper-bundle.min.js?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/js/swiper-bundle.min.js") ?>"></script>
    <!-- jquery -->
    <script src="<?= ASSET ?>js/jquery-2.2.4.min.js?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/js/jquery-2.2.4.min.js") ?>"></script>
    <!-- sweat alert -->
    <link rel="stylesheet" href="<?= ASSET ?>css/sweetalert2.min.css?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/css/sweetalert2.min.css") ?>">
    <script src="<?= ASSET ?>js/sweetalert2.all.min.js?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/js/sweetalert2.all.min.js") ?>"></script>
    <!-- tribute -->
    <link rel="stylesheet" href="<?= ASSET ?>css/tribute.css?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/css/tribute.css") ?>">
    <script src="<?= ASSET ?>js/tribute.js?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/js/tribute.js") ?>"></script>
</head>
<body>
    <header>
        <div class="div_entete_page">
            <div class="logo_entete_page">
                <a href="/accueil">
						<img src="<?= ASSET ?>images/logo/K-korélink.png" alt="" srcset="">
                </a>
            </div>
            <nav>
                <ul class="div_list_nav_entete_page">
                    <li class="list_nav_entete_page"><a href="/accueil">Accueil</a></li>
                    <li class="list_nav_entete_page"><a href="/explorer">Explorer</a></li>
                    <li class="list_nav_entete_page"><a href="/concours">Concours</a></li>
                    <li class="list_nav_entete_page"><a href="/communautés">Communautés</a></li>
                </ul>
            </nav>
            <div class="div_barre_de_recherche_entete_page">
                <input type="search" name="" id="" placeholder="Recherche..." class="input_recherche_entete_page">
                <i class="fa-solid fa-magnifying-glass icone_input_recherche_entete_page"></i>
            </div>
            <div class="div_profile_actions_entete_page">
                <div class="profile_actions_entete_page">
                    <button type="button" class="bouton_entete_page"><i class="fa-solid fa-plus"></i> Créer</button>
                    <div class="div_icone_notif_entete_page">
                        <i class="fa-solid fa-bell"></i>
                        <div class="nombre_notif_entete_page">+9</div>
                    </div>
                    <div class="div_icone_notif_entete_page">
                        <i class="fa-solid fa-envelope"></i>
                        <div class="nombre_notif_entete_page">+9</div>
                    </div>
                    <div class="div_icone_notif_entete_page menu" id="show_mobile_menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <?php 
                        /* si on a une session */
                        if(isset($_SESSION['user_sharetolearn_987654321']))
                        {
                            $utilisateur = select_bdd($bdd, "utilisateur", $where = 'unique_id = "'.$_SESSION['user_sharetolearn_987654321'].'"', $limit = null, $offset = 0, $order = null, $random = false);
                            if(count($utilisateur)!=0)
                            {
                                $utilisateur = $utilisateur[0];
                                $profile = '<img src="'.ASSET.'images/profile/default.jpg" alt="" srcset="" id="profile_utilisateur">';
                                if($utilisateur['profile']!='')
                                {
                                    $profile = '<img src="'.ASSET.'images/profile/'.$utilisateur['profile'].'" alt="" srcset="" id="profile_utilisateur">';
                                }
                                echo '
                                    <div class="div_profile_entete_page">
                                        <div class="profile_entete_page">
                                            <a href="/compte" class="">
                                                '.$profile.'
                                            </a>
                                        </div>
                                    </div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </header>
    <!-- menu mobile -->
    <div class="parent_menu_mobile" id="parent_menu_mobile">
        <!-- background -->
        <div class="background_menu_mobile" id="sortie_menu_mobile"></div>
        <!-- menu -->
        <div class="menu_mobile">
            <!-- banniere -->
            <div class="banniere_menu_mobile">
                <div class="notification_banniere_menu_mobile">
                    <div class="div_icone_notif_entete_page mobile">
                        <i class="fa-solid fa-bell"></i>
                        <div class="nombre_notif_entete_page">+9</div>
                    </div>
                    <div class="div_icone_notif_entete_page mobile">
                        <i class="fa-solid fa-envelope"></i>
                        <div class="nombre_notif_entete_page">+9</div>
                    </div>                    
                    <?php 
                        /* si on a une session */
                        if(isset($_SESSION['user_sharetolearn_987654321']))
                        {
                            $utilisateur = select_bdd($bdd, "utilisateur", $where = 'unique_id = "'.$_SESSION['user_sharetolearn_987654321'].'"', $limit = null, $offset = 0, $order = null, $random = false);
                            if(count($utilisateur)!=0)
                            {
                                $utilisateur = $utilisateur[0];
                                echo '
                                    <div class="div_profile_entete_page mobile">
                                        <div class="profile_entete_page">
                                            <img src="'. ASSET .'images/profile/default.jpg" alt="">
                                        </div>
                                    </div>';
                            }
                        }
                    ?>
                </div>
                <div class="sortie_banniere_menu_mobile" id="sortie_menu_mobile">
                    <div class="div_icone_notif_entete_page menu">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </div>
                </div>
            </div>
            <!-- list menu -->
            <nav class="mobile">
                <ul class="div_list_nav_entete_page mobile">
                    <li class="list_nav_entete_page mobile"><a href="/accueil">Accueil</a></li>
                    <li class="list_nav_entete_page mobile"><a href="/explorer">Explorer</a></li>
                    <li class="list_nav_entete_page mobile"><a href="/concours">Concours</a></li>
                    <li class="list_nav_entete_page mobile"><a href="/communautés">Communautés</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- separateur -->
    <div class="separateur_banniere"></div>
    <!-- afficher le contenue -->
    <?php echo $contentPage; ?>
    <!-- gestion menu -->
    <script src="<?= ASSET ?>js/menu.js?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/js/menu.js") ?>"></script>
    <!-- gestion real_time_update_time -->
    <script src="<?= ASSET ?>js/real_time_update_time.js?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/js/real_time_update_time.js") ?>"></script>
</body>
</html>

<?php 
    createTable('utilisateur', [
        'id INT AUTO_INCREMENT PRIMARY KEY',
        'nom TEXT NULL',
        'adresse_email TEXT NULL',
        'mdp TEXT NULL',
        'code_mdp TEXT NULL',
        'unique_id TEXT NULL',
        'date_ajout DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP'
    ]);
    createTable('bienvenue_email', [
        'id INT AUTO_INCREMENT PRIMARY KEY',
        'client_unique_id TEXT NULL',
        'date_ajout DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP'
    ]);
    createTable('publication', [
        'id INT AUTO_INCREMENT PRIMARY KEY',
        'unique_id TEXT NULL',
        'client_unique_id TEXT NULL',
        'message TEXT NULL',
        'image INT NOT NULL',
        'video INT NOT NULL',
        'document INT NOT NULL',
        'date_ajout DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP'
    ]);
    createTable('publication_media', [
        'id INT AUTO_INCREMENT PRIMARY KEY',
        'publication_unique_id TEXT NULL',
        'media_ref TEXT NULL',
        'date_ajout DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP'
    ]);
    createTable('tags', [
        'id INT AUTO_INCREMENT PRIMARY KEY',
        'tag TEXT NULL',
        'date_ajout DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP'
    ]);
    createTable('publication_tags', [
        'id INT AUTO_INCREMENT PRIMARY KEY',
        'publication_tags TEXT NULL',
        'tag INT NULL',
        'date_ajout DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP'
    ]);
?>

<?php
    /* ajouter slug dans utilisateur */
    $table = "utilisateur";
    $column = "slug";

    $sql = "
        SELECT COUNT(*) 
        FROM INFORMATION_SCHEMA.COLUMNS 
        WHERE TABLE_SCHEMA = DATABASE()
        AND TABLE_NAME = :table
        AND COLUMN_NAME = :column
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ':table'  => $table,
        ':column' => $column
    ]);

    $exists = $stmt->fetchColumn();
    if ($exists == 0) {
        $bdd->exec("
            ALTER TABLE utilisateur
            ADD slug TEXT NULL AFTER unique_id
        ");
    }
    /* ajouter profile dans utilisateur */
    $table = "utilisateur";
    $column = "profile";

    $sql = "
        SELECT COUNT(*) 
        FROM INFORMATION_SCHEMA.COLUMNS 
        WHERE TABLE_SCHEMA = DATABASE()
        AND TABLE_NAME = :table
        AND COLUMN_NAME = :column
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ':table'  => $table,
        ':column' => $column
    ]);

    $exists = $stmt->fetchColumn();
    if ($exists == 0) {
        $bdd->exec("
            ALTER TABLE utilisateur
            ADD profile TEXT NULL AFTER slug
        ");
    }
    /* ajouter description dans utilisateur */
    $table = "utilisateur";
    $column = "description";

    $sql = "
        SELECT COUNT(*) 
        FROM INFORMATION_SCHEMA.COLUMNS 
        WHERE TABLE_SCHEMA = DATABASE()
        AND TABLE_NAME = :table
        AND COLUMN_NAME = :column
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ':table'  => $table,
        ':column' => $column
    ]);

    $exists = $stmt->fetchColumn();
    if ($exists == 0) {
        $bdd->exec("
            ALTER TABLE utilisateur
            ADD description TEXT NULL AFTER slug
        ");
    }
?>
