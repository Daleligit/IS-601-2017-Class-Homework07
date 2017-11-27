<?php
    namespace classes;
    use classes\page;
    class main {
        public function __construct() {
            $pageRequest = pageFunctions::getRequestPage();
            $pageRequest = 'classes\\page\\' . $pageRequest;
            $page = new $pageRequest;
            pageFunctions::runPageFunction($page);
        }
    }
?>