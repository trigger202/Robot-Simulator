<?php
/**
 * Created by PhpStorm.
 * User: Bozo
 * Date: 20/05/2018
 * Time: 3:48 PM
 */
require_once('Board.php');
require_once('Robot.php');
require_once('Game.php');
$commandList =['place', 'left', 'right', 'report'];
$keepGoing = true;
while($keepGoing)
{
    
    foreach ($commandList as $command)
    {
        if($command=='place')
        {

        }
        if('left')
        {

        }
        if($command=='right')
        {

        }
    }

}

$placeRobot = "PLACE, 0,0, North";

$robot = new Robot(0,0, 'East');
$board = new  Board(5,5);


$gameInit = false;

$game = new Game($board,$robot);



$game->moveRobot(); // 1
$game->moveRobot(); /*2*/
$game->moveRobot(); /*3*/
////
$game->moveRobot(); /*4*/
$game->moveRobot(); /* 5 ---should be ignored*/
$game->getRobotReport();


//$game->moveRobot();

//$game->getBoard();
return;
