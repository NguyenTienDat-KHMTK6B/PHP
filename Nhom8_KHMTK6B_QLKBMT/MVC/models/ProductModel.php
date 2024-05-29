<?php 
class ProductModel extends dbProduct
{
    public function getRecords($tablename)
    {
        $qr = "SELECT * FROM $tablename";
        return mysqli_query($this->con, $qr);
    }
    
    // tim kiem nhieu ban ghi theo 1 truong
    public function getRecordsbyField($tblname, $field, $keyword)
    {
        $qr = "SELECT * FROM $tblname where $field = '$keyword'";
        return mysqli_query($this->con, $qr);
    }

    public function getRecordby2Field($tblname, $field1, $field2, $keyword1, $keyword2) {
        $sql = "SELECT * FROM $tblname where $field1='$keyword1' AND $field2='$keyword2'";
        return mysqli_query($this->con, $sql);
    }


    public function insertProduct($id, $pname, $company, $year, $band, $pimage)
    {
        $result = false;
        $sql = "insert into tlbproduct(pid, pname, company, year, band, pimage) values('$id','$pname','$company','$year','$band','$pimage')";
        if(mysqli_query($this->con, $sql)){
            $result = true;
        }
        return json_decode($result);
    }
}
?>
