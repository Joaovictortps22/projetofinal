<?php

require_once'app/Core/core.php';
require_once'app/Controller/HomeController.php';
require_once'app/Controller/ErroController.php';

$template = file_get_contents('app/template/estrutura.html');

ob_start();
    $core = new Core;
    $core->start($_GET);

    $saida = ob_get_contents();
ob_end_clean();

$tplPronto = str_replace('{{area_dinamica}}', $saida, $template);

echo $tplPronto; 

?>