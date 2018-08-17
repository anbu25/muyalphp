<?php
    class Pages extends Controller{

        public function __construct(){

        }

        public function index(){
            $data = [
                'title'=>'Muyal->Php'
            ];
           $this->view('pages/index', $data);
        }

        public function about($param = []){
            $data = [
                'title'=>'About Us'
            ];
            $this->view('pages/about', $data);
        }
    }