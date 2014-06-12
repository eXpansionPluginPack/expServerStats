
<?php  foreach($this->serverIds as $id) : ?>
    <!-- <div class="uk-container-"> -->
    <?php

        \OWeb\manage\SubViews::getInstance()->getSubView('\Controller\Widgets\Server\Display')
            ->addParams('id', $id)
            ->display();

    ?>
    <!-- </div> -->
<?php endforeach;


