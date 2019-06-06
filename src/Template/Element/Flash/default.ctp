<?php
$class = 'alert';
if (!empty($params['class'])) {
    $class .= ' alert-' . $params['class'];
} else {
	$class .= ' alert-primary';
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="<?= h($class) ?> alert-dismissible fade show" role="alert" onclick="this.classList.add('hidden')">
	<?= $message ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>		
</div>