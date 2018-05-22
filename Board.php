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
    }

    public function initBoard()
    {
        for($rows= 0; $rows<$this->rows; $rows++)
        {
            for($cols= 0; $cols<$this->cols; $cols++)
            {
                $this->board[$rows][$cols] = ' - ';
            }
        }
    }


    public function updateCell($x, $y, $val)
    {
        if($this->isValidPos($x,$y))
        {
            /*transpose*/
            $this->board[$y][$x] = " $val ";
            return true;
        }

        return false;
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

        echo "\nFacing: 0 = North | 2 = South | 3 West|  1 East\n";
    }



    public function isValidPos($x, $y)
    {

        if($x<0 || $x>=$this->rows )
        {
            echo "\n Invalid X coordinate X = $x \n";
            return false;
        }
        if($y<0 || $y>=$this->cols)
        {
            echo "\n Invalid Y coordinate Y = $y \n";
            return false;
        }
        return true;
    }



}