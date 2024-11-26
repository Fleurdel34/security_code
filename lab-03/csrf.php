<?php

session_start();

/**
 * En matière de sécurité il faut vérifier que le front qui nous contacte est notre application
 * donc on génère un CrsfToken pour éviter de se faire hacker
 * c'est pour identifier que le front que l'on a développé est bien celui qui nous contacte
 * pour éviter de répondre à un autre front qui pourrait tenter du nous hacker
 * @throws \Random\RandomException
 */

    function generateCsrfToken(){
        if(empty($_SESSION['crsf_token'])){

            /**
             * Génération d'un token personnalisé pour l'application
             */
            $_SESSION['crsf_token'] = bin2hex(random_bytes(32));

        }
        return $_SESSION['crsf_token'];
    }

    function verifyCsrfToken($token){

        /**
         * Avec hash_equals => il fait les deux il hash et il compare
         */
        return hash_equals( $_SESSION['crsf_token'], $token);
    }