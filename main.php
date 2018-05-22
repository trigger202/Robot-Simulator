<?php
/**
 * Created by PhpStorm.
 * User: Bozo
 * Date: 20/05/2018
 * Time: 7:48 PM
 */


require_once('Game.php');
require_once("Directions.php");





$fh = fopen("commands.txt",'r') or die("Error! --- could not open file");

$game = new Game();
while(!feof($fh))
{
    $line = trim(fgets($fh));
    if($line=='')
        continue; /*empty line*/
    $game->evalCommand($line);
}

fclose($fh);
