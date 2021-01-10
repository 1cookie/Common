<?php

/**
 * CSV to array
 * @return array
 */
function csvToArray($file)
{
    $row = 0;
    $records = [];
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            for ($c=0; $c < $num; $c++) {
                if($row === 1) continue;
                $records[$row][] = $data[$c];
            }
        }
        fclose($handle);
        
        return $records;
    }
}

// https://stackoverflow.com/questions/28372241/find-min-max-in-a-two-dimensional-array
