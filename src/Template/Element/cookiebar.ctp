<?php
$policyLink = $this->Html->link(__('privacy policy'), 'https://docs.google.com/document/d/1VctdYiI3b5_imQYYy0z3QEA8Ab6bpMISdhWBfj1pq2U/edit', [
	'target' => '_blank'
]);
?>
<div id="cookie-bar" class="hidden">
	<div class="container">
		<div id="cookie-bar-text">
			<?= __('We use cookies to deliver the right user experience on our website, check our {0} for details or close the window if you are not happy with this.', [$policyLink]) ?>
			<?= $this->Html->tag('button', __('OK')) ?>
		</div>
	</div>
</div>