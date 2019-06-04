<?php
    use Cake\Routing\Router;
?>
<section id="online-demo" class="footer-margin first-section-margin">
    <div class="container">
        <h1 class="text-center">
           Try eramba! 
        </h1>
        <p class="text-center lead text-grey mb-md" id="online-demo-choice">
            This is your playground!<br> Our enterpries and community releases<br>can be tested in this portal 
        </p>
        <div class="row">
            <div class="online-demo-item col-md-4 offset-md-1">
                <h4 class="text-center">
                    Enterprise edition
                </h4>
                <div class="text-center">
                    <a href="<?= Router::url('https://demo-e.eramba.org') ?>">
                        <div class="img-shadow">
                            <img class="img-fluid" src="/img/enterprise-rocket.png" alt="">
                        </div>
                    </a>
                </div>
                <p class="text-grey">
                    <strong>Username:</strong> admin<br>
                    <strong>Password:</strong> alphanumeric1
                </p>
            </div>
            <div class="online-demo-item col-md-4 offset-md-2">
                <h4 class="text-center">
                    Community edition
                </h4>
                <div class="text-center">
                    <a href="<?= Router::url('https://demo.eramba.org') ?>">
                        <div class="img-shadow">
                            <img class="img-fluid" src="/img/community-plane.png" alt="">
                        </div>
                    </a>
                </div>
                <p class="text-grey">
                    <strong>Username:</strong> admin<br>
                    <strong>Password:</strong> alphanumeric1
                </p>
            </div>
        </div>
    </div>
</section>
