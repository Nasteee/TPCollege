<?php
require '../vendor/autoload.php';

$container = new \App\Container();
$professeurManager = $container->getProfesseurManager();
$mesprofs = $professeurManager->getList();
$twig = $container->getTwig();


echo $twig->render('professeurs.twig',
    [
        'professeurs' => $mesprofs,

    ]
);