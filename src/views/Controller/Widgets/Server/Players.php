<?php
/**
 * @var Model\Server\Data $data
 */
$data = $this->data;

if ($this->type == \Controller\Widgets\Server\Players::type_player)
    $type = $this->l('Players');
else
    $type = $this->l('Spectators');

?>

<h3>
    <?php echo $type; ?>
</h3>
<table class="uk-table uk-table-striped">
    <tr>
        <th>
            Login
        </th>
        <th>
            NickName
        </th>
    </tr>

    <?php if (!empty($data->players)) : ?>
        <?php foreach ($data->players as $player) : ?>
            <tr>
                <td>
                    <?php echo $player->login; ?>
                </td>
                <td>
                    <?php echo $this->parseColors($player->login); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">
                <?php echo $this->l('There is no '.$type.' on this server') ?>
            </td>
        </tr>
    <?php endif; ?>

</table>