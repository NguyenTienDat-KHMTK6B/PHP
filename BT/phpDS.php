<?php
    class Product {
        public $Id;
        public $Name;
        public $Councut;
        public $ComPary;
        public $Year;

        function set_id($Id){
            $this->Id = $Id;
        }

        function get_id(){
            return $this->Id;
        }

        function set_name($Name){
            $this->Name = $Name;
        }

        function get_name(){
            return $this->Name;
        }

        function set_coucut($Councut){
            $this->Councut = $Councut;
        }

        function get_councut(){
            return $this->Councut;
        }

        function set_compary($ComPary){
            $this->ComPary = $ComPary;
        }

        function get_compary(){
            return $this->ComPary;
        }

        function set_year($Year){
            $this->Year = $Year;
        }

        function get_year(){
            return $this->Year;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ID = $_POST['id'];
        $Name = $_POST['name'];
        $Councut = $_POST['conput'];
        $ComPary = $_POST['compary'];
        $Year = $_POST['year'];

        $product = new Product();
        $product->set_id($ID);
        $product->set_name($Name);
        $product->set_coucut($Councut);
        $product->set_compary($ComPary);
        $product->set_year($Year);

        echo "<h2>Danh Sách</h2>";
        echo "ID: " . $product->get_id() . "<br>";
        echo "Name: " . $product->get_name() . "<br>";
        echo "Councut: " . $product->get_councut() . "<br>";
        echo "Company: " . $product->get_compary() . "<br>";
        echo "Year: " . $product->get_year() . "<br>";
    }
?>