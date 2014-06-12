<div class="uk-width-2-10" id='tabmenu'>
    <!-- tabmenu -->
    <ul class="side-nav">
	<li class="side-active"><a href="#">Server</a></li>
	<li><a href="#">Players</a></li>
	<li><a href="#">Maps</a></li>

    </ul>


</div>

<div class="uk-width-8-10" id="mainPage" >   
    <?php
    $parser = new TMFColorParser();
    $parser->autoContrastColor('#eee');
    $mapInfo = $this->currentMap->name . '$z by ' . $this->currentMap->author;

    /** @return \Maniaplanet\DedicatedServer\Structures\ServerOptions */
    function info() {
	return $this->serverOptions;
    }
    ?>

    <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
	<tbody>
	    <tr>
		<td class="uk-width-3-10 ">Server Name</td>
		<td class="uk-width-7-10"><?php echo $parser->toHTML($this->serverOptions->name); ?></td>
	    </tr>
	    <tr>
		<td class="uk-width-3-10 ">Ladder Limits</td>
		<td class="uk-width-7-10"><?php echo ($this->serverOptions->ladderServerLimitMin/1000) . " - ". ($this->serverOptions->ladderServerLimitMax/1000)."K"; ?></td>
	    </tr>
	    <tr>
		<td class="">Current Map</td>
		<td class=""><?php echo $parser->toHTML($mapInfo); ?></td>
	    </tr>
	    <tr>
		<td class="">Max Players</td>
		<td class=""><?php echo count($this->players) . " / " . $this->serverOptions->currentMaxPlayers; ?></td>
	    </tr>
	    <tr>
		<td class="">Max Spectators</td>
		<td class=""><?php echo count($this->spectators) . " / " . $this->serverOptions->currentMaxSpectators; ?></td>
	    </tr>
	    <tr>
		<td class="">Maps Total</td>
		<td class=""><?php echo count($this->maps); ?></td>
	    </tr>

	</tbody>

    </table>


</div>


