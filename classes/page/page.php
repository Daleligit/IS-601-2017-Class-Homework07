<?php
    namespace classes\page;
    use classes;
    abstract class page {
        protected $html;
        public function __construct() {
            $this->html .= classes\htmlTags::htmlHead();
            $this->html .= classes\htmlTags::pageStyles();
            $this->html .= classes\htmlTags::htmlBody();
        }
        public function __destruct() {
            $this->html .= classes\htmlTags::bodyEnd();
            $this->html .= classes\htmlTags::htmlEnd();
            classes\stringFunctions::printThis($this->html);
        }
    }
?>