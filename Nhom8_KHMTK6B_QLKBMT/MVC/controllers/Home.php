<?php
    class Home extends controller{
        function displayIntroduction(){
            echo "Hello";
        }
        function displayUser(){
            echo "Welcome nguyen quoc bao";
        }
        function displayIndex(){
            $this->view("master", [
                "Page"=> "home"
            ]);
        }
    }
?>