<?php
    use Cake\Routing\Router;
    use App\Model\Table\ContactsTable;
?>
<section id="paid-services" class="footer-margin first-section-margin">
    <?= $this->Form->create(isset($service) ? $service : null, [
        'url' => ['controller' => 'Services', 'action' => 'processQuote'],
        'id' => 'services_form'
    ]) ?>
        <div class="container">
            <h1 class="text-center">
                Choose the eramba for your needs
            </h1>
            
            <div id="paid-services-choice" class="hidden-sm"></div>

            <div class="row">
                <div class="licence-item col-lg-4 offset-lg-1 col-md-6 mb-md">
                    <h4 class="text-center">
                        Enterprise License
                    </h4>
                    <div class="text-center mb-md">
                        <div class="img-shadow">
                            <img class="img-fluid" src="/img/enterprise-rocket.png" alt="">
                        </div>
                    </div>
                    <p class="text-grey text-center mb-sm">
                        Includes our Enterprise version, support and regular updates. Read the <a href="https://docs.google.com/document/d/1FTAG1vMDhNXJXySLBgvore60zhcObKhAievBk3rCOdA/edit#heading=h.23mitxs37sgm">FAQ</a> to know more.
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
                            $versionOptionsModified[] = [
                                'text' => __('On SaaS (Comming Soon)'),
                                'value' => -1,
                                'disabled' => true
                            ];
                        ?>
                        <?= $this->Form->select('Services.version', $versionOptionsModified, [
                            'class' => 'form-control',
                            'onChange' => 'ServicesSection.updateBill();'
                        ]) ?>
                        <?= $this->Form->error('Services.version') ?>
                    </div>
                    <div class="form-group narrow">
                        <label>License Start Date</label><br>
                        <?= $this->Form->text('Services.start_date', [
                            'class' => 'form-control datepicker',
                            'onChange' => 'ServicesSection.updateBill();'
                        ]) ?>
                        <?= $this->Form->error('Services.start_date') ?>
                    </div>
                </div>
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
                            We can host eramba for you speeding up your eramba journey!. Read the <a href="https://docs.google.com/document/d/1FTAG1vMDhNXJXySLBgvore60zhcObKhAievBk3rCOdA/edit#heading=h.esvzhzalijlg">FAQ</a> to know more.
                        </p>
                    </div>
                    <div class="text-center">
                        <h4 class="text-grey mb-sm">Want to test SaaS as a beta user?</h4>
                        <a class="btn btn-primary" href="<?= Router::url(['controller' => 'Contacts', 'action' => 'index', '?' => ['type' => ContactsTable::TYPE_COMMUNITY_SAAS_TESTER]]) ?>">Contact Us</a>
                    </div>
                </div>
            </div>

            <div class="paid-services-step">
                <h2 class="text-center text-blue mb-md">
                    Add your optional training Packages
                </h2>

                <div class="row">
                    <div class="col-lg-4 offset-lg-1 col-md-6">
                        <div class="text-center mb-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" viewBox="0 0 24 24" height="80" width="80" class="mb-xs icon-md"><title></title><g transform="matrix(1,0,0,1,0,0)"><path d="M 5,22.004h14 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 11.5,20.004v2 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 0.5,16.004h23 " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 12,4.504c1.243,0,2.25,1.007,2.25,2.25s-1.007,2.25-2.25,2.25 s-2.25-1.007-2.25-2.25S10.757,4.504,12,4.504z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 16.5,13.5c-0.634-2.485-3.162-3.986-5.647-3.353 C9.206,10.567,7.92,11.853,7.5,13.5H16.5z " stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M 2,2.004h20c0.828,0,1.5,0.672,1.5,1.5v15c0,0.828-0.672,1.5-1.5,1.5H2 c-0.828,0-1.5-0.672-1.5-1.5v-15C0.5,2.676,1.172,2.004,2,2.004z" stroke="#000000" fill="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                            <h4 class="mb-xs">
                                Online Trainings and Assistance
                            </h4>
                            <p class="lead text-grey">
                                We can help you remotely with your first steps: creating risks, assets, controls, compliance reports, Etc. See our <a href="https://docs.google.com/document/d/1FTAG1vMDhNXJXySLBgvore60zhcObKhAievBk3rCOdA/edit#heading=h.qfjnzpxbfenq">FAQ</a> for more information.
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
                                Our four day onsite training/workshop helps you understanding and implementing eramba in your organisation - this is highly recommended to ensure you start with the right foot!. See our <a href="https://docs.google.com/document/d/1FTAG1vMDhNXJXySLBgvore60zhcObKhAievBk3rCOdA/edit#heading=h.ovs2krb4amke">FAQ</a> for more information. 
                            </p>
                        </div>
                        <div class="form-group narrow">
                            <label>Onsite Trainning Required?</label><br>
                            <?= $this->Form->select('Services.onsite_workshops_days', [
                                0 => __('None'),
                                4 => __('4 day workshop')
                            ], [
                                'class' => 'form-control',
                                'onChange' => 'ServicesSection.updateBill();'
                            ]) ?>
                            <?= $this->Form->error('Services.onsite_workshops_days') ?>
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
