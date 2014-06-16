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
    <?php $byEnviCount = array(); ?>
    <?php $byStyleCount = array(); ?>
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
                <?php
                if (!isset($byEnviCount[$map->environnement]))
                    $byEnviCount[$map->environnement] = 0;
                $byEnviCount[$map->environnement]++;

                if($map->mapStyle == "")
                    $style = "none";
                else
                    $style = $map->mapStyle;

                if (!isset($byStyleCount[$style]))
                    $byStyleCount[$$style] = 0;
                $byStyleCount[$style]++;
                ?>
            </td>
            <td>
                <?php echo Time::fromTM($map->goldTime); ?>
            </td>
        </tr>
        </a>
    <?php endforeach; ?>

</table>

<?php
$enviCountString = '';
foreach($byEnviCount as $envi => $nb){
    if($enviCountString != "")
        $enviCountString .= ',';
    $enviCountString .= '["'.$envi.'", '.$nb.']';
}

$styleCountString = '';
foreach($byStyleCount as $style => $nb){
    if($styleCountString != "")
        $styleCountString .= ',';
    $styleCountString .= '["'.$style.'", '.$nb.']';
}
?>

    <script>
        $('#maps-enviDist').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Envi disribution'
            },
            series: [{
                type: 'pie',
                name: 'Number of Maps',
                data: <?php echo "[$enviCountString]" ?>
            }]
        });

        $('#maps-styleDist').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Style disribution'
            },
            series: [{
                type: 'pie',
                name: 'Number of Maps',
                data: <?php echo "[$styleCountString]" ?>
            }]
        });


    </script>

<div class="uk-grid">
    <div class="uk-width-1-3">
        <div id="maps-enviDist"></div>
    </div>
    <div class="uk-width-1-3">
        <div id="maps-styleDist"></div>
    </div>
</div>

<?php endif ?>

