<?php

function sortingByAdresses(array $mass): string
{
    $result = '';
    $sortedMass = [];
    foreach ($mass as $addresses){
        if (!isset($addresses["date_to"])){
            $result = "<br>" . $addresses["date_from"] . "/" . date("d-m-Y") . ": " . $addresses['address'] . ";</br>";
            continue;
        }
        if (isset($sortedMass[$addresses["address"]])){
            if ($sortedMass[$addresses["address"]]['date_from'] > $addresses["date_from"]){
                $sortedMass[$addresses["address"]]['date_from'] = $addresses["date_from"];
            }
            if ($sortedMass[$addresses["address"]]['date_to'] < $addresses["date_to"]){
                $sortedMass[$addresses["address"]]['date_to'] = $addresses["date_to"];
            }
            continue;
        }
        $sortedMass[$addresses["address"]] = ["date_from" => $addresses["date_from"], 
        "date_to" => $addresses["date_to"]];
    }
    foreach ($sortedMass as $key => $value){
        $result .= "<br>" . $value["date_from"] . "/" . $value["date_to"] . ": " . $key . ";</br>";
    }
    return $result;
}
$array = [
['address' =>'г. Минск, ул. Восточнаяя, д. 33', 'date_from' => '31-
12-2002', 'date_to' => '31-12-2005'],
['address' =>'г. Минск, ул. Восточнаяя, д. 34', 'date_from' => '31-
12-2005', 'date_to' => '31-12-2006'],
['address' =>'г. Минск, ул. Восточнаяя, д. 34', 'date_from' => '31-
12-2006', 'date_to' => '31-12-2008'],
['address' =>'г. Минск, ул. Тихая, д. 33', 'date_from' => '31-12-
2000', 'date_to' => '31-12-2002'],
['address' =>'г. Минск, ул. Ленина, д. 33', 'date_from' => '31-12-
2008', 'date_to' => '31-12-2010'],
['address' =>'г. Минск, ул. Ленина, д. 33', 'date_from' => '31-12-
2010', 'date_to' => '31-12-2011'],
['address' =>'г. Минск, ул. Тихая, д. 33', 'date_from' => '31-12-
2012'],
['address' =>'г. Минск, ул. Ленина, д. 33', 'date_from' => '31-12-
2011', 'date_to' => '31-12-2012'],
];
var_dump(sortingByAdresses($array));