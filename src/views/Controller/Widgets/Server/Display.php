<?php
/**
 * @var Model\Server\Data $data
 */
$data = $this->data;


?>

<div class="uk-panel uk-panel-box" id="overview-server-<?php echo $this->id; ?>" > 
    <div class="uk-panel-title  serverName ">
	<?php echo $this->parseColors($data->server->name) ?>
    </div>
    <div class="uk-panel-badge ladder">
        <?php echo ($data->server->ladderServerLimitMin / 1000) . " - " . ($data->server->ladderServerLimitMax / 1000) . "k"; ?>
    </div>
    <table>
        <tbody>
            <tr>
                <td colspan="3" class="currentMap">
                    <?php echo $this->parseColors($data->currentMap->name).' '.$this->l('by').' '.$this->parseColors($data->currentMap->author) ?>
                </td>
            </tr>
            <tr>
                <td class="uk-width-1-3 players">
                    <?php echo count($data->players) .'/'.$data->server->currentMaxPlayers; ?>
                </td>
                <td class="uk-width-1-3 spectators">
                    <?php echo count($data->spectators) .'/'.$data->server->currentMaxPlayers; ?>
                </td>
                <td class="uk-width-1-3 mapCount">
                    <?php echo count($data->maps); ?>
                </td>
            </tr>

        </tbody>
    </table>
</div>