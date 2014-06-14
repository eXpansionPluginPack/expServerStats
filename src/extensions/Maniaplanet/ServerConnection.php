<?php

namespace Extension\Maniaplanet;

use Model\Server\Data;

class ServerConnection extends \OWeb\types\extension
{

    private $config;

    /** @var \Maniaplanet\DedicatedServer\Connection[] */
    private $connections = array();

    /** @var Data[]  */
    private $servers = array();

    public function __construct()
    {
	$this->addDependance('core\cache\Caching');
    }

    protected function init()
    {
	$this->addAction('get', 'getServerDataAction');
	$settingsManager = \OWeb\manage\Settings::getInstance();
	$this->config = (object) $settingsManager->getSetting(get_class());
    }

    public function getIdList()
    {

	return array_keys($this->config->host);
    }

    public function getData($serverId = null)
    {

	if ($serverId === null && empty($this->servers)) {
	    foreach ($this->config->host as $id => $ip) {
		$this->servers[$id] = $this->ext_core_cache_Caching->createCacheElement('serverInfo.' . $id, array($this, 'getServerData'), array($id), $this->config->cacheTimeout);
	    }
	} else {
	    $this->servers[$serverId] = $this->ext_core_cache_Caching->createCacheElement('serverInfo.' . $serverId, array($this, 'getServerData'), array($serverId), $this->config->cacheTimeout);
	}

	return $this->servers[$serverId];
    }

    public function getServerData($id)
    {

	if (isset($this->config->host[$id]) && isset($this->config->port[$id]) && isset($this->config->user[$id]) && isset($this->config->password[$id])) {
	    $this->connect($id, $this->config->host[$id], $this->config->port[$id], $this->config->user[$id], $this->config->password[$id]);
	}

	return $this->servers[$id];
    }

    public function getConnection($id)
    {
	if (is_object($this->connections[$id])) {
	    return $this->connections[$id];
	}
	return null;
    }

    /**
     * Connects with maniaplanet
     *
     * @param int $id
     * @param string $host
     * @param int $port
     * @param string $user
     * @param string $password
     */
    private function connect($id, $host, $port, $user, $password)
    {

	if (!is_object($this->connection)) {
	    try {
		$this->connections[$id] = \Maniaplanet\DedicatedServer\Connection::factory($host, $port, 1, $user, $password);
		$this->syncData($id, $this->connections[$id]);
		$this->servers[$id]->isConnected = true;
		$this->servers[$id]->name = $this->config->name[$id];
	    } catch (\Exception $ex) {
		$this->connections[$id] = null;
		$this->servers[$id] = new Data();
		$this->servers[$id]->isConnected = false;
		$this->servers[$id]->name = $this->config->name[$id];
	    }
	}
    }

    private function syncData($id, \Maniaplanet\DedicatedServer\Connection $connection)
    {


	$server = new Data();

	$server->name = $this->config->name[$id];
	$server->server = \Maniaplanet\DedicatedServer\Structures\ServerOptions::fromArray($connection->getServerOptions());

	$server->maps = \Maniaplanet\DedicatedServer\Structures\Map::fromArrayOfArray($connection->getMapList(-1, 0));

	$server->currentMap = $connection->getCurrentMapInfo();

	$data = $connection->getPlayerList(-1, 0);

	foreach ($data as $player) {
	    if (!$player->spectator) {
		$server->players[$player->login] = $player;
	    } else {
		$server->spectators[$player->login] = $player;
	    }
	}

	$this->servers[$id] = $server;
    }

    public function getServerDataAction()
    {
	$id = intval($this->getParam("id"));

	$this->getData($id);

	$results = $this->servers[$id];

	return $results;
    }

    public function getTimeOut()
    {
	return $this->config->cacheTimeout;
    }

}
