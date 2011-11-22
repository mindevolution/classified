<?php
class MicroblogWidget extends CWidget {
 
    public $crumbs = array();
    public $delimiter = ' / ';
 
    public function run() {
        $this->render('microblogForm');
    }
 
}