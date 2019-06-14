<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;
use Cake\Routing\Router;

$this->layout = 'default';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
if (extension_loaded('xdebug')) :
    xdebug_print_function_stack();
endif;

$this->end();
endif;
?>

<section class="footer-margin first-section-margin">
    <div class="container">
        <div class="row mb-md">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">
                    <?= h($message) ?>
                </h1>
                <p class="error text-center mb-lg">
                    <strong><?= __d('cake', 'Error') ?>: </strong>
                    <?= __d('cake', 'The requested address {0} was not found on this server.', "<strong>'{$url}'</strong>") ?>
                </p>
                
                <div class="text-center">
                    <a href="<?= Router::url('/') ?>" class="btn btn-primary"><?= __('Back to home') ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="done-img"><img src="/img/done.png" alt=""></section>