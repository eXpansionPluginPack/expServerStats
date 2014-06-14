<?php
/**
 * @var Model\Server\Data $data
 */
$data = $this->data;
if ($data->isConnected == 1) {
    ?>


    <a href="#test" id="overview-server-<?php echo $this->id; ?>">
        <div class="uk-panel uk-panel-box panel-serverOverview">
    	<div class="uk-panel-title  serverName ">
		<?php echo $this->parseColors($data->server->name) ?>  <sup><?php echo ($data->server->ladderServerLimitMax / 1000) . "k"; ?></sup>
    	</div>
    	<div class="uk-panel-badge badge-online uk-badge-success">
    	    Online
    	</div>
    	<table width="100%">
    	    <tbody>
    		<tr>
    		    <td colspan="3" class="currentMap">
			    <?php echo $this->parseColors($data->currentMap->name) . ' ' . $this->l('by') . ' ' . $this->parseColors($data->currentMap->author) ?>
    		    </td>
    		<tr>
    		    <td class="uk-width-1-3 players">                  
    			<i class="uk-icon-user"></i>
			    <?php echo count($data->players) . '/' . $data->server->currentMaxPlayers; ?>
    		    </td>
    		    <td class="uk-width-1-3 spectators">
    			<i class="uk-icon-eye"></i>
			    <?php echo count($data->spectators) . '/' . $data->server->currentMaxPlayers; ?>
    		    </td>
    		    <td class="uk-width-1-3 mapCount">
    			<i class="uk-icon-flash"></i>
			    <?php echo count($data->maps); ?>
    		    </td>
    		</tr>
    	    </tbody>
    	</table>
        </div>
    </a>
    <?php
} else {
    ?>

    <a href="#test" id="overview-server-<?php echo $this->id; ?>">
        <div class="uk-panel uk-panel-box panel-serverOverview">
    	<div class="uk-panel-title  serverName ">
		<?php echo $this->parseColors($data->name) ?>   
    	</div>
    	<div class="uk-panel-badge uk-badge-danger badge-offline">
    	    not live
    	</div>
    	</table>
        </div>
    </a>


<?php } ?>
