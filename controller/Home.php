<?php
    class home
    {
        public function showLogin ()
        {
            /* aller vers home */
            $myView = new View('login');
            $myView->render('ARPTC MONITORING');
        }
        public function showHome ()
        {
            /* aller vers home */
            $myView = new View('accueil');
            $myView->render('ARPTC MONITORING');
        }
    }
?>