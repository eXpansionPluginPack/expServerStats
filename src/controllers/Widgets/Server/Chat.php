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

class Chat extends BaseWidget
{

    public function onDisplay()
    {
	parent::onDisplay();
	$connection = $this->dedi_ext->getConnection($this->view->id);
	$this->view->chat = $this->processChat($connection->getChatLines());
    }

    private function processChat($array)
    {

	$out = array();
	$lastLine = "";
	foreach ($array as $line) {


	    $matches = array();
	    preg_match('/\$\<(.*)\$\>(.*)/', $line, $matches);

	    if (count($matches) == 3) {
		$nick = $matches[1];
		$text = $matches[2];

		$nick = str_replace('$<', "", $nick);
		$nick = str_replace('$>', "", $nick);

		$text = str_replace('$<', "", $text);
		$text = str_replace('$>', "", $text);
		if (substr($text, 0, 1) == "]") {
		    $text = substr($text, 1);
		}

		$text = trim($text);
		$rawText = trim($this->colorParser->stripStyles($text));

		if (substr($text, 0, 1) == "/") {
		    continue;
		}
		
		if (strcmp($rawText, $lastLine) === -1) {
		    $lastLine = $rawText;
		    $out[] = '$ff0' . $nick . '$z$ff0 ' . $text;
		} else {
		    $lastLine = $rawText;
		}
	    } else {
		$lastLine = $line;
		$out[] = '$fff' . $line;
	    }
	}

	return $out;
    }

}
