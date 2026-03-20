<?php
    class home
    {
        public function showHome ()
        {
            /* aller vers home */
            $myView = new View('accueil');
            $myView->render('KORELINK | PARTAGEZ | APPRENEZ !');
        }
        public function showAccueil ()
        {
            /* aller vers accueil */
            $myView = new View('home');
            $myView->render('KORELINK | PARTAGEZ | APPRENEZ !');
        }
        public function showSignin ()
        {
            /* aller vers inscription */
            $myView = new View('signin');
            $myView->render('KORELINK | INSCRIPTION | APPRENEZ !');
        }
        public function showLogout ()
        {
            /* aller vers inscription */
            $myView = new View('logout');
            $myView->render('KORELINK | DECONNEXION | APPRENEZ !');
        }
        public function showAccount ()
        {
            /* aller vers inscription */
            $myView = new View('compte');
            $myView->render('KORELINK | INSCRIPTION | APPRENEZ !');
        }
        public function showEditProfil ()
        {
            /* aller vers inscription */
            $myView = new View('editer-profile');
            $myView->render('KORELINK | EDIT PROFILE | APPRENEZ !');
        }
        public function showChangePhotoProfile ()
        {
            /* aller vers inscription */
            $myView = new View('modifier-photo-de-profile');
            $myView->render('KORELINK | EDIT PROFILE | APPRENEZ !');
        }
    }
?>