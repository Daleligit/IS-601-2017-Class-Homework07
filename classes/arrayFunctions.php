<?php
    namespace classes;
    class arrayFunctions {
        public static function countNumber ($array, $mode) {
            return count($array, $mode);
        }
        public static function objToArray ($obj) {
            foreach ($obj as $key => $objects) {
                $obj[$key] = (array) $objects;
            }
            return $obj;
        }
        public static function arrayPop ($array) {
            array_pop($array);
            return $array;
        }
        public static function arrayKeys ($array) {
            return array_keys($array);
        }
        public static function arrayClean ($array) {
            If (!empty($array)) {
                foreach ($array as $key=>$value) {
                    $temp = 0;
                    foreach ($value as $column => $data){
                        if ($temp % 2 == 0) {
                            $res[$key][$column] = $data;
                        }
                        $temp = $temp + 1;
                    }
                }
            } else {
                $res = '';
            }
            return $res;
        }
    }
?>