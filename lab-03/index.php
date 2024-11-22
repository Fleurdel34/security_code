<?php

function getDataBaseConnection(){

    /**pour une base de données il me faut trois éléments
     *
     * un host: la machine qui héberge les données
     * un nom de database: le nom de la database contenant notre projet
     * un username / password - root est à bannir
     * un utilisateur: un nom d'utilisateur
     * un mot de passe: mot de passe de l'utilisateur
     *
    */

    $host = 'localhost';
    $dbname = 'my_database';
    $username = 'my_user';
    $password = 'my_password';

    try{
       $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        /**gestion des erreurs configuration des erreurs mais il faut plus précis auprès de PDO*/

       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /**Option de securité à PDO pour simuler les requêtes preparées sur le  client->catch php (true) ou s'il doit les exécuter
         * directement en base- PDO-> transmet les requêtes au serveur base de données-
         * On oblige le serveur à analyser et compiler les données pour les exécuter en base de données(false)
         * Le serveur va analyser et interprer le code mailveillant comme des données et non comme du code sql
         */
       $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    }catch (PDOException $exception){
        die("Connection failed: ". $exception->getMessage());
    }

}