<?php

namespace Extension\Maniaplanet;

class ServerConnection extends \OWeb\types\extension {

    /** @var \Maniaplanet\DedicatedServer\Connection */
    private $connection = null;
    public $isConnected = false;

    /** @var \Maniaplanet\DedicatedServer\Structures\ServerOptions */
    public $server;

    /** @var \Maniaplanet\DedicatedServer\Structures\Player[]; */
    public $players = array();

    /** @var \Maniaplanet\DedicatedServer\Structures\Player[]; */
    public $spectators = array();

    /** @var \Maniaplanet\DedicatedServer\Structures\Map[]; */
    public $maps = array();

    /** @var \Maniaplanet\DedicatedServer\Structures\Map; */
    public $currentMap = array();

    protected function init() {
	$this->server = new \Maniaplanet\DedicatedServer\Structures\ServerOptions();
	$this->getConnection();
    }

    /**
     * init or get Maniaplanet server connection
     * @return Maniaplanet\DedicatedServer\Connection | null
     */
    public function getConnection() {
	$settingsManager = \OWeb\manage\Settings::getInstance();
	$config = (object) $settingsManager->getSetting(get_class());
	if (!is_object($this->connection)) {
	    try {
		$this->connection = \Maniaplanet\DedicatedServer\Connection::factory($config->host, $config->port, 1, $config->user, $config->password);
		$this->syncData();
		$this->isConnected = true;
	    } catch (\Exception $ex) {

		$this->isConnected = false;
	    }
	}

	return $this->connection;
    }

    private function syncData() {
	$this->server = \Maniaplanet\DedicatedServer\Structures\ServerOptions::fromArray($this->connection->getServerOptions());
	$this->maps = \Maniaplanet\DedicatedServer\Structures\Map::fromArrayOfArray($this->connection->getMapList(-1, 0));
	$this->currentMap = $this->connection->getCurrentMapInfo();
	$data = $this->connection->getPlayerList(-1, 0);
	foreach ($data as $player) {
	    if (!$player->spectator) {
		$this->players[$player->login] = $player;
	    } else {
		$this->spectators[$player->login] = $player;
	    }
	}
    }

}
