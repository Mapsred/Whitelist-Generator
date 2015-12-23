<?php
/**
 * Created by PhpStorm.
 * User: Maps_red
 * Date: 19/12/2015
 * Time: 00:10
 */

if (isset($_POST['white']) && isset($_POST['names'])) {
    $timestart=microtime(true);
    require_once('layout/mc-api.php');
    $white = htmlentities($_POST['white']);
    $names = htmlentities($_POST['names']);
    $nickname = array();
    $uuidNick = array();

    $table= explode("\n", $names);


    foreach ($table as $item) {
        $uuid = format_uuid(username_to_uuid(trim($item)));
        if ($uuid !== '----') {
            $name = trim($item);
            $uuidNick[$name] = $uuid;
        }
    }

    $whitelist = "[\n";
    $nb = 0;

    foreach ($uuidNick as $name => $uuid) {
        $nb++;
        $whitelist.="  {\n";
        $whitelist.= '    "uuid": "'.$uuid.'",'."\n";
        $whitelist.= '    "name": "'.$name.'"'."\n";
        if ($nb !== count($uuidNick)) {
            $whitelist.="  },\n";
        }else if ($nb === count($uuidNick)) {
            $whitelist.="  }\n";
        }
    }
    $whitelist.="]";

    $fileDir = "files/$white.json";

    file_put_contents($fileDir, $whitelist);

    $timeend=microtime(true);
    $time=ceil($timeend-$timestart);

    echo ("La requête aura été executée en $time secondes <br>");
    require_once('delete.php');



?>

<p>Vous pouvez télécharger votre fichier ici : <a href="<?php echo $fileDir ?>"><?php echo $white ?></a></p>
<p>Les fichiers sont gardés 2 heures et sont supprimés</p>


<?php

}