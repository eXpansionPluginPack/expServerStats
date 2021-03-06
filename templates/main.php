<?php
/**
 * @author       Oliver de Cramer (oliverde8 at gmail.com)
 * @author	 Petri Järvisalo  (petri.jarvisalo at gmail.com)
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
$this->InitLanguageFile();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title><?php $this->l('eXpansion Statistics') ?></title>

        <!-- Hight priority load manually -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<?php
	$this->addHeader('main.css', \OWeb\manage\Headers::css);
	$this->addHeader('uikit.min.css', \OWeb\manage\Headers::css);
	$this->addHeader('uikit.gradient.min.css', \OWeb\manage\Headers::css);

	$this->addHeader('uikit.js', \OWeb\manage\Headers::js);
	$this->addHeader('styleParser.js', \OWeb\manage\Headers::javascript);
	$this->addHeader('mainScript.js', \OWeb\manage\Headers::javascript);

	$this->headers();
	?>

    </head>

    <body>
        <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
	    <!-- menu -->
	    <?php
	    \OWeb\manage\SubViews::getInstance()->getSubView('\Controller\Widgets\Menu\Menu')->display();
	    ?>

	    <!-- main -->
	    <div class="uk-grid uk-margin-large-bottom" id="fullJsHolder" data-uk-grid-margin>

		<?php
		$this->display();
		?>



	    </div>

            <!-- Footer -->
            <div class="uk-container uk-container-center uk-margin-top  footer small" data-uk-grid-margin>
                <div class="uk-grid" data-uk-grid-margin data-uk-grid-match>
                    <div class="uk-width-1-5 uk-margin-top">
                        <p>reaby & oliverde8</p>
                    </div>
                    <div  class="uk-width-3-5 uk-margin-small-top">
                        <img class="uk-align-center" style="height: 35px" src="http://files.oliver-decramer.com/data/maniaplanet/images/eXpansion/exp_small.png"/>
                    </div>
                    <div class="uk-width-1-5 uk-margin-top uk-text-right">
                        <p>Powered by OWeb <?= OWEB_VERSION ?></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>