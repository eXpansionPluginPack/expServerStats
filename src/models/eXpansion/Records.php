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

namespace Model\eXpansion;


use Extension\db\Connection;
use OWeb\utils\Singleton;

class Records extends Singleton {
    /**
     * @var Record[]
     */
    private $records= array();

    /**
     * @var Connection
     */
    private $ext_connection;

    /**
     * @return Records
     */
    static public function getInstance()
    {
        $class = self::getInstanceNull();
        if ($class == null) {
            $obj = new Records();
            self::setInstance($obj);

            return $obj;
        }
    }

    function __construct()
    {
        $this->ext_connection = \OWeb\manage\Extensions::getInstance()->getExtension('db\Connection');
    }


    public function getChallangeRecords($uid){

        if(isset( $this->records[$uid]))
            return $this->records[$uid];

        $records = array();

        $connection = $this->ext_connection->get_Connection();

        $q = "SELECT * FROM `exp_records`, `exp_players`
                    WHERE `record_challengeuid` = :uid AND record_nbLaps = 1
                        AND `exp_records`.`record_playerlogin` = `exp_players`.`player_login`
                    ORDER BY `record_score` ASC
                    LIMIT 0, " . 100 . ";";

        $sql = $connection->prepare($q);

        if ($sql->execute(array('uid'=>$uid))) {

            $i       = 1;
            $records = array();
            $players = array();
            while ($data = $sql->fetchObject()) {

                $record = new Record();


                $record->place            = $i;
                $record->login            = $data->record_playerlogin;
                $record->nickName         = $data->player_nickname;
                $record->time             = $data->record_score;
                $record->nbFinish         = $data->record_nbFinish;
                $record->avgScore         = $data->record_avgScore;
                $record->nation           = $data->player_nation;
                $record->ScoreCheckpoints = explode(",", $data->record_checkpoints);
                $record->uId              = $this->storage->currentMap->uId;

                $records[$i - 1] = $record;
                $i++;
            }

            $this->records[$uid] = $records;
            return  $this->records[$uid];
        }
    }
} 