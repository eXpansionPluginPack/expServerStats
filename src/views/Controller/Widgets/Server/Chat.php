<?php
/**
 * @var Model\Server\Chat $data
 */
$data = $this->chat;
?>
<h3><?php echo $this->l('Chat') ?> </h3>
<div class="serverChat">
    <?php foreach ($data as $line) : ?>

	<?php echo $this->parseColors($line); ?> <br>

    <?php endforeach; ?>
</div>
