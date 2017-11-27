<?php
    namespace classes\model;
    final class accounts extends model {
        public $id;
        public $email;
        public $fname;
        public $lname;
        public $phone;
        public $birthday;
        public $gender;
        public $password;
        protected static $modelName = 'accounts';
        public function __construct()
        {
            $this->tableName = 'accounts';
        }
    }
?>