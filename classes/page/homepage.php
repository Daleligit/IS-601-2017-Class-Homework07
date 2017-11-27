<?php
    namespace classes\page;
    use classes;
    class homepage extends page {
        public function get()
        {
            $this->html .= classes\htmlTags::headingOne(classes\htmlTags::changeRow('Please select a table:'));
            $this->html .= classes\form::createTableSelectForm();
        }
        public function post() {
            $tableName = $_POST['Selection'];
            $this->html .= classes\pageFunctions::changePage('index.php?page=display&table=' . $tableName);
        }
    }
?>