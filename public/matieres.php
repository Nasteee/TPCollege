<?php
require '../vendor/autoload.php';


$container = new \App\Container();
$twig = $container->getTwig();
$matiereManager = $container->getMatiereManager();
$matieres = $matiereManager->getList();



echo $twig->render('matieres.twig',
    [
        'matieres' => $matieres,

    ]
);
