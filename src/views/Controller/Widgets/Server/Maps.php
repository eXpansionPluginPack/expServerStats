<?php

/**
 * @var Model\Server\Data $data
 */
$data = $this->data;

?>
<h3><?php echo $this->l('Maps') ?> </h3>
<table class="uk-table uk-table-striped">
    <tr>
        <th>
            Name
        </th>
        <th>
            <i class="uk-icon-user"></i>
            Author
        </th>
        <th>
            <i class="uk-icon-cubes"></i>
            Environnement
        </th>
        <th>
            <i class="uk-icon-trophy"></i>
            Author Time
        </th>
        <th>
            <i class="uk-icon-star"></i>
            Best Time
        </th>
    </tr>

    <?php if (!empty($data->maps)) : ?>

        <?php foreach ($data->maps as $map) : ?>

            <tr>
                <td>
                    <?php echo $this->parseColors($map->name); ?>
                </td>
                <td>
                    <?php echo $this->parseColors($map->author); ?>
                </td>
                <td>
                    <?php echo $map->environnement; ?>
                </td>
                <td>
                    <?php echo $map->authorTime; ?>
                </td>
                <td>
                    <?php echo $this->l('TODO') ?>
                </td>
            </tr>

        <?php endforeach; ?>

    <?php endif ?>

</table>