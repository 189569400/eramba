<?php
use Cake\Routing\Router;
use App\Model\Table\ContactsTable;
use App\Model\Table\ServicesTable;

$this->assign('title', __('Paid Services | Eramba'));
$this->SocialHeaders->set([
    'description' => __('Choose the eramba for your needs.')
]);
?>

<section id="community-download" class="mb-lg first-section-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>
                    Eramba Enterprise
                </h1>
                <div class="row">
                    <div class="col-md-10">
                        <p class="text-grey mb-sm">
                            Support, Trainings, Extra Features and many important regular Updates are guaranteed for a <b>flat yearly fee</b> no matter how many users or how much data you want to input in eramba.<br>
                            <br>
                            <b>Join the hundreds of organizations around the world that have chosen our affordable enterprise services and support this project!</b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 hidden-sm">
                <div class="text-center">
                    <div class="img-shadow">
                        <img src="/img/enterprise-rocket.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container text-center mb-xl">
        <div class="row">
            <div class="col-md-4 mb-sm">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" viewBox="0 0 24 24" height="100" width="100" class="mb-xs icon-md"><title></title><g transform="matrix(1,0,0,1,0,0)"><path d="M 16,21.5h1c1.934,0,3.5-1.067,3.5-3v-2.17 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 19.5,8.5c2.209-0.002,4.001,1.788,4.003,3.997 c0.001,1.697-1.069,3.21-2.669,3.775c-0.521,0.184-1.092-0.088-1.277-0.609c-0.038-0.107-0.057-0.22-0.057-0.333V8.5z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 4.5,8.5 c-2.209-0.002-4.001,1.788-4.003,3.997c-0.001,1.697,1.069,3.21,2.669,3.775c0.521,0.184,1.092-0.088,1.277-0.609 C4.481,15.556,4.5,15.444,4.5,15.33V8.5z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 19.5,10V8c0-4.142-3.358-7.5-7.5-7.5S4.5,3.858,4.5,8v2 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 11.5,20.5h4 c0.276,0,0.5,0.224,0.5,0.5v1c0,0.276-0.224,0.5-0.5,0.5h-4c-0.552,0-1-0.448-1-1l0,0C10.5,20.948,10.948,20.5,11.5,20.5z" stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                <h5>Support</h5>
                <p class="text-grey">
                    Unlimited assistance from the core team by email or Zoom. Install troubles? Understanding how eramba works? Implementation advice? We got it covered.
                </p>
            </div>
            <div class="col-md-4 mb-sm">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" viewBox="0 0 24 24" height="100" width="100" class="mb-xs icon-md"><title></title><g transform="matrix(1,0,0,1,0,0)"><path d="M 9.138,23.5c0.829-1.175,1.302-2.564,1.362-4 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 14.862,23.5c-0.829-1.175-1.302-2.564-1.362-4 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 7.5,23.5h9 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 0.5,16.5h23 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 1.5,0.5h21c0.552,0,1,0.448,1,1v17c0,0.552-0.448,1-1,1h-21c-0.552,0-1-0.448-1-1v-17C0.5,0.948,0.948,0.5,1.5,0.5z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 17,5.5l-5,5l-2-2 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 16.5,9c0,2.485-2.016,4.5-4.501,4.499c-2.485,0-4.5-2.016-4.499-4.501s2.016-4.5,4.501-4.499 c0.694,0,1.378,0.161,1.999,0.469" stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                <h5>Regular Updates</h5>
                <p class="text-grey">
                    While community gets 2-3 updates a year, Enterprise <a href="https://www.eramba.org/releases">gets well over 40<a/> ! .. they include security patches, bug fixing and new features.
                </p>
            </div>
            <div class="col-md-4 mb-sm">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" viewBox="0 0 24 24" height="100" width="100" class="mb-xs icon-md"><title></title><g transform="matrix(1,0,0,1,0,0)"><path d="M 17.518,11.506c3.314,0,6,2.686,6,6s-2.686,6-6,6s-6-2.686-6-6S14.204,11.506,17.518,11.506z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 17.518,14.506v6 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 20.518,17.506h-6 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 0.515,4.504h20 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 3.515,2.254L3.515,2.254 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 3.515,2.254c-0.138,0-0.25,0.112-0.25,0.25s0.112,0.25,0.25,0.25 s0.25-0.112,0.25-0.25S3.653,2.254,3.515,2.254 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 5.515,2.254L5.515,2.254 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 5.515,2.254c-0.138,0-0.25,0.112-0.25,0.25 s0.112,0.25,0.25,0.25s0.25-0.112,0.25-0.25S5.653,2.254,5.515,2.254 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 7.515,2.254L7.515,2.254 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 7.515,2.254 c-0.138,0-0.25,0.112-0.25,0.25s0.112,0.25,0.25,0.25s0.25-0.112,0.25-0.25S7.653,2.254,7.515,2.254 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 8.515,16.5h-6 c-1.105,0-2-0.895-2-2v-12c0-1.105,0.895-2,2-2h16c1.105,0,2,0.895,2,2v6" stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                <h5>Extra Features</h5>
                <p class="text-grey">
                    Reporting, Email Notifications, Custom Fields, Online Assessments, Awareness Programs, Etc. See the full list in our <a href="https://www.eramba.org/documentation">documentation</a>.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="paid-services" class="footer-margin first-section-margin">
    <?= $this->Form->create(isset($service) ? $service : null, [
        'url' => ['controller' => 'Services', 'action' => 'processQuote'],
        'id' => 'services_form'
    ]) ?>
        <div class="container">
            <h1 class="text-center mb-lg">
                Choose the eramba for your needs
            </h1>
            
            <!-- <div id="paid-services-choice" class="hidden-sm"></div> -->

            <div class="row">
                <div class="licence-item col-lg-6 offset-lg-3 col-md-6 mb-md">
                    <h4 class="text-center mb-xs">
                        Enterprise License
                    </h4>
                    <!-- <div class="text-center mb-md">
                        <div class="img-shadow">
                            <img class="img-fluid" src="/img/enterprise-rocket.png" alt="">
                        </div>
                    </div> -->
                    <p class="text-grey text-center mb-sm">
                        Includes our Enterprise version, support and regular updates <a href="https://docs.google.com/document/d/1FTAG1vMDhNXJXySLBgvore60zhcObKhAievBk3rCOdA/edit#heading=h.23mitxs37sgm">(FAQ)</a> <a href="https://www.eramba.org/tc">(T&C)</a>
                    </p>
                    <div class="form-group narrow">
                        <label>Version</label>
                        <?php
                            $versionOptionsModified = [];
                            foreach ($versionOptions as $key => $val) {
                                $versionOptionsModified[] = [
                                    'text' => $val,
                                    'value' => $key
                                ];
                            }
                        ?>
                        <?= $this->Form->select('Services.version', $versionOptionsModified, [
                            'class' => 'form-control',
                            'default' => ServicesTable::VERSION_PERM,
                            'onChange' => 'ServicesSection.updateBill();'
                        ]) ?>
                        <?= $this->Form->error('Services.version') ?>
                    </div>
                    <div class="form-group narrow">
                        <label>License Start Date</label><br>
                        <?= $this->Form->text('Services.start_date', [
                            'class' => 'form-control datepicker',
                            'onChange' => 'ServicesSection.updateBill();',
                            'data-date-start-date' => date('m/d/Y', time())
                        ]) ?>
                        <?= $this->Form->error('Services.start_date') ?>
                    </div>
                </div>
                <?php /*
                <div class="licence-item col-lg-4 offset-lg-2 col-md-6 mb-md">
                    <div class="comming-soon">
                        Comming soon
                    </div>
                    <div class="mb-lg faded">
                        <h4 class="text-center">
                            Eramba Community - SaaS
                        </h4>
                        <div class="text-center mb-md">
                            <div class="img-shadow">
                                <img class="img-fluid" src="/img/community-plane.png" alt="">
                            </div>
                        </div>
                        <p class="text-grey text-center">
                            We can host eramba for you speeding up your eramba journey!<a href="https://docs.google.com/document/d/1FTAG1vMDhNXJXySLBgvore60zhcObKhAievBk3rCOdA/edit#heading=h.esvzhzalijlg"> (FAQ)</a> <a href="">(T&C)</a>
                        </p>
                    </div>
                    <div class="text-center">
                        <h4 class="text-grey mb-sm">Contact us if you wish to beta test our service !</h4>
                        <a class="btn btn-primary" href="<?= Router::url(['controller' => 'Contacts', 'action' => 'index', '?' => ['type' => ContactsTable::TYPE_COMMUNITY_SAAS_TESTER]]) ?>">Contact Us</a>
                    </div>
                </div>
                */ ?>
            </div>

            <div class="paid-services-step">
                <h2 class="text-center text-blue mb-md">
                   Help learning and implemeting eramba? 
                </h2>

                <div class="row">
                    <div class="col-lg-4 offset-lg-1 col-md-6">
                        <div class="text-center mb-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" viewBox="0 0 24 24" height="80" width="80" class="mb-xs icon-md"><title></title><g transform="matrix(1,0,0,1,0,0)"><path d="M 5,22.004h14 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 11.5,20.004v2 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 0.5,16.004h23 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 12,4.504c1.243,0,2.25,1.007,2.25,2.25s-1.007,2.25-2.25,2.25 s-2.25-1.007-2.25-2.25S10.757,4.504,12,4.504z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 16.5,13.5c-0.634-2.485-3.162-3.986-5.647-3.353 C9.206,10.567,7.92,11.853,7.5,13.5H16.5z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 2,2.004h20c0.828,0,1.5,0.672,1.5,1.5v15c0,0.828-0.672,1.5-1.5,1.5H2 c-0.828,0-1.5-0.672-1.5-1.5v-15C0.5,2.676,1.172,2.004,2,2.004z" stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                            <h4 class="mb-xs">
                                Online Trainings and Assistance
                            </h4>
                            <p class="lead text-grey">
                                We can help you remotely with your first steps: creating risks, assets, controls, compliance reports, Etc<a href="https://docs.google.com/document/d/1FTAG1vMDhNXJXySLBgvore60zhcObKhAievBk3rCOdA/edit#heading=h.qfjnzpxbfenq"> (FAQ)</a>
                            </p>
                        </div>
                        <div class="form-group narrow">
                            <label>How many hours do you need?</label><br>
                            <?= $this->Form->select('Services.online_trainings_hours', [
                                0 => __('None'),
                                3 => __('3hs'),
                                6 => __('6hs'),
                                9 => __('9hs')
                            ], [
                                'class' => 'form-control',
                                'onChange' => 'ServicesSection.updateBill();'
                            ]) ?>
                            <?= $this->Form->error('Services.online_trainings_hours') ?>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-2 col-md-6">
                        <div class="text-center mb-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" viewBox="0 0 24 24" height="80" width="80" class="mb-xs icon-md"><title></title><g transform="matrix(1,0,0,1,0,0)"><path d="M 2.5,17.5v-3 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 8.5,17.5v-3 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 2.5,17.5h6 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 5.5,23.5v-4 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 5.5,9v5 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 8,23.5l0.5-6h2V14c0-2.761-2.239-5-5-5 s-5,2.239-5,5v3.5h2l0.5,6H8z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 5.5,0.5C7.433,0.5,9,2.067,9,4S7.433,7.5,5.5,7.5S2,5.933,2,4S3.567,0.5,5.5,0.5z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 2.4,2.378 C3.51,3.421,4.977,4.002,6.5,4c0.848,0.001,1.687-0.178,2.461-0.526 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 13.5,17.5h8c1.105,0,2-0.895,2-2v-13c0-1.105-0.895-2-2-2H10" stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                            <h4 class="mb-xs">
                                Onsite Workshops
                            </h4>
                            <p class="lead text-grey">
                                Our very popular four day onsite workshop helps you understand and implement eramba in your organisation!<a href="https://docs.google.com/document/d/1FTAG1vMDhNXJXySLBgvore60zhcObKhAievBk3rCOdA/edit#heading=h.ovs2krb4amke"> (FAQ)</a>  
                            </p>
                        </div>
                        <div class="form-group narrow">
                            <label>Onsite Training Required?</label><br>
                            <?= $this->Form->select('Services.onsite_workshops', [
                                0 => __('No'),
                                1 => __('Yes')
                            ], [
                                'class' => 'form-control',
                                'onChange' => 'ServicesSection.updateBill();'
                            ]) ?>
                            <?= $this->Form->error('Services.onsite_workshops') ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="paid-services-step">
                <div class="row mb-lg">
                    <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3">
                        <div id="paid-services-price">
                            <div id="paid-services-price-left">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" viewBox="0 0 24 24" height="80" width="80"><title></title><g transform="matrix(1,0,0,1,0,0)"><path d="M 1.3,1.758l13.294,3.319c1.668,0.49,2.838,1.991,2.906,3.728v12c0.075,1.253-0.88,2.329-2.132,2.404 c-0.266,0.016-0.532-0.015-0.788-0.092L3.424,20.493C1.75,20.032,0.567,18.54,0.5,16.805v-13c0.005-1.655,1.345-2.995,3-3h17 c1.655,0.004,2.996,1.345,3,3v11c-0.004,1.655-1.345,2.996-3,3h-3 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 9.504,3.805h10 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 13.004,11.805c1.105,0,2,0.895,2,2 s-0.895,2-2,2s-2-0.895-2-2S11.899,11.805,13.004,11.805z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 17.504,8.805h2" stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                            </div>
                            <div id="paid-services-price-right">
                                <h3>
                                    Bill so far
                                </h3>
                                <div id="paid-services-price-number" class="text-blue">
                                    <span id="bill_sum">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="paid-services-actions">
                    <button type="button" class="btn btn-primary mb-sm" data-toggle="modal" data-target="#preview-bill-modal" onClick="ServicesSection.previewQuote();">Preview my Quote</button>
                    <button class="btn btn-primary mb-sm">Let’s continue</button>
                    <br>
                    <a href="<?= Router::url([
                        'controller' => 'Services',
                        'action' => 'abort'
                    ]) ?>" class="btn btn-primary-white">Abort and Contact Us</a>
                </div>
            </div>
        </div>
    <?= $this->Form->end() ?>
</section>
<div class="modal" id="preview-bill-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="preview-quote-modal-content">
        </div>
    </div>
</div>
<script>
    $(document).ready(function()
    {
        ServicesSection.updateBillUrl = "<?= Router::url(['controller' => 'Services', 'action' => 'updateBill']) ?>";
        ServicesSection.previewQuoteUrl = "<?= Router::url(['controller' => 'Services', 'action' => 'previewQuote']) ?>";
    });
</script>
