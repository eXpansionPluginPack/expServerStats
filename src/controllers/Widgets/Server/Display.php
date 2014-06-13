<?php
/**
 * @author      Oliver de Cramer (oliverde8 at gmail.com)
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

namespace Controller\Widgets\Server;


use Extension\Maniaplanet\ServerConnection;
use OWeb\types\Controller;

class Display extends Controller{

    /**
     * @var ServerConnection
     */
    protected $dedi_ext;

    public function init()
    {
        $this->addDependance('Maniaplanet\ServerConnection');
        $this->addDependance('Maniaplanet\ColorParser');
        $this->dedi_ext = \OWeb\manage\Extensions::getInstance()->getExtension('Maniaplanet\ServerConnection');
    }

    public function setServerId($id){
        $this->addParams('id', $id);
    }

    public function onDisplay()
    {
        $this->view->id = $this->getParam('id');
        $this->view->data = $this->dedi_ext->getData($this->view->id);
    }
}