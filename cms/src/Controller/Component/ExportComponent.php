<?php

namespace App\Controller\Component;
use App\Controller\AppController;
use Cake\Controller\Component;
class ExportComponent extends Component {
    public $controller;
    // Starts up ExportComponent for use in the controller
    function exportCsv($data, $fileName = '', $maxExecutionSeconds = null, $delimiter = ',', $enclosure = '"') {
        // Flatten each row of the data array
        $flatData = array();
        foreach($data as $numericKey => $row){
            $row=$row->toArray();
            $flatRow = array();
            $this->flattenArray($row, $flatRow);
            $flatData[$numericKey] = $flatRow;
        }

        $headerRow = array();
        foreach($flatData as $key => $value){
            foreach($value as $fieldName => $fieldValue){
                if(array_search($fieldName, $headerRow) === false){
                    $headerRow[] = $fieldName;
                }
            }
        }        

        $fieldValue = array();
        foreach($flatData as $intKey => $rowArray){
            foreach($headerRow as $headerKey => $columnName){
                if(!isset($rowArray[$columnName])){
                    $fieldValue[$intKey][$columnName] = '';
                } else {
                    $fieldValue[$intKey][$columnName] = $rowArray[$columnName];
                }
            }
        }
        if(!empty($maxExecutionSeconds)){
            ini_set('max_execution_time', $maxExecutionSeconds); //increase max_execution_time if data set is very large
        }
        if(empty($fileName)){
            $fileName = "export_".date("Y-m-d").".csv";
        }
        $csvFile = fopen('php://output', 'w');
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');

        fputcsv($csvFile,$headerRow, $delimiter, $enclosure);
        foreach ($fieldValue as $key => $value) {
            fputcsv($csvFile, $value, $delimiter, $enclosure);
        }
        die;
        fclose($csvFile);
    }

    public function flattenArray($array, &$flatArray, $parentKeys = ''){
        foreach($array as $key => $value){
            $chainedKey = ($parentKeys !== '')? $parentKeys.'.'.$key : $key;
            if(is_array($value)){
                $this->flattenArray($value, $flatArray, $chainedKey);
            } else {
                $flatArray[$chainedKey] = $value;
            }
        }
    }
}