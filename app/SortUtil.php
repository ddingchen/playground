<?php 

namespace App;

/**
* Sort Util
*/
class SortUtil
{
    public static function bubbleSort($numbers)
    {
        $parentLoopCount = count($numbers) - 1;
        for($i = 0; $i < $parentLoopCount; $i++) {

            $loopCount = $parentLoopCount - $i;
            for($m = 0; $m < $loopCount; $m ++) {

                if($numbers[$m] > $numbers[$m + 1]) {
                    $temp = $numbers[$m + 1];
                    $numbers[$m + 1] = $numbers[$m];
                    $numbers[$m] = $temp;
                }
            }
        }

        return $numbers;
    }
}
