<?php
/**
 * Created by PhpStorm.
 * User: Bozo
 * Date: 20/05/2018
 * Time: 7:48 PM
 */


require_once('Game.php');

$game = new Game();

$commands = ["PLACE 2,4,north",'move', 'left', 'right', 'move','right', 'move'];



foreach ($commands as $command)
{
    $game->evalCommand($command);
}


