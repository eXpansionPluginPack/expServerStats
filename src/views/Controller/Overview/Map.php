<?php
/**
 * @var \Model\eXpansion\MapInfo $map
 */
$map = $this->map;

/**
 * @var \OWeb\manage\Headers $headers
 */
$headers = \OWeb\manage\Headers::getInstance();

$headers->addJs('highcharts/highcharts.js');

$headers->addJs('highcharts/highcharts-more.js');
?>

<div class="uk-width-1-1">
    <div class="uk-grid">
        <div class="uk-width-1-2">
            <div class="uk-panel uk-panel-box">
                <dl class="uk-description-list uk-description-list-horizontal">
                    <dt>Name</dt>
                    <dd><?php echo $this->parseColors($map->getName()) ?></dd>
                </dl>
                <dl class="uk-description-list uk-description-list-horizontal">
                    <dt>Author</dt>
                    <dd><?php echo $map->getAuthor() ?></dd>
                </dl>
            </div>
        </div>

        <div class="uk-width-1-2">
            <div class="uk-panel uk-panel-box">
                <dl class="uk-description-list uk-description-list-horizontal">
                    <dt>Added By</dt>
                    <dd><?php echo $map->getAddedby() ?></dd>
                </dl>
                <dl class="uk-description-list uk-description-list-horizontal">
                    <dt>Added On</dt>
                    <dd><?php echo date("Y-m-d", $map->getAddtime()); ?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<div class="uk-width-1-1">

    <?php
    /**
     * @var \Model\eXpansion\Record[] $records
     */
    $records = $map->getRecords();
    ?>
    <h3><?php echo $this->l('Records') ?> </h3>
    <table class="uk-table uk-table-striped">
        <tr>
            <th></th>
            <th>
                NickName
            </th>
            <th>
                Login
            </th>
            <th>
                Average Time
            </th>
            <th>
                nbFinish
            </th>
            <th>
                Record
            </th>
        </tr>

	<?php if (empty($records)) : ?>
    	<tr>
    	    <td colspan="5">No records on this map</td>
    	</tr>

	<?php else : ?>
	    <?php foreach ($records as $record) : ?>
		<tr>
		    <td>
			<?php echo $record->place; ?>
		    </td>
		    <td>
			<?php echo $this->parseColors($record->nickName); ?>
		    </td>
		    <td>
			<?php echo $record->login; ?>
		    </td>
		    <td>
			<?php echo Time::fromTM($record->avgScore); ?>
		    </td>
		    <td>
			<?php echo $record->nbFinish; ?>
		    </td>
		    <td>
			<?php echo Time::fromTM($record->time); ?>
		    </td>
		</tr>
	    <?php endforeach ?>
	<?php endif ?>

    </table>
</div>
<?php
if (!empty($records)) :
    ?>

    <div class="uk-width-1-1">
        <div id="map-top5CpGraph"></div>
    </div>

    <?php
    $i = 0;
    $series = array();
    foreach ($records as $record) {

	if ($i > 4)
	    break;

	$cps = array();
	$prev = 0;
	$cpLabels = array();
	foreach ($record->ScoreCheckpoints as $index => $cp) {
	    $cps[] = ($cp - $prev) / 1000;
	    $prev = $cp;
	    $cpLabels[] = "Cp " . ($index + 1);
	}

	$cpLabels[(count($cpLabels) - 1)] = "Finish";



	$data = array();
	$data['name'] = $record->login;
	$data['data'] = $cps;
	$series[] = $data;
	$i++;
    }

    $data = array();
    $data['title'] = array('text' => "Best 5 Times by Checkpoint");
    $data['yAxis'] = array('title' => array('text' => "Seconds"), "min" => 0);
    $data['xAxis'] = array('title' => array('text' => "Checkpoint"), "allowDecimals" => false, "type" => "category", "categories" => $cpLabels);
    $data['tooltip'] = array('valueSuffix' => 's', 'valueDecimals' => 3);
    $data['series'] = $series;

    /**
     * @var \OWeb\utils\js\jquery\HeaderOnReadyManager $onReady
     */
    $onReady = \OWeb\utils\js\jquery\HeaderOnReadyManager::getInstance();

    $onReady->add("$('#map-top5CpGraph').highcharts(" . json_encode($data) . ")");
    ?>

<?php endif ?>

