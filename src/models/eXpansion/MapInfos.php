<?php
/**
 * @author       Oliver de Cramer (oliverde8 at gmail.com)
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

namespace Model\eXpansion;


use Extension\db\Connection;
use OWeb\utils\Singleton;

class MapInfos extends Singleton
{

    /**
     * @var MapInfo[]
     */
    private $maps = array();

    /**
     * @var Connection
     */
    private $ext_connection;

    private $records;

    /**
     * @return MapInfos
     */
    static public function getInstance()
    {
        $class = self::getInstanceNull();
        if ($class == null) {
            $obj = new MapInfos(Records::getInstance());
            self::setInstance($obj);

            return $obj;
        }
    }

    function __construct(Records $records)
    {
        $this->ext_connection = \OWeb\manage\Extensions::getInstance()->getExtension('db\Connection');
        $this->records        = $records;
    }

    public function getMapInfo($uid){
        if(isset($this->maps[$uid]))
            return $this->maps[$uid];

        $connection = $this->ext_connection->get_Connection();


        $sql = $connection->prepare("SELECT * FROM exp_maps
                    WHERE challenge_uid = :uid");

        if($sql->execute(array('uid'=> $uid)) && $data = $sql->fetchObject()){
            $this->maps[$uid] = new MapInfo($data, $this->records);
        }else{
            $this->maps[$uid] = null;
        }
        return $this->maps[$uid];
    }

} 