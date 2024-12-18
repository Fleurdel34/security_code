-- Désactiver l'accès root en vérouillant le compte

ALTER USER 'root'@'%' ACCOUNT LOCK;
ALTER USER 'root'@'localhost' ACCOUNT LOCK;

-- Facultatif: S'assurer que root n'a aucun privilège

REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'root'@'%';
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'root'@'localhost';

GRANT ALL PRIVILEGES ON *.* TO 'johanna'@'%' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON *.* TO 'johanna'@'localhost' WITH GRANT OPTION;

FLUSH PRIVILEGES;