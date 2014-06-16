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

/**
 * @var \OWeb\manage\Headers $headers
 */
$headers = \OWeb\manage\Headers::getInstance();
$headers->addJs('highcharts/highcharts.js');

$headers->addJs('highcharts/highcharts-more.js');
?>
<div class="uk-width-1-1">
    <h2><?php echo $this->l('Server Overview') ?> </h2>

    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match>
        <?php
        \OWeb\manage\SubViews::getInstance()->getSubView('Controller\Widgets\Server\ServerInfo')
            ->addParams('id', $this->id)
            ->display();
        ?>
    </div>


    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match>
	<?php $this->loadWithAjax('Widgets\Server\Players&id=' . $this->id . '&type=' . \Controller\Widgets\Server\Players::type_player, $this->timeout, 'uk-width-1-2'); ?>
	<?php $this->loadWithAjax('Widgets\Server\Players&id=' . $this->id . '&type=' . \Controller\Widgets\Server\Players::type_spec, $this->timeout, 'uk-width-1-2'); ?>
    </div>

    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match>
	<?php $this->loadWithAjax('Widgets\Server\Maps&id=' . $this->id, $this->timeout, 'uk-width-1-1'); ?>
    </div>
</div>
