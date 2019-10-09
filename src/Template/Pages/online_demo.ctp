<?php
use Cake\Routing\Router;

$this->assign('title', __('Online Demo | Eramba'));
$this->SocialHeaders->set([
    'description' => __('This is your playground! Test our enterprise and community releases but bare in mind the database will reset every hour!')
]);
?>
<section id="online-demo" class="footer-margin first-section-margin">
    <div class="container">
        <h1 class="text-center">
           Try eramba! 
        </h1>
        <p class="text-center lead text-grey mb-md" id="online-demo-choice">
            This is your playground!<br>Test our enterprise and community <br>releases but bare in mind the<br>database will reset every hour!</b>
        </p>
        <div class="row">
            <div class="online-demo-item col-md-4 offset-md-1">
                <h4 class="text-center">
                    <a href="<?= Router::url('https://demo-e.eramba.org') ?>" target="_blank">
                        Enterprise edition
                    </a>
                </h4>
                <div class="text-center">
                    <a href="<?= Router::url('https://demo-e.eramba.org') ?>" target="_blank">
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
                    <a href="<?= Router::url('https://demo.eramba.org') ?>" target="_blank">
                        Community edition
                    </a>
                </h4>
                <div class="text-center">
                    <a href="<?= Router::url('https://demo.eramba.org') ?>" target="_blank">
                        <div class="img-shadow">
                            <img class="img-fluid" src="/img/community-plane.png" alt="">
                        </div>
                    </a>
                </div>
                <p class="text-grey">
                    <strong>Username:</strong> admin<br>
                    <strong>Password:</strong> alphanumeric1
		<br><br><b>Bare in mind community has less<br>features and patches than <a href="https://www.eramba.org/services">enterprise</a></b>!
                </p>
            </div>
        </div>
    </div>
</section>
