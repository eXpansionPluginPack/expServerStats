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
$this->InitLanguageFile();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php $this->l('eXpansion Statistics') ?></title>


    <script>

    </script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

    <?php

    $this->addHeader('css.css', \OWeb\manage\Headers::css);
    $this->addHeader('js.js', \OWeb\manage\Headers::javascript);

    ?>

</head>

<body>


<!-- Le Header -->
<div id="header">


</div>

<?php
$link_fr = $this->CurrentUrl()->addParam('lang', 'fr');
$link_eng = $this->CurrentUrl()->addParam('lang', 'eng');

$img_fr = OWEB_HTML_URL_IMG . '/flags/fr.png';
$img_eng = OWEB_HTML_URL_IMG . '/flags/gb.png';
?>

<!-- Le Menu -->
<div id="menu">
    <div>
        <div class="lang">
            <div>
                <a href="<?php echo $link_fr . '"><img src="' . $img_fr; ?>" alt="fr"></a>
                <a href="<?php echo $link_eng . '"><img src="' . $img_eng; ?>" alt="eng"></a>
            </div>
        </div>
        <ul class="menu">

    </div>
</div>


<!-- Le Contenu -->
<div id="contenuFull">
    <div id="contenuFullJS">

        <?php
        $this->display();
        ?>

    </div>
</div>
<!-- Fin du Contenu -->

<div id="foot">
    <div>
        <p class="generated">Generaterd in <?php echo \OWeb\OWeb::getInstance()->get_stringRuntTime(); ?> Seconds</p>

        <p class="powered">
            Powered by OWeb <?= OWEB_VERSION ?>
        </p>
    </div>
</div>

</body>
</html>