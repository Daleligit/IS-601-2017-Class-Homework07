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
            foreach ($array as $key=>$value) {
                if ($key % 2 == 0) {
                    $res[$key/2] = $value;
                }
            }
            return $res;
        }
    }
?>