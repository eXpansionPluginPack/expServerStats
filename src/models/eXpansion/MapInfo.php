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


use OWeb\types\DatabaseModel;

class MapInfo extends  DatabaseModel{

    protected $id = 0;
    protected $uid = '';
    protected $name = '';
    protected $nameStripped = '';
    protected $file = '';
    protected $author = '';
    protected $environment = '';
    protected $mood = '';
    protected $bronzeTime = 0;
    protected $silverTime = 0;
    protected $goldTime = 0;
    protected $authorTime = 0;
    protected $copperPrice = 0;
    protected $lapRace = 0;
    protected $nbLaps = 0;
    protected $nbCheckpoints = 0;
    protected $addedby = '';
    protected $addtime = 0;



    /**
     * @var Records
     */
    private $recordsManager;

    function __construct($data, Records $recordsManager)
    {
        parent::__construct($data, 'challenge_');
        $this->recordsManager = $recordsManager;
    }

    public function getRecords(){
        return $this->recordsManager->getChallangeRecords($this->uid);
    }

    /**
     * @param mixed $addedby
     */
    public function setAddedby($addedby)
    {
        $this->addedby = $addedby;
    }

    /**
     * @return mixed
     */
    public function getAddedby()
    {
        return $this->addedby;
    }

    /**
     * @param mixed $addtime
     */
    public function setAddtime($addtime)
    {
        $this->addtime = $addtime;
    }

    /**
     * @return mixed
     */
    public function getAddtime()
    {
        return $this->addtime;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $authorTime
     */
    public function setAuthorTime($authorTime)
    {
        $this->authorTime = $authorTime;
    }

    /**
     * @return mixed
     */
    public function getAuthorTime()
    {
        return $this->authorTime;
    }

    /**
     * @param mixed $bronzeTime
     */
    public function setBronzeTime($bronzeTime)
    {
        $this->bronzeTime = $bronzeTime;
    }

    /**
     * @return mixed
     */
    public function getBronzeTime()
    {
        return $this->bronzeTime;
    }

    /**
     * @param mixed $copperPrice
     */
    public function setCopperPrice($copperPrice)
    {
        $this->copperPrice = $copperPrice;
    }

    /**
     * @return mixed
     */
    public function getCopperPrice()
    {
        return $this->copperPrice;
    }

    /**
     * @param mixed $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }

    /**
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $goldTime
     */
    public function setGoldTime($goldTime)
    {
        $this->goldTime = $goldTime;
    }

    /**
     * @return mixed
     */
    public function getGoldTime()
    {
        return $this->goldTime;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $lapRace
     */
    public function setLapRace($lapRace)
    {
        $this->lapRace = $lapRace;
    }

    /**
     * @return mixed
     */
    public function getLapRace()
    {
        return $this->lapRace;
    }

    /**
     * @param mixed $mood
     */
    public function setMood($mood)
    {
        $this->mood = $mood;
    }

    /**
     * @return mixed
     */
    public function getMood()
    {
        return $this->mood;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $nameStripped
     */
    public function setNameStripped($nameStripped)
    {
        $this->nameStripped = $nameStripped;
    }

    /**
     * @return mixed
     */
    public function getNameStripped()
    {
        return $this->nameStripped;
    }

    /**
     * @param mixed $nbCheckpoints
     */
    public function setNbCheckpoints($nbCheckpoints)
    {
        $this->nbCheckpoints = $nbCheckpoints;
    }

    /**
     * @return mixed
     */
    public function getNbCheckpoints()
    {
        return $this->nbCheckpoints;
    }

    /**
     * @param mixed $nbLaps
     */
    public function setNbLaps($nbLaps)
    {
        $this->nbLaps = $nbLaps;
    }

    /**
     * @return mixed
     */
    public function getNbLaps()
    {
        return $this->nbLaps;
    }

    /**
     * @param \Model\eXpansion\Records $recordsManager
     */
    public function setRecordsManager($recordsManager)
    {
        $this->recordsManager = $recordsManager;
    }

    /**
     * @return \Model\eXpansion\Records
     */
    public function getRecordsManager()
    {
        return $this->recordsManager;
    }

    /**
     * @param mixed $silverTime
     */
    public function setSilverTime($silverTime)
    {
        $this->silverTime = $silverTime;
    }

    /**
     * @return mixed
     */
    public function getSilverTime()
    {
        return $this->silverTime;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }



} 