<?php


$count = count($argv);
$la = [];
for ($i = 1; $i < $count; $i++) {
    array_push($la, $argv[$i]);
}

$lb = [];

function mysort($la)
{
    sort($la);
    return $la;
}
$mysort = mysort($la);

if ($mysort === $la) {
    echo PHP_EOL;
} else {


    function pa($array1, $array2)
    {
        $array = [];

        $lb = array_shift($array2);

        array_unshift($array1, $lb);

        array_push($array, $array1, $array2);

        return $array;
    }

    function pb($array1, $array2)
    {
        $array = [];

        $la = array_shift($array1);

        array_unshift($array2, $la);

        array_push($array, $array1, $array2);

        echo "pb ";

        return $array;
    }

    function rra($array)
    {
        $a = array_pop($array);
        array_unshift($array, $a);

        echo "rra ";

        return $array;
    }

    function result($array1, $array2)
    {
        $array = [];

        if (isset($array1) && !empty($array1)) {
            $min = min($array1);

            do {
                $array1 = rra($array1);
                if ($min === $array1[0]) {
                    $array = pb($array1, $array2);
                }
            } while ($min !== $array1[0]);
        }

        return $array;
    }

    $array = result($la, $lb);


    function again($array)
    {
        do {
            $array = result($array[0], $array[1]);
            if (empty($array[0])) {
                return $array;
            }
        } while (isset($array[0]));
    }

    $array = again($array);

    function fini($array)
    {
        do {
            $array = pa($array[0], $array[1]);
            if (empty($array[1])) {
                echo "pa";
            } else {

                echo "pa ";
            }
        } while (!empty($array[1]));

        return $array[0];
    }

    $array = fini($array);
    echo PHP_EOL;
    // print_r($array);
}
