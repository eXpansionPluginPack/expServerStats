<?php
/**
 * @var Model\Server\Data $data
 */
$data = $this->data;

if ($this->type == \Controller\Widgets\Server\Players::type_player) :
    $list = $data->players;
    $type = $this->l('Players');
else :
    $list = $data->spectators;
    $type = $this->l('Spectators');
endif;
?>

<h3>
    <?php if ($this->type == \Controller\Widgets\Server\Players::type_player) : ?>
        <i class="uk-icon-user"></i>
    <?php else : ?>
        <i class="uk-icon-eye"></i>
    <?php endif; ?>
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

    <?php if (!empty($list)) : ?>
        <?php foreach ($list as $player) : ?>
            <tr>
                <td>
                    <?php echo $player->login; ?>
                </td>
                <td>
                    <?php echo $this->parseColors($player->nickName); ?>
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