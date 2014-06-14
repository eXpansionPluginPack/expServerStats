<div class="uk-width-1-1">
    <h2><?php echo $this->l('Servers Online') ?> </h2>
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match>
    <?php foreach ($this->serverIds as $id) : ?>   
	<?php
        $this->loadWithAjax('Widgets\Server\Display&id='.$id, $this->timeout,  'uk-width-1-2" data-uk-grid-margin ');
        //keep triple show for now for debug purposes
        $this->loadWithAjax('Widgets\Server\Display&id='.$id, $this->timeout,  'uk-width-1-2" data-uk-grid-margin ');
        $this->loadWithAjax('Widgets\Server\Display&id='.$id, $this->timeout,  'uk-width-1-2" data-uk-grid-margin ');
	/*\OWeb\manage\SubViews::getInstance()->getSubView('\Controller\Widgets\Server\Display')
		->addParams('id', $id)
		->display();*/
	?>
    <?php endforeach; ?>
        </div>
</div>

