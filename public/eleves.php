<?php
require '../vendor/autoload.php';


$container = new \App\Container();
$twig = $container->getTwig();
$eleveManager = $container->getEleveManager();
$meseleves = $eleveManager->getList();


echo $twig->render('eleves.twig',
    [
     'eleves' => $meseleves,
    ]
);