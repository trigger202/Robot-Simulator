<?php
/**
 * Created by PhpStorm.
 * User: Bozo
 * Date: 20/05/2018
 * Time: 3:40 PM
 */

class Board
{

    private $rows;
    private $cols;
    private $board;

    /**
     * Board constructor.
     * @param $rows
     * @param $cols
     */
    public function __construct($rows, $cols)
    {
        $this->rows = $rows;
        $this->cols = $cols;
        $this->initBoard();
        $this->printBoard();
    }

    private function initBoard($defaultX = 0, $defaultY = 0)
    {
        for($rows= 0; $rows<$this->rows; $rows++)
        {
            for($cols= 0; $cols<$this->cols; $cols++)
            {
                if($rows==$defaultX && $cols==$defaultY)
                    $this->board[$rows][$cols] = ' R ';
                else
                    $this->board[$rows][$cols] = ' - ';
            }
        }
    }

    public function updateBoard($oldX, $oldY, $newX,$newY)
    {
        if($this->isValidPos($oldX,$oldY) && $this->isValidPos($newX,$newY))
        {
            /*tansposing*/
            $this->board[$oldY][$oldX] = " - ";
            $this->board[$newY][$newX] = " R ";
            $this->printBoard();
        }
        else
            echo "not valid";

        return false;
    }

    public function unsetOldPos($oldX, $oldY)
    {
        if($this->isValidPos($oldX,$oldY))
            $this->board[$oldX][$oldY] = " - ";
    }

    public function printBoard()
    {
        echo "\n=============BOARD ==================\n\n";
        for($yRow = 0; $yRow<$this->rows; $yRow++)
        {
            for($xCol= 0; $xCol<$this->cols; $xCol++)
            {
                echo "| ".$this->board[$yRow][$xCol];
            }
            echo "| \n";
        }
    }


    public function isValidPos($x, $y)
    {

        echo "\n$x = $x and y = $y n";
        if($x<0 || $x>=$this->rows )
        {
            echo "exceed the valid x positions $x, $y";
            return false;
        }
        if($y<0 || $y>=$this->cols)
        {
            echo "exceed the valid y positions";
            return false;
        }
        return true;
    }



}