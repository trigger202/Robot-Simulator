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
    private $allDirections = array("North", "South", "West", "East");
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
        if(strtolower($this->direction)=='north')
            $this->y--;
        if(strtolower($this->direction)=='south')
            $this->y++;
        if(strtolower($this->direction)=='west')
            $this->x--;
        if(strtolower($this->direction)=='east')
            $this->x++;
    }

    public function getNextPos()
    {
        if($this->direction==null)
            exit( "Direction not set");

        if(strtolower($this->direction)=='north')
            return array($this->x, $this->y-1);
        if(strtolower($this->direction)=='south')
            return array($this->x, $this->y+1);
        if(strtolower($this->direction)=='west')
            return array($this->x-1, $this->y);
        if(strtolower($this->direction)=='east')
            return array($this->x+1, $this->y);

        return false;
    }


    public function turn($direction)
    {

        $this->setDirection($direction);
        /*ignore*/
    }


    /**
     * @return mixed
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param mixed $direction
     */
    public function setDirection($direction)
    {
        $direction = ucfirst($direction);
        echo "new direction $direction" ;
        if(in_array($direction,$this->allDirections))
            $this->direction= $direction;
        /*ignore*/
    }





    public function getReport()
    {
        echo "\nOutput:  $this->x, $this->y, $this->direction \n";
    }


}