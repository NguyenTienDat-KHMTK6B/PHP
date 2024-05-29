<?php
    class ProductController extends Controller
    {
        public $productModel;

        public function __construct()
        {
            $this->productModel = $this->model("ProductModel");
        }

        function displayIntroduction() 
        {
            $this->view("master", ["Page" => "home"]);
        }

        function getProductsbyBand() 
        {
            $this -> view("master", [
                "Page" => "getProductsbyBand"
            ]);
        }

        public function displayProductByBand(){
            if(isset($_POST["btSearch"])){
                $band = $_POST["selectBand"];
                $tblname = 'tlbproduct';
                $field = 'band';
                $products = $this->productModel->getRecordsbyField($tblname,$field,$band);
                $this->view("master",["Page"=>"getProductsbyBand","Products"=>$products]);
            }
        }

        function getProductsbyYear() 
        {
            $this -> view("master", [
                "Page" => "getProductsbyYear"
            ]);
        }

        public function displayProductByYear(){
            if(isset($_POST["btSearch"])){
                $band = $_POST["selectYear"];
                $tblname = 'tlbproduct';
                $field = 'year';
                $products = $this->productModel->getRecordsbyField($tblname,$field,$band);
                $this->view("master",["Page"=>"getProductsbyYear","Products"=>$products]);
            }
        }

        function getProductsbyYearandCompany() 
        {
            $this -> view("master", [
                "Page" => "getProductsbyYearandCompany"
            ]);
        }

        function displayProductByYearandCompany() 
        {
            if (isset($_POST["btSearch"])) {
                if (isset($_POST["checkCompany"]) && isset($_POST["checkYear"])) {
                    $year = $_POST["selectYear"];
                    $company = $_POST["selectCompany"];
                    $tblname = 'tlbproduct';
                    $field1 = "year";
                    $field2 = "company";
                    $products = $this->productModel->getRecordby2Field($tblname, $field1, $field2, $year, $company);
                } else if(isset($_POST["checkYear"])) {
                    $year = $_POST["selectYear"];
                    $tblname = 'tlbproduct';
                    $field1 = "year";
                    $products = $this->productModel->getRecordbyField($tblname, $field1, $year);
                } else if (isset($_POST["checkCompany"])){
                    $company = $_POST["selectCompany"];
                    $tblname = 'tlbproduct';
                    $field2 = "company";
                    $products = $this->productModel->getRecordbyField($tblname, $field2, $company);
                } else {
                    echo "Nhập 1 trong 2.";
                }
                $this->view(
                    "master",
                    [
                        "Page" => "getProductsbyYearandCompany",
                        "Products" => $products
                    ]
                );
            }
        }

        function getOrderCustomer() 
        {
            $this -> view("master", [
                "Page" => "getOrderCustomer"
            ]);
        }

        function displayOrderCustomer() 
        {
            if (isset($_POST["btSearch"])) {
                $cid = $_POST["inpCID"];
                $oid = $_POST["inpOID"];
                $tblname = 'viewordercustomer';
                $field1 = "cid";
                $field2 = "oid";
                $products = $this->productModel->getRecordby2Field($tblname, $field1, $field2, $cid, $oid);
                $this->view(
                    "master",
                    [
                        "Page" => "getOrderCustomer",
                        "Products" => $products
                    ]
                );
            }
        }
        
        function impInsertProduct() 
        {
            $this -> view("master", [
                "Page" => "insertProduct"
            ]);
        }

        public function insertProduct(){
            if(isset($_POST["btInsert"])){  
                $id = $_POST["id"];
                $pname = $_POST['pname'];
                $company = $_POST['company'];
                $year = $_POST["year"];
                $band = $_POST['band'];
                if(isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK){
                    // lay anh
                    $pimage = 'data:image/png;base64,' . base64_encode(file_get_contents($_FILES['imageFile']['tmp_name']));

                }                             
            }
            $result = $this->productModel-> insertProduct($id, $pname, $company, $year, $band, $pimage);
            $this->view("master",["Page"=>"insertProduct","result"=> $result]);
        }
    }
?>