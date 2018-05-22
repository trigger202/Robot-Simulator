<?php
/**
 * Created by PhpStorm.
 * User: Bozo
 * Date: 22/05/2018
 * Time: 6:36 PM
 */

class Directions
{
    private $directionTranslator = array( 0=>"North", 2=>"South", 3=>"West", 1=>"East");
    private $direction;

    /**
     * Directions constructor.
     * @param $direction
     */
    public function __construct()
    {
        $this->direction =  null;
    }


    public function isValidDirection($direction)
    {
        if(array_search(ucfirst($direction), $this->directionTranslator)!==false)
            return true;
        return false;
    }


    /*given direction in word convert to number e.g north=>0*/
    public function setDirectionFromWordToNumber($word)
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
        {
            echo "\n--invalid direction '.$number --\n\n";
            return false;
        }
        $this->direction= $number;
    }

    /**
     * @return mixed
     */
    public function getDirection()
    {
        return $this->direction;
    }

    public function getTotalDirectionCount()
    {
        return count($this->directionTranslator);
    }

    public function getDirectionName($degrees)
    {
        return $this->directionTranslator[$degrees];
    }


}