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

namespace Controller\Overview;


use Model\eXpansion\MapInfos;
use OWeb\types\Controller;

class Map  extends Controller{

    public function init()
    {
        $this->addDependance('Maniaplanet\ColorParser');
    }

    public function onDisplay()
    {
        $this->view->uid = $this->getParam('uid');
        $this->view->map = MapInfos::getInstance()->getMapInfo($this->view->uid);
    }
} 