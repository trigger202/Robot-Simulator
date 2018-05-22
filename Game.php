<?php
/**
 * Created by PhpStorm.
 * User: Bozo
 * Date: 20/05/2018
 * Time: 4:01 PM
 */

require_once('Board.php');
require_once('Robot.php');

class Game
{

    private $board;
    private $robot;

    /**
     * Game constructor.
     * @param $board
     * @param $robot
     */
    public function __construct()
    {
        $this->board = new Board(5,5);
        $this->robot = null;
    }

    public function moveRobot()
    {

        $result = $this->robot->getNextPos();
        if($result==false)
        {
            echo "\n-- error cannot move --\n";
            return false;
        }

        list($newX, $newY) = $result;
        if($this->board->isValidPos($newX,$newY))
        {
            /*set this cell to null*/
            $this->board->updateCell($this->robot->getX(), $this->robot->getY(),'-');
            /* set this cell to the robot*/
            $this->board->updateCell($newX,$newY,$this->robot->getDegree());
            $this->robot->moveForward();
            $this->getBoard();
            return true;
        }
        return false;
    }


    public function evalCommand($commandArgs)
    {
        $commandArgs = strtolower($commandArgs);

        if(strpos($commandArgs,'place')!==false)
        {
            $this->placeRobot($commandArgs);
            return;
        }
        if(!$this->hasPlacedRobot())
        {
            echo "\nMake sure robot is placed first\n";
            return; /*ignore command. robot not on table*/
        }
        if(strpos($commandArgs,'left')!==false)
        {
            $this->turnRobot($commandArgs);
            return;
        }
        if(strpos($commandArgs,'right')!==false)
        {
            $this->turnRobot($commandArgs);
            return;
        }
        if(strpos($commandArgs,'move')!==false)
        {
            $this->moveRobot();
            return;
        }

        if(strpos($commandArgs,'report')!==false)
        {
            $this->getGameReport();
            return;
        }
        exit("\nincorrect command");
    }


    public function getBoard()
    {
        $this->board->printBoard();
    }

    public function getGameReport()
    {
        if(!$this->hasPlacedRobot())
        {
            echo "\nMake sure robot is placed first\n";
            return;
        }

        else
        {
            $this->robot->getReport();

        }
    }

    public function hasPlacedRobot()
    {
        if($this->robot!=null && $this->robot->isOnTable())
            return true;
        return false;
    }

    /*change direction of the robot*/
    public function turnRobot($direct)
    {
        $this->robot->turn($direct);
        $this->getGameReport();
    }

    public function placeRobot($commandArgs)
    {
         $argList= explode(',', $commandArgs);
         if(count($argList)<3)
         {
             return false;
         }
         /*check its place command*/
         if(strpos($argList[0],'place')!==false)
         {
             $xcord = substr($argList[0],-1,1);
             $ycord = $argList[1];
             $direction = $argList[2];
             $directionObject = new Directions();

             if(!$directionObject->isValidDirection($direction))
             {
                 echo "\n --- invalid direction start point ---\n\n";
                 return false;
             }
             $directionObject->setDirectionFromWordToNumber($direction);

             if(!is_numeric($xcord) || !is_numeric($ycord))
             {
                 echo "\n --- invalid starting positions ---\n\n";
                 return false;
             }

             if(!$this->board->isValidPos($xcord,$ycord))
             {
                 echo "\n --- invalid starting positions ---\n\n";
                 return false;
             }



            echo "+++++++++++++++++++Robot is successfully placed++++++++++++++++++\n\n";
            $this->robot= new Robot($xcord,$ycord,$directionObject);
             $this->board->initBoard(); /*reinitalize board*/
             $this->board->updateCell($xcord,$ycord,$directionObject->getDirection());
            $this->robot->setIsOnTable(true);
            $this->getBoard();

         }
         return false;

    }


}