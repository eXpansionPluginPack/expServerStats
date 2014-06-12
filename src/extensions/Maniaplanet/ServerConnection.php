<?php

namespace Extension\Maniaplanet;

class ServerConnection extends \OWeb\types\extension {

    /** @var \Maniaplanet\DedicatedServer\Connection[] */
    private $connections = array();

    /** @var bool[] */
    public $isConnected = array();

    /** @var \Maniaplanet\DedicatedServer\Structures\ServerOptions[] */
    public $servers = array();

    /** @var \Maniaplanet\DedicatedServer\Structures\Player[][]; */
    public $players = array();

    /** @var \Maniaplanet\DedicatedServer\Structures\Player[][]; */
    public $spectators = array();

    /** @var \Maniaplanet\DedicatedServer\Structures\Map[][]; */
    public $maps = array();

    /** @var \Maniaplanet\DedicatedServer\Structures\Map[]; */
    public $currentMaps = array();

    protected function init() {
        $this->addAction('get','getServerDataAction');
    }

    public function getIdList(){
        $settingsManager = \OWeb\manage\Settings::getInstance();
        $config = (object) $settingsManager->getSetting(get_class());
        return array_keys($config->host);
    }


    public function getData($serverId = null){

        $settingsManager = \OWeb\manage\Settings::getInstance();
        $config = (object) $settingsManager->getSetting(get_class());

        if($serverId == null && empty($this->servers)){
            foreach($config->host as $id => $ip){
                if(isset($config->port[$id]) && isset($config->user[$id]) && isset($config->password[$id])){
                   $this->getConnection($id, $ip, $config->port[$id], $config->user[$id], $config->password[$id]);
                }
            }
        }else{
            $id = $serverId;
            if(isset($config->host[$id]) && isset($config->port[$id]) && isset($config->user[$id]) && isset($config->password[$id])){
                $this->getConnection($id, $config->host[$id], $config->port[$id], $config->user[$id], $config->password[$id]);
            }
        }

        return $this->connections;
    }


    /**
     * Connects with maniaplanet
     *
     * @param $id
     * @param $host
     * @param $port
     * @param $user
     * @param $password
     */
    public function getConnection($id, $host, $port, $user, $password) {

	if (!is_object($this->connection)) {
	    try {
		$this->connections[$id] = \Maniaplanet\DedicatedServer\Connection::factory($host, $port, 1, $user, $password);
		$this->syncData($id, $this->connections[$id]);
		$this->isConnected[$id] = true;
	    } catch (\Exception $ex) {
		$this->isConnected[$id] = false;
	    }
	}

    }

    private function syncData($id, \Maniaplanet\DedicatedServer\Connection $connection) {
	$this->servers[$id] = \Maniaplanet\DedicatedServer\Structures\ServerOptions::fromArray($connection->getServerOptions());
	$this->maps[$id] = \Maniaplanet\DedicatedServer\Structures\Map::fromArrayOfArray($connection->getMapList(-1, 0));
	$this->currentMap[$id] = $connection->getCurrentMapInfo();
	$data = $connection->getPlayerList(-1, 0);
	foreach ($data as $player) {
	    if (!$player->spectator) {
		$this->players[$player->login][$id] = $player;
	    } else {
		$this->spectators[$player->login][$id] = $player;
	    }
	}
    }

    public function getServerDataAction(){
        $this->getData($this->getParam("serverId"));
        $results['servers'] = $this->servers;
        $results['maps'] = $this->maps;
        $results['currentMap'] = $this->currentMap;
        $results['players'] = $this->players;
        $results['spectators'] = $this->spectators;
        return $results;
    }

}
