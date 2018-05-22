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
    private $degrees;
    private  $direction;
    private $isOnTable ;


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
        $this->direction = $direction;
        $this->degrees   = $direction->getDirection();
        $this->isOnTable = false;
    }

    public function getDegree()
    {
        return $this->degrees;
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

    public function moveForward()
    {
        if($this->degrees==0) /*north*/
            $this->y--;
        if($this->degrees==2)  /*South*/
            $this->y++;
        if($this->degrees==3)  /*West*/
            $this->x--;
        if($this->degrees==1)  /*East*/
            $this->x++;
    }

    public function setIsOnTable($val)
    {
        $this->isOnTable = $val;
    }
    /**
     * @return bool
     */
    public function isOnTable()
    {
        return $this->isOnTable;
    }



    /**
     * @return array|bool
     * returns a tuple of next positions, false otherwise
     */
    public function getNextPos()
    {
        if($this->degrees==0)
            return array($this->x, $this->y-1);
        if($this->degrees==2)
            return array($this->x, $this->y+1);
        if($this->degrees==3)
            return array($this->x-1, $this->y);
        if($this->degrees==1)
            return array($this->x+1, $this->y);

        return false;
    }

    public function turn($direction)
    {
        if($this->isOnTable==false)
        {
            echo "not going far";
            return false;
        }

        $direction = strtolower($direction);
        $directCount = $this->direction->getTotalDirectionCount();

        if(strtolower($direction)=='left')
            $this->degrees = (($this->degrees-1)+$directCount)%$directCount;
        if(strtolower($direction)=='right')
            $this->degrees = (($this->degrees+1)+$directCount)%$directCount;
    }





    public function getReport()
    {
        echo "\nOutput:  $this->x, $this->y, ".$this->direction->getDirectionName($this->degrees)." \n";
    }


}