<?php
/**
 * Created by PhpStorm.
 * User: Bozo
 * Date: 20/05/2018
 * Time: 4:01 PM
 */



class Game
{


    private $board;
    private $robot;


    /**
     * Game constructor.
     * @param $board
     * @param $robot
     */
    public function __construct($board, $robot)
    {

        $this->board= $board;
        $this->robot = $robot;
    }

    public function moveRobot()
    {

        $result = $this->robot->getNextPos();
        if($result==false)
        {
            echo "error cannot move";
            return;
        }
        list($newX, $newY) = $result;
        if($this->board->isValidPos($newX,$newY))
        {
            /*watch the order here*/
            $this->board->updateBoard($this->robot->getX(), $this->robot->getY(),$newX,$newY);
            $this->robot->move();
        }
        else
        {
            echo "not valid in game";
        }
    }

    public function setRobotInBoard($x,$y)
    {
        $this->board->setRobot($x,$y);
    }


    public function getBoard()
    {
        $this->board->printBoard();
    }

    public function getRobotReport()
    {
        $this->robot->getReport();
    }

    public function turnRobot($direct)
    {
        $this->robot->turn($direct);
    }





}