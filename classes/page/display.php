<?php
    namespace classes\page;
    use classes;
    class display extends page {
        public function get() {
            $tableName = $_GET['table'];
            $this->html .= classes\form::createFindAllForm($tableName);
            $this->html .= classes\htmlTags::horizontalRule();
            $this->html .= classes\form::createFindIdForm($tableName);
            $this->html .= classes\htmlTags::horizontalRule();
            $this->html .= classes\form::createDeleteForm($tableName);
            $this->html .= classes\htmlTags::horizontalRule();
            $this->html .= classes\form::createSaveForm($tableName);
            $this->html .= classes\htmlTags::horizontalRule();
            $this->html .= classes\htmlTags::turnPage('index.php', 'Back');
        }
        public function post() {
            $tableName = $_GET['table'];
            $method = $_GET['method'];
            $id = classes\pageFunctions::getID($method);
            $this->html .= classes\pageFunctions::runMethod($method,$tableName,$id);
            $this->html .= classes\htmlTags::changeRow(classes\pageFunctions::outputErrorMassage());
            $this->html .= classes\htmlTags::turnPage('index.php?page=display&table=' . $tableName,'Back');
        }
    }
?>