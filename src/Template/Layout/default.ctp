<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex" />
        <meta name="google-site-verification" content="NuSejYw8kM9_puQ2yD1D2WducP944tH_DqfMFg0VZt8">
        <title>eramba - Open GRC</title>

        <?= $this->Html->meta('icon', 'img/favicon.png') ?>

        <?= $this->Html->script([
            'jquery-3.2.1.min.js'
        ]) ?>

        <?= $this->Html->css([
            'bootstrap.css',
            'animations.css',
            'bootstrap-datepicker3.min.css',
            'select2.min.css',
            'pnotify.css',
            'pnotify.brighttheme.css',
            'styles.css',
        ]) ?>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>

        <!-- Google Analytics -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-37869017-1', 'auto');
            ga('send', 'pageview');
        </script>
        <!-- End Google Analytics -->
    </head>
    <body>
        <?= $this->element('header') ?>

        <?= $this->fetch('content') ?>

        <?= $this->element('footer') ?>

        <?= $this->Html->script([
            'bootstrap.js',
            'jquery.waypoints.min.js',
            'bootstrap-datepicker.min.js',
            'select2.min.js',
            'pnotify.js',
            'scripts.js',
            'blockui/blockui.min.js'
        ]) ?>

        <?= $this->Flash->render() ?>
    </body>
</html>