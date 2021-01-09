<?php

/**
 * CSV to array
 * @return void
 */
function readCSV($file)
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
