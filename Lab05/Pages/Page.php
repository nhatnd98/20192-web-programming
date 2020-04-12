<?php
    class Page {
        private $page;
        private $title;
        private $year;
        private $copyright;
        
        function __construct($title, $year, $copyright) {
            $this->title = $title;
            $this->year = $year;
            $this->copyright = $copyright;
        }
        
        private function addHeader() {
            $this->page .= "<head><meta charset=\"UTF-8\"><title>$this->title</title></head>";
        }
        
        public function addContent($content) {
            $this->addHeader();
            $this->page .= "<body>$content</body>";
            $this->addFooter();
        }
        
        private function addFooter() {
            $this->page .= "<footer><div>$this->copyright "."$this->year ICT Web Programming</div></footer>";
        }
        
        public function get() {
            return $this->page;
        }
    }
?>

