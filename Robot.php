<?php
/**
 * Created by PhpStorm.
 * User: Bozo
 * Date: 20/05/2018
 * Time: 3:56 PM
 */

class Robot
{
    private $x;
    private $y;
    private $direction;
    private $directionTranslator = array( 0=>"North", 2=>"South", 3=>"West", 1=>"East");
    public $isOnTable ;


    /**
     * Robot constructor.
     * @param $x
     * @param $y
     * @param $direction
     */
    public function __construct($x, $y, $direction)
    {
        $this->x = $x;
        $this->y = $y;
        $this->direction = $this->setDirectionFromWordToNumber($direction);
        $this->isOnTable = false;
    }


    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    public function move()
    {
        if($this->direction==0) /*north*/
            $this->y--;
        if($this->direction==2)  /*South*/
            $this->y++;
        if($this->direction==3)  /*West*/
            $this->x--;
        if($this->direction==1)  /*East*/
            $this->x++;
    }

    public function isValidDirection($direction)
    {
        if(isset($this->$directionTranslator[$direction]))
            return true;
        return false;
    }


    /**
     * @return array|bool
     * returns a tuple of next positions, false otherwise
     */
    public function getNextPos()
    {
        if($this->direction==0)
            return array($this->x, $this->y-1);
        if($this->direction==2)
            return array($this->x, $this->y+1);
        if($this->direction==3)
            return array($this->x-1, $this->y);
        if($this->direction==1)
            return array($this->x+1, $this->y);

        return false;
    }

    public function turn($direction)
    {
        echo "\n\n==========NEW DIRECTION=====================\n\n";

        if($this->isOnTable==false)
            return false;

        $direction = strtolower($direction);
        $directCount = count($this->directionTranslator);

        if(strtolower($direction)=='left')
            $this->direction= (($this->direction-1)+$directCount)%$directCount;
        if(strtolower($direction)=='right')
            $this->direction = (($this->direction+1)+$directCount)%$directCount;

        return true;
    }

    /*given direction in word convert to number e.g north=>0*/
    private function setDirectionFromWordToNumber($word)
    {
        $word = strtolower($word);
        $number = -1;
        if($word=='north')
            $number = 0;
        if($word=='south')
                $number = 2;
        if($word=='east')
            $number = 1;
        if($word=='west')
            $number = 3;

        if($number==-1)
            exit('invalid direction '.$number);
        return $number;
    }

    /**
     * @return mixed
     */
    public function getDirection()
    {
        return $this->direction;
    }

    public function getReport()
    {
        echo "reportinging\n";
        $directionName = $this->directionTranslator[$this->direction];
        echo "\nOutput:  $this->x, $this->y, $directionName \n";
    }


}