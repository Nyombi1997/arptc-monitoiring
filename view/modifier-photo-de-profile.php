<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include_once FONCTION."checking_compte_actif.php";
?>
<!-- photo de profile -->
<div class="container_changer_de_photo_de_profile">
    <!-- photo de profile changer -->
    <div class="profile_editer_profile">
        <?= $profile ?>
    </div>
    <!-- bouton changer de photo de profile -->
    <div class="div_changer_photo_de_profile">
        <label for="new_photo_de_profile" class="bouton_changer_photo_de_profile">Modifier la photo de profile</label>
        <input type="file" name="new_photo_de_profile" id="new_photo_de_profile" accept="image/*">
    </div>
    <!-- zone de crop -->
    <div class="zone_de_crop_changer_photo_de_profile" id="div_zone_de_crop_changer_photo_de_profile">
        <img id="zone_de_crop_changer_photo_de_profile" src="">
        <!-- bouton changer de photo de profile -->
        <div class="div_changer_photo_de_profile">
            <button type="button" class="bouton_changer_photo_de_profile" id="enregistrer_le_crop">Enregistrer</button>
        </div>
    </div>
</div>

<!-- script modifier_photo_de_profile.js -->
<script src="<?= ASSET ?>js/modifier_photo_de_profile.js?<?= filemtime($_SERVER['DOCUMENT_ROOT']."/asset/js/modifier_photo_de_profile.js") ?>"></script>