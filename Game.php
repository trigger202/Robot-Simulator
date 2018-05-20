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
    private $gameInit;



    /**
     * Game constructor.
     * @param $board
     * @param $robot
     */
    public function __construct($board, $robot)
    {

        $this->board= $board;
        $this->robot = $robot;
        $this->game = false;
    }

    /**
     * @return mixed
     */
    public function getGameInit()
    {
        return $this->gameInit;
    }


    public function moveRobot()
    {

        $result = $this->robot->getNextPos();
        if($result==false)
        {
            echo "Error cannot move.\n";
            return false;
        }
        if(!is_array($result) || count($result)!=2)
        {
            echo "Error cannot move.\n";
            return false;
        }

        list($newX, $newY) = $result;
        if($this->board->isValidPos($newX,$newY))
        {
            /*watch the order here*/
            $this->board->updateBoard($this->robot->getX(), $this->robot->getY(),$newX,$newY);
            $this->robot->move();
        }
        return true;
    }

    public function getBoard()
    {
        $this->board->printBoard();
    }

    public function getRobotReport()
    {
        $this->robot->getReport();
    }

    /*change direction of the robot*/
    public function turnRobot($direct)
    {
        $this->robot->turn($direct);
    }


    public function commands($command)
    {

    }




}