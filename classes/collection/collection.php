<?php
    namespace classes\collection;
    use classes;
    abstract class collection {
        static public function findAll() {
            global $sqlErr;
            $db = classes\dbConn::getConnection();
            if (!empty($db)) {
                $class = static::$modelName;
                $sql = 'SELECT * FROM ' . $class;
                try {
                    $statement = $db->prepare($sql);
                    $statement->execute();
                    //$statement->setFetchMode(\PDO::FETCH_CLASS, '\\todos');
                    $recordsSet = $statement->fetchAll();
                    $recordsSet = classes\arrayFunctions::arrayClean($recordsSet);
                    $recordsSet = classes\arrayFunctions::objToArray($recordsSet);
                    return $recordsSet;
                } catch (\PDOException $e){
                    $sqlErr .= classes\htmlTags::changeRow('SQL query error: ' . $e->getMessage());
                }
            }
        }
        static public function findOne ($id) {
            global $sqlErr;
            $db = classes\dbConn::getConnection();
            if (!empty($db)) {
                $class = static::$modelName;
                $sql = 'SELECT * FROM ' . $class . ' WHERE id = ' . $id;
                try {
                    $statement = $db->prepare($sql);
                    $statement->execute();
                    $recordsSet = $statement->fetchAll();
                    $recordsSet = classes\arrayFunctions::arrayClean($recordsSet);
                    if (!empty($recordsSet)) {
                        $recordsSet = classes\arrayFunctions::objToArray($recordsSet);
                    }
                    return $recordsSet;
                } catch (\PDOException $e){
                    $sqlErr .= classes\htmlTags::changeRow('SQL query error: ' . $e->getMessage());
                }
            }
        }
    }
?>