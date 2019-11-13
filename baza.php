<?php
class Baza{
    private $conn;
    function __construct(){
        $this->conn = new mysqli('localhost', 'root', '', 'lz_php_projekat');
        // provera
        if ($this->conn->connect_error)
            die ('JOK connect: '. $this->conn->connect_error);
        $this->conn->set_charset("utf8");
    }

    function slike_galerije()  //kod tebe se zove make_query u galerija.php
    {
    $query = "SELECT * FROM galerija ORDER BY ID ASC";
    $result = $this->conn->query($query);
    return $result;
    }
    ... i tako za sve funkcije koje pozivaju bilo koje podatke iz baze
}
$db = new Baza();   //kljucno. $db je objekat koji je globalni i pozivas iz bilo kog fajla koji ukljucuje baza.php
?>
