<?php
require '../vendor/autoload.php';


$container = new \App\Container();
$twig = $container->getTwig();
$coursManager = $container->getCoursManager();
$mescours = $coursManager->getList();



echo $twig->render('cours.twig',
    [
        'cours' => $mescours,
    ]
);