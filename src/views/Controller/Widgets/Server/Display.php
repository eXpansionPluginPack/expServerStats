<?php
/**
 * @var \Controller\Widgets\Server\Display $this
 */
$this;

/**
 * @var \OWeb\utils\js\jquery\HeaderOnReadyManager $headersOnReady
 */
$headersOnReady = \OWeb\utils\js\jquery\HeaderOnReadyManager::getInstance();

/**
 * @var \OWeb\manage\Headers $headers
 */
$headers = \OWeb\manage\Headers::getInstance();
$headers->addJs('styleParser.js');
$headers->addJs('serverOverView.js');


$code = '
serverOverview(' . $this->id . ');
';

$headersOnReady->add($code);
?>

<div class="uk-panel uk-panel-box" id="overview-server-<?php echo $this->id; ?>" > 
    <div class="uk-panel-title  serverName ">
	(server offline)
    </div>
    <div class="uk-panel-badge ladder"></div>
    <table>
        <tbody>
            <tr>
                <td colspan="3" class="currentMap"></td>
            </tr>
            <tr>
                <td class="uk-width-1-3 players"></td>
                <td class="uk-width-1-3 spectators"></td>
                <td class="uk-width-1-3 mapCount"></td>
            </tr>

        </tbody>
    </table>
</div>