<?php
use Cake\Routing\Router;

$this->assign('title', __('Contact us | Eramba'));
?>
<section class="mb-xl first-section-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center text-left-sm">
                <h1>
                    Contact us!
                </h1>
                <p class="text-grey">
                </p>
            </div>
        </div>
    </div>
</section>

<section class="footer-margin">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <?= $this->Form->create(isset($contact) ? $contact : null, ['url' => ['controller' => 'Contacts', 'action' => 'add']]) ?>
                    <div class="form-group">
                        <label>Your name? <span class="text-grey">(Required)</span></label>
                        <?= $this->Form->text('Contacts.name', [
                            'class' => 'form-control',
                            'placeholder' => 'Batman'
                        ]) ?>
                        <?= $this->Form->error('Contacts.name') ?>
                    </div>

                    <div class="form-group">
                        <label>Where are you based? <span class="text-grey">(Required)</span></label>
                        <?= $this->Form->select('Contacts.country_id', $countryOptions, [
                            'class' => 'select2-form-control form-control',
                            'id' => 'location-country-select',
                            'empty' => __('Select Country'),
                            'onchange' => "Location.loadStates($(this).val(), 'location-state-select', '" . Router::url(['controller' => 'Contacts', 'action' => 'getStatesList']) . "')"
                        ]) ?>
                        <?= $this->Form->error('Contacts.country_id') ?>
                    </div>

                    <div class="form-group">
                        <label>Select a State / Region <span class="text-grey">(Optional)</span></label>
                        <?= $this->Form->select('Contacts.state_id', [], [
                            'class' => 'select2-form-control form-control',
                            'id' => 'location-state-select',
                            'empty' => __('Select State'),
                            'onchange' => "Location.loadCities($(this).val(), 'location-city-select', '" . Router::url(['controller' => 'Contacts', 'action' => 'getCitiesList']) . "')"
                        ]) ?>
                        <?= $this->Form->error('Contacts.state_id') ?>
                    </div>

                    <div class="form-group">
                        <label>Select a City if available <span class="text-grey">(Optional)</span></label>
                        <?= $this->Form->select('Contacts.city_id', [], [
                            'class' => 'select2-form-control form-control',
                            'id' => 'location-city-select',
                            'empty' => __('Select City')
                        ]) ?>
                        <?= $this->Form->error('Contacts.city_id') ?>
                    </div>

                    <div class="form-group">
                        <label>How can we help? <span class="text-grey">(Required)</span></label>
                        <?= $this->Form->select('Contacts.type', $typeOptions, [
                            'class' => 'select2-form-control form-control'
                        ]) ?>
                        <?= $this->Form->error('Contacts.type') ?>
                    </div>

                    <div class="form-group">
                        <label>Your Email <span class="text-grey">(Required)</span></label>
                        <?= $this->Form->email('Contacts.email', [
                            'class' => 'form-control',
                            'placeholder' => 'your@email.com'
                        ]) ?>
                        <?= $this->Form->error('Contacts.email') ?>
                    </div>

                    <div class="form-group">
                        <label>What are you interested to share with us? <span class="text-grey">(Required)</span></label>
                        <?= $this->Form->textarea('Contacts.body', [
                            'class' => 'form-control',
                            'placeholder' => ''
                        ]) ?>
                        <?= $this->Form->error('Contacts.body') ?>
                    </div>

                    <div class="form-check text-left mb-md">
                        <?= $this->Form->checkbox('Contacts.gdpr_consent', [
                            'class' => 'form-check-input',
                            'id' => 'form-check-gdpr'
                        ]) ?>
                        <label class="form-check-label form-check-label-small" for="form-check-gdpr">The only way we can respond you is for you to consent having this website store the information provided above. This wont be shared with anyone outside eramba and we will never send you sales, marketing or spam. <br><br>At any time you can request getting your personal data removed from our systems by emailing support@eramba.org - by checking the box on the left you agree to our <a href="https://www.eramba.org/privacy">privacy policy</a> and make the EU commission very happy...</label>
                        <?= $this->Form->error('Contacts.gdpr_consent') ?>
                    </div>

                    <div class="form-check text-left mb-md">
                        <?= $this->Form->checkbox('Contacts.community_days_notification', [
                            'class' => 'form-check-input',
                            'id' => 'form-check-cd-notify',
                            'checked' => 'checked'
                        ]) ?>
                        <label class="form-check-label form-check-label-small" for="form-check-cd-notify">I want to be notified when eramba visits my country on one of their community days - events organised for free to share GRC experiences using eramba</label>
                        <?= $this->Form->error('Contacts.community_days_notification') ?>
                    </div>

                    <?= $this->ReCaptcha->getHtml() ?>

                    <div class="text-center">
                        <?= $this->Form->button(__('SUBMIT'), [
                            'class' => 'btn btn-primary'
                        ]) ?>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>

<?= $this->ReCaptcha->getScript() ?>

<div id="contact-img">
    <img src="/img/contact-bg.png" id="contact-bg" alt="">
</div>
