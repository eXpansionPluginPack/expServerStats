<?php
/**
 * @var Model\Server\Data $data
 */
$data = $this->data;
?>
<h3><?php echo $this->l('Maps') ?> </h3>
<table class="uk-table uk-table-striped">
    <tr>
        <th>
            Name
        </th>
        <th>
            <i class="uk-icon-user"></i>
            Author
        </th>
        <th>
            <i class="uk-icon-cubes"></i>
            Environment
        </th>
        <th>
            <i class="uk-icon-trophy"></i>
            Gold Time
        </th>
    </tr>

    <?php if (!empty($data->maps)) : ?>

	<?php
	/** @var \Extension\core\url\Link $mapLink */
	$mapLink = $this->url(array('page' => 'Overview\Map'));
	?>

	<?php foreach ($data->maps as $map) : ?>
	    <?php $mapLink->addParam('uid', $map->uId); ?>

	    <tr class="mapRow">
		<td class="textShadow mapEntry">
		    <abbr title="<?php echo $this->l("Click to see more statistics about the map!"); ?>">
			<a href="<?php echo $mapLink; ?>">
			    <?php echo $this->parseColors($map->name); ?>
			</a></abbr>
		</td>
		<td>
		    <?php echo $this->parseColors($map->author); ?>
		</td>
		<td>
		    <?php echo $map->environnement; ?>
		</td>
		<td>
		    <?php echo Time::fromTM($map->goldTime); ?>
		</td>
	    </tr>
	</a>
    <?php endforeach; ?>

<?php endif ?>

</table>