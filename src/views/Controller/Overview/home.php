<div class="uk-width-1-1">
    <h2><?php echo $this->l('Servers Online') ?> </h2>
    
    <?php foreach ($this->serverIds as $id) : ?>   
	<?php
        $this->loadWithAjax('Widgets\Server\Display&id='.$id, $this->timeout);
	/*\OWeb\manage\SubViews::getInstance()->getSubView('\Controller\Widgets\Server\Display')
		->addParams('id', $id)
		->display();*/
	?>
    <?php endforeach; ?>
</div>

