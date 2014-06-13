<?php

namespace Extension\Maniaplanet;

use Model\Server\Data;

class ServerConnection extends \OWeb\types\extension
{

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
    }

    public function getIdList()
    {
	$settingsManager = \OWeb\manage\Settings::getInstance();
	$config = (object) $settingsManager->getSetting(get_class());
	return array_keys($config->host);
    }

    public function getData($serverId = null)
    {

	$settingsManager = \OWeb\manage\Settings::getInstance();
	$config = (object) $settingsManager->getSetting(get_class());

	if ($serverId === null && empty($this->servers)) {
	    foreach ($config->host as $id => $ip) {
                $this->servers[$id] = $this->ext_core_cache_Caching->createCacheElement('serverInfo.'.$id, array($this, 'getServerData'), array($id), $config->cacheTimeout);
	    }
	} else {
            $this->servers[$serverId] =  $this->ext_core_cache_Caching->createCacheElement('serverInfo.'.$serverId, array($this, 'getServerData'), array($serverId), $config->cacheTimeout);
	}

	return $this->connections;
    }

    public function getServerData($id)
    {

        $settingsManager = \OWeb\manage\Settings::getInstance();
        $config = (object) $settingsManager->getSetting(get_class());

        if (isset($config->host[$id]) && isset($config->port[$id]) && isset($config->user[$id]) && isset($config->password[$id])) {
            $this->getConnection($id, $config->host[$id], $config->port[$id], $config->user[$id], $config->password[$id]);
        }

        return $this->servers[$id];
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
    public function getConnection($id, $host, $port, $user, $password)
    {

	if (!is_object($this->connection)) {
	    try {
		$this->connections[$id] = \Maniaplanet\DedicatedServer\Connection::factory($host, $port, 1, $user, $password);
		$this->syncData($id, $this->connections[$id]);
                $this->servers[$id]->isConnected = true;
	    } catch (\Exception $ex) {
                $this->servers[$id] = new Data();
                $this->servers[$id]->isConnected = false;
		$this->isConnected[$id] = false;
	    }
	}
    }

    private function syncData($id, \Maniaplanet\DedicatedServer\Connection $connection)
    {
        $server = new Data();

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

}
