<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include_once FONCTION."checking_compte_actif.php";
?>
<!-- BOUTON LOGOUT -->
<div class="div_boutton_logout">
    <a href="/deconnexion" class="bouton_logout">Déconnexion</a>
</div>
<!-- corps compte -->
<div class="corps_compte">
    <!-- slide profile -->
    <div class="div_parent_slide_profile">
        <div class="div_profile_compte">
            <div class="div_image_profile_compte">
                <?= $profile ?>
            </div>
            <div class="nom_profile_compte">
                <?= $nom ?>
            </div>
            <div class="description_profile_compte">
                <?= $description ?>
            </div>
            <div class="div_bouton_profile_compte">
                <?php
                    if(isset($_SESSION['user_sharetolearn_987654321']))
                    {
                        echo '
                            <a href="/editer-profile" class="active"><i class="fa-solid fa-user-pen"></i> Editer le profile</a>
                            <a href="" class=""><i class="fa-solid fa-comment"></i> Messages</a>';
                    }
                    else
                    {
                        echo '
                            <a href="" class="active"><i class="fa-solid fa-envelope"></i> Contact</a>
                            <a href="" class=""><i class="fa-solid fa-download"></i> CV</a>';
                    }
                ?>
            </div>
        </div>
        <div class="parent_certificat_competence_profile_compte">
            <div class="div_competence_profile_compte">
                <div class="titre_competence_profile_compte">
                    Compétences
                </div>
                <div class="details_competence_profile_compte">
                    <span>Java</span>
                    <span>Python</span>
                    <span>HTML/CSS</span>
                    <span>JavaScript</span>
                    <span>Flutter</span>
                    <span>SQL</span>
                </div>
            </div>
            <div class="div_certificat_profile_compte">
                <div class="titre_competence_profile_compte">
                    Certificats
                </div>
                <div class="details_certificat_profile_compte">
                    <i class="fa-solid fa-certificate"></i> Algorithmes et structures de données
                </div>
                <div class="details_certificat_profile_compte">
                    <i class="fa-solid fa-certificate"></i> Développement mobile avec Flutter
                </div>
                <div class="details_certificat_profile_compte">
                    <i class="fa-solid fa-certificate"></i> Introduction à l'intelligence artificielle
                </div>
            </div>
        </div>
    </div>
    <!-- slide publications -->
    <div class="div_parent_publication_compte_utilisateur">
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