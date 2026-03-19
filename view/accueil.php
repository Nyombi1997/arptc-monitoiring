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
            // Rediriger vers la page d'accueil
            header("Location:/accueil");
            exit();
        }
    }
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
					<form action="" method="post">
						<h1 class="titre_login_form">
							Connexion
						</h1>
						<div class="sous_div_form_login">
							<div class="form_login">
								<label for="email" class="label_form_login">
									Votre adresse email
								</label>
								<div class="div_input_form_login">
									<input type="email" name="" id="email" class="input_form_login" required>
								</div>
								<label for="password" class="label_form_login">
									Votre mot de passe
								</label>
								<div class="div_input_form_login">
									<input type="password" name="" id="password" class="input_form_login password_form_login" required>
									<i class="fa-solid fa-eye-slash icone_form_login"></i>
								</div>
								<div class="mot_de_passe_oublie_form_login">
									<a href="">Mot de passe oublié ?</a>
								</div>
								<div class="div_input_form_login">
									<button type="submit" class="btn_form_login">Se connecter</button>
								</div>
								<div class="texte_form_login">
									Vous n'avez pas encore un compte ? <a href="/inscription">s'inscrire</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- script login -->
<script src="<?= ASSET ?>js/login.js?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/js/login.js") ?>"></script>