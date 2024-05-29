<?php
class DBProduct{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "Product";
    public $conn;

    function ConnectDB()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function ShowProduct(){
        // SQL to create table
        $sql = "CREATE TABLE IF NOT EXISTS ProductTable (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            firstname VARCHAR(30) NOT NULL, 
            lastname VARCHAR(30) NOT NULL, 
            email VARCHAR(50) NOT NULL, 
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($this->conn->query($sql) === TRUE) {
            echo "Table ProductTable created successfully<br>";
        } else {
            echo "Error creating table: " . $this->conn->error . "<br>";
        }

        // SQL to insert data
        $sql_insert = "INSERT INTO ProductTable (firstname, lastname, email) VALUES
        ('John', 'Doe', 'john@example.com'),
        ('Mary', 'Moe', 'mary@example.com'),
        ('Julie', 'Dooley', 'julie@example.com')";

        if ($this->conn->query($sql_insert) === TRUE) {
            echo "New records created successfully<br>";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $this->conn->error;
        }

        // SQL to select data
        $sql_select = "SELECT id, firstname, lastname FROM ProductTable";
        $result = $this->conn->query($sql_select);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        $this->conn->close();
    }
}
?>
