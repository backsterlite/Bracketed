<?php


namespace Backsterlite\Bracketed;
use Exception;

class Inspector
{

    public function inspect($text)
    {
        $pattern = "/^[\s (\s)\s]*$/";
        if(!preg_match($pattern,$text,$matches))
        {
            throw new InvalidArgumentException('Invalid Argument');
        }else
        {
            return $this->isValide($matches[0]);
        }


    }
    private function isValide($string)
    {
        $counter = 0;
        foreach(str_split($string) as $result)
        {
            if($result === "(")
            {
                ++$counter;
            }elseif($result === ")")
            {
                --$counter;
            }
        }
        if($counter < 0)
        {
            return false;
        }
        return true;

    }

}