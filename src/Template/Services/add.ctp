<?php
use Cake\Routing\Router;

$this->assign('title', __('Paid Services | Eramba'));
$this->SocialHeaders->set([
    'description' => __('Choose the eramba for your needs.')
]);
?>
<section class="footer-margin first-section-margin">
    <?= $this->Form->create(isset($service) ? $service : null, [
        'url' => ['controller' => 'Services', 'action' => 'add'],
        'id' => 'services_form'
    ]) ?>
        <div class="container">
            <div class="row mb-sm">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <h1 class="text-center">
                        Last step!
                    </h1>
                    <p class="text-grey text-center mb-md">
                        Please fill in the form and provide us the billing information
                    </p>

                    <div class="form-group">
                        <label>Organisation name</label>
                        <?= $this->Form->text('service_billing_information.company_name', [
                            'class' => 'form-control'
                        ]) ?>
                        <?= $this->Form->error('service_billing_information.company_name') ?>
                    </div>
                    <div class="form-group">
                        <label>Street and Number</label>
                        <?= $this->Form->text('service_billing_information.company_address', [
                            'class' => 'form-control'
                        ]) ?>
                        <?= $this->Form->error('service_billing_information.company_address') ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country</label>
                                <?= $this->Form->select('service_billing_information.country_id', $countryOptions, [
                                    'class' => 'select2-form-control form-control'
                                ]) ?>
                                <?= $this->Form->error('service_billing_information.country_id') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State</label>
                                <?= $this->Form->text('service_billing_information.state', [
                                    'class' => 'form-control'
                                ]) ?>
                                <?= $this->Form->error('service_billing_information.state') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label>
                                <?= $this->Form->text('service_billing_information.city', [
                                    'class' => 'form-control'
                                ]) ?>
                                <?= $this->Form->error('service_billing_information.city') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Zip code</label>
                                <?= $this->Form->text('service_billing_information.zip_code', [
                                    'class' => 'form-control'
                                ]) ?>
                                <?= $this->Form->error('service_billing_information.zip_code') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>VAT number <span class="text-grey">(European Union only)</span></label>
                        <?= $this->Form->text('service_billing_information.vat_number', [
                            'class' => 'form-control'
                        ]) ?>
                        <?= $this->Form->error('service_billing_information.vat_number') ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Your Name</label>
                                <?= $this->Form->text('service_billing_information.name', [
                                    'class' => 'form-control'
                                ]) ?>
                                <?= $this->Form->error('service_billing_information.name') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Surname</label>
                                <?= $this->Form->text('service_billing_information.surname', [
                                    'class' => 'form-control'
                                ]) ?>
                                <?= $this->Form->error('service_billing_information.surname') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Your Email</label>
                        <?= $this->Form->email('service_billing_information.email', [
                            'class' => 'form-control'
                        ]) ?>
                        <?= $this->Form->error('service_billing_information.email') ?>
                    </div>
                    <div class="form-group radio">
                        <legend>Choose a currency</legend>
                        <?= $this->Form->radio('service_billing_information.currency', $currencyOptions) ?>
                        <?= $this->Form->error('service_billing_information.city') ?>
                    </div>
                    <div class="form-group radio">
                        <legend>Choose type of payment</legend>
                        <?= $this->Form->radio('service_billing_information.payment_type', $paymentTypeOptions) ?>
                        <?= $this->Form->error('service_billing_information.payment_type') ?>
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <?= $this->Form->textarea('service_billing_information.notes', [
                            'class' => 'form-control',
                            'placeholder' => __("Leave a note to our invoicing team if you need a quote, invoice, partner license, etc. You will be responded by a human!")
                        ]) ?>
                        <?= $this->Form->error('service_billing_information.notes') ?>
                    </div>
                </div>
            </div>

            <div id="paid-services-actions">
                <a href="<?= Router::url([
                    'controller' => 'Services',
                    'action' => 'index'
                ]) ?>" class="btn btn-primary mb-sm">Go Back</a>
                <button type="button" class="btn btn-primary mb-sm" data-toggle="modal" data-target="#preview-bill-modal" onClick="ServicesSection.previewQuote();">Preview my Quote</button>
                <button class="btn btn-primary mb-sm">Submit</button>
                <br>
                <a href="<?= Router::url([
                    'controller' => 'Services',
                    'action' => 'abort'
                ]) ?>" class="btn btn-primary-white">Abort and Contact Us</a>
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
        ServicesSection.previewQuoteUrl = "<?= Router::url(['controller' => 'Services', 'action' => 'previewQuote', 'user_info']) ?>";
    });
</script>
