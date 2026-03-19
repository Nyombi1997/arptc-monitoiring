<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include_once FONCTION."checking_compte_actif.php";
?>
<div class="container_login">
	<div class="div_login">
		<div class="div_slide_login">
			<!-- details -->
			<div class="slide_login">
				<div class="info_login">
					<div class="logo_info_login">
						<img src="<?= ASSET ?>images/logo/logo-korélink.png" alt="" srcset="">
					</div>
					<div class="div_texte_login">
						<div class="petit_text_login">
							Allez plus vite
						</div>
						<div class="grand_text_login">
							Découvrez une plateforme de partage de connaissances et d'apprentissage en ligne
						</div>
					</div>
				</div>
			</div>
			<!-- details -->
			<div class="slide_login">
				<div class="div_form_login">
                    <h1 class="titre_login_form">
                        Editer profile
                    </h1>
                    <div class="sous_div_form_login">
                        <div class="form_login">
                            <!-- details -->
                                <div class="form_modifier_photo_de_profile_editer_profile">
                                    <div class="profile_editer_profile">
                                        <?= $profile ?>
                                    </div>
                                    <div class="div_input_form_login">
                                        <a href="/modifier-photo-de-profile" type="submit" class="btn_form_login">Modifier</a>
                                    </div>
                                </div>
                            <!-- details -->
                            <form action="" id="form_nom">
                                <label for="new_nom" class="label_form_login">
                                    Nom d'utilisateur
                                </label>
                                <div class="div_input_form_login">
                                    <input type="text" name="nom" id="new_nom" class="input_form_login" required value="<?= $nom ?>">
                                </div>
                                <div class="div_input_form_login">
                                    <button type="submit" class="btn_form_login" id="valide_nom">Enregistrer</button>
                                </div>
                            </form>
                            <!-- details -->
                            <form action="" id="form_email">
                                <label for="email" class="label_form_login">
                                    Adresse email
                                </label>
                                <div class="div_input_form_login">
                                    <input type="email" name="email" id="email" class="input_form_login" required value="<?= $email ?>">
                                </div>
                                <div class="div_input_form_login">
                                    <button type="submit" class="btn_form_login" id="valide_email">Enregistrer</button>
                                </div>
                            </form>
                            <!-- details -->
                            <form action="" id="form_password">
                                <label for="password" class="label_form_login">
                                    Ancien mot de passe
                                </label>
                                <div class="div_input_form_login">
                                    <input type="password" name="password" id="password" class="input_form_login password_form_login" required>
                                    <i class="fa-solid fa-eye-slash icone_form_login"></i>
                                </div>
                                <label for="password" class="label_form_login">
                                    Nouveau mot de passe
                                </label>
                                <div class="div_input_form_login">
                                    <input type="password" name="password" id="password" class="input_form_login password_form_login" required>
                                    <i class="fa-solid fa-eye-slash icone_form_login"></i>
                                </div>
                                <!-- details -->
                                <label for="password" class="label_form_login">
                                    Confirmer mot de passe
                                </label>
                                <div class="div_input_form_login">
                                    <input type="password" name="password" id="password" class="input_form_login password_form_login" required>
                                    <i class="fa-solid fa-eye-slash icone_form_login"></i>
                                </div>
                                <div class="div_input_form_login">
                                    <button type="submit" class="btn_form_login" id="valid_password">Enregistrer</button>
                                </div>
                            </form>
                            <!-- details -->
                            <form action="" id="form_description">
                                <label for="email" class="label_form_login">
                                    Description profile
                                </label>
                                <textarea name="" id="description" class="input_textarea_form_login"><?= $description ?></textarea>
                                <div class="div_input_form_login">
                                    <button type="submit" class="btn_form_login" id="valid_description">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
    </div>

    <!-- script edit-profile -->
    <script src="<?= ASSET ?>js/edit-profile.js?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/js/edit-profile.js") ?>"></script>