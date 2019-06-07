<section class="mb-xl first-section-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center text-left-sm">
                <h1>
                    Contact us!
                </h1>
                <p class="text-grey">
                    Please use this form to reach out to us! We get tons of ideas, questions, proposals and bug reports that greatly help the project.Dont by shy and drop us a line! We always reply!
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
                        <label>What's your name? <span class="text-grey">(Required)</span></label>
                        <?= $this->Form->text('Contacts.name', [
                            'class' => 'form-control',
                            'placeholder' => 'John Doe'
                        ]) ?>
                        <?= $this->Form->error('Contacts.name') ?>
                    </div>

                    <div class="form-group">
                        <label>Where are you based? <span class="text-grey">(Required)</span></label>
                        <?= $this->Form->select('Contacts.country_id', $countryOptions, [
                            'class' => 'select2-form-control form-control',
                            'id' => 'contact-form-country-select'
                        ]) ?>
                        <?= $this->Form->error('Contacts.country_id') ?>
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
                            'placeholder' => 'Ideas how to improve? Questions? Enterprise Support? Some Issue?'
                        ]) ?>
                        <?= $this->Form->error('Contacts.body') ?>
                    </div>

                    <div class="text-center mb-md">
                        <div class="g-recaptcha" data-sitekey="6LcDyaIUAAAAALz7fnBULKDDmReuRFAUqeeQrlLW"></div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>

<div id="contact-img">
    <img src="/img/contact-bg.png" id="contact-bg" alt="">
</div>

<?= $this->Html->script("https://www.google.com/recaptcha/api.js", [
    'async', 'defer'
]) ?>
