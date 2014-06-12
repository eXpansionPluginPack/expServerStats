<?php

/**
 * @author      Oliver de Cramer (oliverde8 at gmail.com)
 * @author      Petri Järvisalo (petri.jarvisalo@gmail.com)
 * 
 * @copyright    GNU GENERAL PUBLIC LICENSE
 *                     Version 3, 29 June 2007
 *
 * PHP version 5.3 and above
 *
 * LICENSE: This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see {http://www.gnu.org/licenses/}.
 */

namespace Page;

use OWeb\types\Controller;

class home extends Controller {

    /** @var Maniaplanet\DedicatedServer\Connection */
    public $connection = null;

    /** @var \Extension\Maniaplanet\ServerConnection */
    public $server = null;

    public function init() {
	$this->connection = $this->getConnection();
    }

    public function onDisplay() {
	$this->view->serverOptions = $this->server->server;
	$this->view->players = $this->server->players;
	$this->view->specatators = $this->server->spectators;
	$this->view->maps = $this->server->maps;
	$this->view->currentMap = $this->server->currentMap;
	
    }

    /**
     * 
     * @return \Maniaplanet\DedicatedServer\Connection
     */
    private function getConnection() {

	$this->server = \OWeb\manage\Extensions::getInstance()->getExtension('Maniaplanet\ServerConnection');

	return $this->server->getConnection();
    }

}
