<?php
$class = (!empty($params['class'])) ? $params['class'] : '';

if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script type="text/javascript">
new PNotify({
	title: false,
	text: "<?= $message ?>",
	type: 'info',
	addclass: '<?= $class ?>',
	icon: false,
	delay: 6000,
	buttons: {
		closer: true,
		closer_hover: false,
		sticker: false
	}
});
</script>