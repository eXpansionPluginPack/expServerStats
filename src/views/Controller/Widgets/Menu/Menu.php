<?php
/**
 * @var Model\Server\Chat $data
 */
$data = $this->data;
?>

<nav class = "uk-navbar uk-margin-large-bottom">
    <a class = "uk-navbar-brand uk-hidden-small" href = "<?php echo $this->url(array('page' => 'home')) ?>">
	<?php echo $this->l('Server Stats')
	?>
    </a>
    <ul class="uk-navbar-nav">    
	<li class="uk-navbar-parent" data-uk-dropdown>
	    <a href="#"> <?php echo $this->l('Servers'); ?> <i class="uk-icon-caret-down"></i></a>

	    <div class="uk-dropdown uk-dropdown-navbar">
		<ul class="uk-nav uk-nav-navbar">
		    <?php foreach ($data as $id => $name) : ?>
    		    <li><a href="<?php echo $this->url(array('page' => 'Overview.Server', "id" => $id)) ?>"><?php echo $name; ?></a></li>
		    <?php endforeach;
		    ?>
		</ul>
	    </div>
	</li>
	<li>
	    <a href = "<?php echo $this->url(array('page' => 'rankings')) ?>">
		<?php echo $this->l('Rankings');
		?>
	    </a>
	</li>
	<li>
	    <a href="#"><?php echo $this->l('Tournaments'); ?></a>
	</li>
    </ul>
    <div class="uk-navbar-flip">
        <ul class="uk-navbar-nav">
            <li class="uk-navbar-parent"  data-uk-dropdown>
                <a href="#"> <?php echo $this->l('Languages'); ?> <i class="uk-icon-caret-down"></i></a>
                <div class="uk-dropdown uk-dropdown-navbar">
                    <ul  class="uk-nav uk-nav-navbar">
                        <li>
                            <a>en</a>
                        </li>
                        <li>
                            <a>Fr</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>