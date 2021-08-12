<?php
require '../vendor/autoload.php';

$container = new \App\Container();
$twig = $container->getTwig();

echo $twig->render('base.twig',
    [

    ]
);