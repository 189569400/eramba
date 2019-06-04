<?php
    use Cake\Routing\Router;
?>
<section id="online-demo" class="footer-margin first-section-margin">
    <div class="container">
        <h1 class="text-center">
            Online Demo
        </h1>
        <p class="text-center lead text-grey mb-md" id="online-demo-choice">
            What you want to demo?
        </p>
        <div class="row">
            <div class="online-demo-item col-md-4 offset-md-1">
                <h4 class="text-center">
                    Subscriptor edition
                </h4>
                <div class="text-center">
                    <a href="<?= Router::url('https://demo-e.eramba.org') ?>">
                        <div class="img-shadow">
                            <img class="img-fluid" src="/img/enterprise-rocket.png" alt="">
                        </div>
                    </a>
                </div>
                <p class="text-grey">
                    Our enterprise release (or subscriptors edition) is updated every month and has the latest patches and features. Once a year we pass (most) of this to the community release.<br>
                    <br>
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
                    Our community edition is based on our enterprise release and updated once a year.<br>
                    <br>
                    <strong>Username:</strong> admin<br>
                    <strong>Password:</strong> alphanumeric1
                </p>
            </div>
        </div>
    </div>
</section>