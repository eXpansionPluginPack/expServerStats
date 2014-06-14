<div class="uk-width-3-10">
    <ul class="uk-list uk-list-striped">
        <li>
            <a href="<?php echo $this->url(array('page'=>'Overview\Server', 'id'=>$this->id)); ?>">
                <i class="uk-icon-home"></i>
                <?php echo $this->l('Overview') ?>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="uk-icon-users"></i>
                <?php echo $this->l('Player Rankings') ?>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="uk-icon-database"></i>
                <?php echo $this->l('Statistics') ?>
            </a>
        </li>
        <li>
            <a href="<?php echo $this->url(array('page'=>'Overview\LiveChat', 'id'=>$this->id)); ?>">
                <i class="uk-icon-wechat"></i>
                <?php echo $this->l('Live Chat') ?>
            </a>
        </li>
    </ul>
</div>

<?php $this->loadWithAjax('Widgets\Server\Display&id=' . $this->id, $this->timeout, 'uk-width-7-10" data-uk-grid-margin '); ?>