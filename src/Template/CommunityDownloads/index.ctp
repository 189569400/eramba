<?php
use Cake\Routing\Router;

$this->assign('title', __('Community Download | Eramba'));
?>
<section id="community-download" class="mb-lg first-section-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>
                    Community Download
                </h1>
                <div class="row">
                    <div class="col-md-10">
                        <p class="text-grey mb-sm">
                            You are about to download our 2019 community edition - please use our documentation guide to understand how the software is installed, updated and used !<br>
                            <br>
                            <b>Bare in mind community does not include support (install, training, bug resolution, etc), has less features (notifications, emails, etc) and receives far less updates per year than our enterprise release.</b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 hidden-sm">
                <div class="text-center">
                    <div class="img-shadow">
                        <img src="/img/community-plane.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container text-center mb-xl">
        <div class="row">
            <div class="offset-md-2 col-md-4 mb-sm">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" viewBox="0 0 24 24" height="100" width="100" class="mb-xs icon-md"><title></title><g transform="matrix(1,0,0,1,0,0)"><path d="M 15.75,12l3,3l-3,3 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 8.25,12l-3,3l3,3 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 13.5,12l-3,6 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 2.5,3h19c1.105,0,2,0.895,2,2v14c0,1.105-0.895,2-2,2 h-19c-1.105,0-2-0.895-2-2V5C0.5,3.895,1.395,3,2.5,3z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 0.5,8h23 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 4,5.25c0.138,0,0.25,0.112,0.25,0.25S4.138,5.75,4,5.75 c-0.138,0-0.25-0.112-0.25-0.25S3.862,5.25,4,5.25 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 7,5.25c0.138,0,0.25,0.112,0.25,0.25S7.138,5.75,7,5.75S6.75,5.638,6.75,5.5 S6.862,5.25,7,5.25 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 10,5.25c0.138,0,0.25,0.112,0.25,0.25S10.138,5.75,10,5.75S9.75,5.638,9.75,5.5S9.862,5.25,10,5.25" stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                <h5>Source Code</h5>
                <p class="text-grey">
		You can install eramba in any modern Linux operating system
                </p>
            </div>
            <div class="col-md-4 mb-sm">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" viewBox="0 0 24 24" height="100" width="100" class="mb-xs icon-md"><title></title><g transform="matrix(1,0,0,1,0,0)"><path d="M 19.151,14.473c0,0,4.349-0.559,4.349-4.973c0.003-2.756-2.23-4.993-4.986-4.996 c-0.065,0-0.129,0.001-0.194,0.004c-1.647-3.491-5.812-4.986-9.303-3.339C6.704,2.26,5.172,4.527,5.022,7.08 C2.995,6.654,1.007,7.951,0.58,9.978C0.527,10.232,0.5,10.49,0.5,10.75c0,3.809,3.835,3.744,3.835,3.744 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 21.5,21 c0,1.381-1.119,2.5-2.5,2.5H5c-1.381,0-2.5-1.119-2.5-2.5v-2.5h19V21z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 2.5,18.5l2.333-5.092C5.112,12.876,5.65,12.531,6.25,12.5 H17c0.608,0.036,1.164,0.355,1.5,0.863l3,5.137H2.5z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 15,21.5h3" stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                <h5>VM</h5>
                <p class="text-grey">
		We have prepared a Vmware image with eramba pre-installed
                </p>
            </div>
        </div>
    </div>
</section>

<p style="text-align:center;"><b>We are doing upgrades to the system - downloads will be paused until October the 14th</b></p>

<!--

<section class="footer-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?= $this->Form->create(isset($communityDownload) ? $communityDownload : null, ['url' => ['controller' => 'CommunityDownloads', 'action' => 'add']]) ?>
                    <div class="form-group">
                        <label>Where do you reside? <span class="text-grey">(Required)</span></label>
                        <?= $this->Form->select('CommunityDownloads.country_id', $countryOptions, [
                            'class' => 'select2-form-control form-control',
                            'id' => 'location-country-select',
                            'empty' => __('Select Country'),
                            'onchange' => "Location.loadStates($(this).val(), 'location-state-select', '" . Router::url(['controller' => 'CommunityDownloads', 'action' => 'getStatesList']) . "')"
                        ]) ?>
                        <?= $this->Form->error('CommunityDownloads.country_id') ?>
                    </div>

                    <div class="form-group">
                        <label>Select a State / Region <span class="text-grey">(Optional)</span></label>
                        <?= $this->Form->select('CommunityDownloads.state_id', [], [
                            'class' => 'select2-form-control form-control',
                            'id' => 'location-state-select',
                            'empty' => __('Select State'),
                            'onchange' => "Location.loadCities($(this).val(), 'location-city-select', '" . Router::url(['controller' => 'CommunityDownloads', 'action' => 'getCitiesList']) . "')"
                        ]) ?>
                        <?= $this->Form->error('CommunityDownloads.state_id') ?>
                    </div>

                    <div class="form-group">
                        <label>Select a City if available <span class="text-grey">(Optional)</span></label>
                        <?= $this->Form->select('CommunityDownloads.city_id', [], [
                            'class' => 'select2-form-control form-control',
                            'id' => 'location-city-select',
                            'empty' => __('Select City')
                        ]) ?>
                        <?= $this->Form->error('CommunityDownloads.city_id') ?>
                    </div>

                    <div class="form-group">
                        <label>Your Name?<span class="text-grey"> (Required)</span></label>
                        <?= $this->Form->text('CommunityDownloads.name', [
                            'class' => 'form-control',
                            'placeholder' => 'Robin'
                        ]) ?>
                        <?= $this->Form->error('CommunityDownloads.name') ?>
                    </div>

                    <div class="form-group">
                        <label>Email where we'll send the download link?<span class="text-grey"> (Required)</span></label>
                        <?= $this->Form->email('CommunityDownloads.email', [
                            'class' => 'form-control',
                            'placeholder' => 'your@email.com'
                        ]) ?>
                        <?= $this->Form->error('CommunityDownloads.email') ?>
                    </div>

                    <div class="form-check text-left mb-md">
                        <?= $this->Form->checkbox('CommunityDownloads.policy_consent', [
                            'class' => 'form-check-input',
                            'id' => 'form-check-policy-consent'
                        ]) ?>
                        <label class="form-check-label form-check-label-small" for="form-check-policy-consent">We wont share this information with anyone and will only use it to send you download links and let you know when a new release is available or we are visiting your city to deliver our open, free community days.<br><br>You won’t get from us marketing, sales or spam noise. By checking the box on the left you accept our <a href="https://www.eramba.org/privacy/">privacy</a> policy and make the EU happy.
                        <?= $this->Form->error('CommunityDownloads.policy_consent') ?>
                    </div>

                    <?= $this->ReCaptcha->getHtml() ?>

                     <div class="text-center">
                        <?= $this->Form->button(__('SUBMIT'), [
                            'class' => 'btn btn-primary'
                        ]) ?>
                    </div>
		-->
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>

<?= $this->ReCaptcha->getScript() ?>
