<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['user_sharetolearn_987654321']))
    {
        $utilisateur = select_bdd($bdd, "utilisateur", $where = 'unique_id = "'.$_SESSION['user_sharetolearn_987654321'].'"', $limit = null, $offset = 0, $order = null, $random = false);
        if(count($utilisateur)!=0)
        {
            $utilisateur = $utilisateur[0];
        }
        else
        {
            // Rediriger vers la page de login
            header("Location:/");
            exit();
        }
    }
    else
    {
        // Rediriger vers la page de login
        header("Location:/");
        exit();
    }
    include_once FONCTION."checking_compte_actif.php";
?>

<!-- container page -->
<div class="parent_container_page_accueil">
    <!-- categories -->
    <div class="affichage_des_categorie_cours">
        <div class="sous_affichage_des_categorie_cours">
            <div class="titre_gestion_categorie_cours">
                Catégories <i class="fa-solid fa-angle-down icone_titre_gestion_categorie_cours"></i>
            </div>
            <div class="div_list_categorie_gestion_categorie" id="voir_details_categorie">
                <!-- details -->
                <div class="list_categorie_gestion_categorie">
                    <div class="nom_categorie_gestion_categorie">Informatique</div> <div class="nombre_categorie"><span>+9</span></div>
                </div>
                <!-- details -->
                <div class="list_categorie_gestion_categorie">
                    <div class="nom_categorie_gestion_categorie">Économie</div> <div class="nombre_categorie"><span>+9</span></div>
                </div>
                <!-- details -->
                <div class="list_categorie_gestion_categorie">
                    <div class="nom_categorie_gestion_categorie">Médecine</div> <div class="nombre_categorie"><span>+9</span></div>
                </div>
                <!-- details -->
                <div class="list_categorie_gestion_categorie">
                    <div class="nom_categorie_gestion_categorie">Droit</div> <div class="nombre_categorie"><span>+9</span></div>
                </div>
                <!-- details -->
                <div class="list_categorie_gestion_categorie">
                    <div class="nom_categorie_gestion_categorie">Ingénierie</div> <div class="nombre_categorie"><span>+9</span></div>
                </div>
                <!-- details -->
                <div class="list_categorie_gestion_categorie">
                    <div class="nom_categorie_gestion_categorie">Arts</div> <div class="nombre_categorie"><span>+9</span></div>
                </div>
                <!-- details -->
                <div class="voir_plus_list_categorie_gestion_categorie">
                    Voir plus <i class="fa-solid fa-angle-down"></i>
                </div>
            </div>
            <div class="titre_gestion_categorie_cours">
                Concours actifs <i class="fa-solid fa-angle-down icone_titre_gestion_categorie_cours"></i>
            </div>
            <div class="div_details_concours" id="voir_details_categorie">
                <!-- details -->
                <a href="/" class="details_concours">
                    <div class="concours">
                        <div class="div_entete_concours">
                            <div class="badge_concours">
                                <span>Nouveau</span>
                            </div>
                            <div class="date_concours">
                                15 jours restants
                            </div>
                        </div>
                        <div class="titre_concours">
                            Défi innovation durable
                        </div>
                        <div class="text_concours">
                            Proposez des solutions innovantes pour relever les défis environnementaux et sociaux.
                        </div>
                        <div class="div_pied_concours">
                            <div class="nombre_participants">
                                42 participants
                            </div>
                            <div class="badge_pied_concours">
                                <span>Participer</span>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- details -->
                <a href="/" class="details_concours populaire_concours">
                    <div class="concours">
                        <div class="div_entete_concours">
                            <div class="badge_concours">
                                <span>Populaire</span>
                            </div>
                            <div class="date_concours">
                                7 jours restants
                            </div>
                        </div>
                        <div class="titre_concours">
                            Hackathon IA éducation
                        </div>
                        <div class="text_concours">
                            Développez des applications d'IA pour améliorer l'apprentissage et l'enseignement.
                        </div>
                        <div class="div_pied_concours">
                            <div class="nombre_participants">
                                78 participants
                            </div>
                            <div class="badge_pied_concours">
                                <span>Participer</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- file d'actualité -->
    <div class="div_file_actualite">
        <!-- badge accueil -->
        <!-- <div class="div_badge_file_actualite">
            <div class="text_details_badge_file_actualite">
                <div class="titre_badge_file_actualite">
                    Bienvenue sur ShareToLearn
                </div>
                <div class="texte_badge_file_actualite">
                    Partagez votre savoir, développez vos compétences et connectez-vous avec des opportunités professionnelles.
                </div>
                <div class="div_button_badge_file_actualite">
                    <button type="button" class="btn_badge_file_actualite">Comment ça marche</button>
                    <button type="button" class="btn_badge_file_actualite main">Explorer les contenus</button>
                </div>
            </div>
            <div class="logo_details_badge_file_actualite">
                LOGO
            </div>
        </div> -->

        <!-- choix vu file d'actualité -->
        <div class="div_choix_categorie_file_actualite">
            <div class="choix_categorie_file_actualite">
                <!-- background -->
                <div class="background_detail_choix_categorie_file_actualite" id="background_detail_choix_categorie_file_actualite"></div>
                <!-- details -->
                <div class="detail_choix_categorie_file_actualite">
                    Pour vous
                </div>
                <!-- details -->
                <div class="detail_choix_categorie_file_actualite">
                    Tendances
                </div>
                <!-- details -->
                <div class="detail_choix_categorie_file_actualite">
                    Récents
                </div>
                <!-- details -->
                <div class="detail_choix_categorie_file_actualite">
                    Suivis
                </div>
            </div>
        </div>

        
        <!-- publier -->
        <?php include_once VIEW."composant/set_publication.php"; ?>
        <?php 
            $publication = select_bdd($bdd, "publication", $where = "client_unique_id = '$unique_id'", $limit = null, $offset = 0, $order = "id DESC", $random = false);
            foreach($publication as $donnee)
            {
                showPublication($donnee);
            }
        ?>

        <!-- publication video -->
        <div class="div_publication_video">
            <div class="div_profile_publication_video">
                <div class="profile_publication_video">
                    <img src="<?= ASSET ?>images/profile/default.jpg" alt="">
                </div>
                <div class="details_profile_publication_video">
                    <div class="nom_profile_publication_video">
                        Marie Kondo <span class="badge_publication_video">Étudiant</span>
                    </div>
                    <div class="texte_profile_publication_video">
                        Informatique, Université de Kinshasa - <span class="date_publication_video">2 jours</span>
                    </div>
                </div>
            </div>
            <div class="div_tags_publication_video">
                <a href="">#Algorithmes</a>
                <a href="">#Informatique</a>
                <a href="">#Programmation</a>
            </div>
            <div class="div_video_publication_video">
                <video controls>
                    <source src="<?= ASSET ?>images/publication/video/117723-713302063_tiny.mp4" type="video/mp4">
                </video>
            </div>
            <div class="comment_video_publication_video">
                <div class="like_comment_partage_video_publication_video">
                    <div class="details_like_comment_partage_video_publication_video">
                        <i class="fa-solid fa-thumbs-up"></i> 128
                    </div>
                    <div class="details_like_comment_partage_video_publication_video">
                        <i class="fa-solid fa-comment"></i> 24
                    </div>
                    <div class="details_like_comment_partage_video_publication_video">
                        <i class="fa-solid fa-share"></i> Partager
                    </div>
                </div>
                <div class="nombre_de_vu_publication_video">
                    1.2k vues
                </div>
            </div>
        </div>

        <!-- publication image -->
        <div class="div_publication_video">
            <div class="div_profile_publication_video">
                <div class="profile_publication_video">
                    <img src="<?= ASSET ?>images/profile/default.jpg" alt="">
                </div>
                <div class="details_profile_publication_video">
                    <div class="nom_profile_publication_video">
                        Marie Kondo <span class="badge_publication_video entrepreneur">Entrepreneur</span>
                    </div>
                    <div class="texte_profile_publication_video">
                        Informatique, Université de Kinshasa - <span class="date_publication_video">2 jours</span>
                    </div>
                </div>
            </div>
            <div class="div_tags_publication_video">
                <a href="">#Algorithmes</a>
                <a href="">#Informatique</a>
                <a href="">#Programmation</a>
            </div>
            <div class="div_images_publication_video">
                <div class="publication_image">
                    <img src="<?= ASSET ?>images/publication/images/img-1.jpg" alt="">
                </div>
                <div class="publication_image">
                    <img src="<?= ASSET ?>images/publication/images/img-2.jpg" alt="">
                </div>
                <div class="publication_image">
                    <img src="<?= ASSET ?>images/publication/images/img-3.jpg" alt="">
                </div>
                <div class="publication_image">
                    <div class="plus_publication_image">
                        <p>+ 23</p>
                    </div>
                    <img src="<?= ASSET ?>images/publication/images/img-4.jpg" alt="">
                </div>
            </div>
            <div class="comment_video_publication_video">
                <div class="like_comment_partage_video_publication_video">
                    <div class="details_like_comment_partage_video_publication_video">
                        <i class="fa-solid fa-thumbs-up"></i> 128
                    </div>
                    <div class="details_like_comment_partage_video_publication_video">
                        <i class="fa-solid fa-comment"></i> 24
                    </div>
                    <div class="details_like_comment_partage_video_publication_video">
                        <i class="fa-solid fa-share"></i> Partager
                    </div>
                </div>
                <div class="bouton_action_publication_video">
                    <a href="">Contacter</a>
                </div>
            </div>
        </div>

        <!-- publication image -->
        <div class="div_publication_video">
            <div class="div_profile_publication_video">
                <div class="profile_publication_video">
                    <img src="<?= ASSET ?>images/profile/default.jpg" alt="">
                </div>
                <div class="details_profile_publication_video">
                    <div class="nom_profile_publication_video">
                        Vodacom CD <span class="badge_publication_video">Entreprise</span>
                    </div>
                    <div class="texte_profile_publication_video">
                        Télécommunications - Partenaire - <span class="date_publication_video">1 jours</span>
                    </div>
                </div>
            </div>
            <div class="div_texte_publication_job">
                <p class="texte_publication_job">
                    Nous recherchons des talents en développement mobile pour notre programme de stage rémunéré. Une opportunité pour les étudiants de mettre en pratique leurs connaissances dans un environnement professionnel.
                </p>
            </div>
            <div class="div_tags_publication_video">
                <a href="">#Algorithmes</a>
                <a href="">#Informatique</a>
                <a href="">#Programmation</a>
            </div>
            <div class="div_detail_publication_job">
                <div class="div_info_publication_job">
                    <div class="div_icone_publication_job">
                        <div class="icone_publication_job">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div class="details_publication_job">
                            <div class="nom_details_publication_job">
                                Stage - Développeur Mobile
                            </div>
                            <div class="tags_details_publication_job">
                                <span><i class="fa-solid fa-location-dot"></i> Kinshasa</span>
                                <span><i class="fa-solid fa-clock"></i> Kinshasa</span>
                                <span><i class="fa-solid fa-dollar-sign"></i> Rémunéré</span>
                            </div>
                        </div>
                    </div>
                    <div class="div_bouton_publication_job">
                        <a href="">Postuler maintenant</a>
                    </div>
                </div>
            </div>
            <div class="comment_video_publication_video">
                <div class="like_comment_partage_video_publication_video">
                    <div class="details_like_comment_partage_video_publication_video">
                        <i class="fa-solid fa-thumbs-up"></i> 128
                    </div>
                    <div class="details_like_comment_partage_video_publication_video">
                        <i class="fa-solid fa-comment"></i> 24
                    </div>
                    <div class="details_like_comment_partage_video_publication_video">
                        <i class="fa-solid fa-share"></i> Partager
                    </div>
                </div>
                <div class="nombre_de_vu_publication_video">
                    1.2k vues
                </div>
            </div>
        </div>
    </div>
</div>

<!-- gestion home -->
<script src="<?= ASSET ?>js/home.js?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/js/home.js") ?>"></script>