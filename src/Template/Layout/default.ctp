<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex" />
        <meta name="google-site-verification" content="NuSejYw8kM9_puQ2yD1D2WducP944tH_DqfMFg0VZt8">
        <title>eramba - Open GRC</title>

        <?= $this->Html->meta('icon', 'img/favicon.png') ?>

        <?= $this->Html->css('bootstrap.css') ?>
        <?= $this->Html->css('animations.css') ?>
        <?= $this->Html->css('styles.css') ?>
        <?= $this->Html->css('bootstrap-datepicker3.min.css'); ?>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <?= $this->element('header') ?>

        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>

        <?= $this->element('footer') ?>

        <?= $this->Html->script([
            'jquery-3.2.1.min.js',
            'bootstrap.js',
            'jquery.waypoints.min.js',
            'bootstrap-datepicker.min.js',
            'scripts.js'
        ]) ?>
    </body>
</html>