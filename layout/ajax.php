<?php
/**
 * Created by PhpStorm.
 * User: Maps_red
 * Date: 19/12/2015
 * Time: 00:52
 */

$filters = array();
foreach (explode('&', $_POST['filters'] ) as $chunk) {
    $param = explode("=", $chunk);
    if ($param) {
        $filters[urldecode($param[0])][] = urldecode($param[1]);
    }
}
$table= explode("\n", $filters['names'][0]);
$nb = count($table);
$nb2 = $nb /2;
$nb3 = $nb2 * 1.5;
echo("Vous avez $nb pseudos, la requête prendra entre $nb2 et $nb3 secondes à s'executer");



