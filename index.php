<?php
/*
 * On indique que les chemins des fichiers qu'on inclut
 * seront relatifs au répertoire src.
 */

/* Inclusion des classes utilisées dans ce fichier */
set_include_path("./src");

require_once("Router.php");
require_once("models/Product/ProductStoragePDO.php");
require_once("models/User/UserStoragePDO.php");
require_once("models/Category/CategoryStoragePDO.php");

/*
 * Cette page est simplement le point d'arrivée de l'internaute
 * sur notre site. On se contente de créer un routeur
 * et de lancer son main.
 */

 $db = new PDO('mysql:host=mysql.info.unicaen.fr;dbname=21504712_8;port=3306;charset=utf8mb4', '21504712', 'quai3Eith4OngooT');

 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $userStorage = new UserStoragePDO($db);
 $productStorage = new ProductStoragePDO($db);
 $categoryStorage = new CategoryStoragePDO($db);
 $storages = array($userStorage,$productStorage,$categoryStorage);
 $router = new Router($storages);
 $router->main();

?>
