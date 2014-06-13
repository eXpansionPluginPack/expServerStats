<div class="uk-width-2-10" id='tabmenu'>
    <!-- tabmenu -->
    <ul class="side-nav">
        <li class="side-active"><a href="#">Server</a></li>
        <li><a href="#">Players</a></li>
        <li><a href="#">Maps</a></li>

    </ul>

</div>
<div class="uk-width-8-10">
    <?php foreach ($this->serverIds as $id) : ?>

	<?php
        $this->loadWithAjax('Widgets\Server\Display&id='.$id, $this->timeout);
	/*\OWeb\manage\SubViews::getInstance()->getSubView('\Controller\Widgets\Server\Display')
		->addParams('id', $id)
		->display();*/
	?>

    <?php endforeach; ?>

</div>

