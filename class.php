<?php

session_start();

class Connection
{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "ticket";
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
}

class Register extends Connection
{
    public function registration($f_name, $l_name, $email, $password)
    {
        $duplicate = mysqli_query($this->conn, "SELECT * FROM developpeur WHERE email = '$email' OR password='$password'");
        if (mysqli_num_rows($duplicate) > 0) {
            return 0;
        } else {
            $result = mysqli_query($this->conn, "INSERT INTO developpeur (First_name, Last_name, email, password) VALUES ('$f_name', '$l_name', '$email', '$password')");
            if ($result) {
                return 1;
            } else {
                return -1;
            }
        }
    }

}


class Conn extends Connection
{
    public function selectData($table, $columns = "*", $condition)
    {
        try {
            $query = "SELECT $columns FROM $table";

            if ($condition != null) {
                $query .= " WHERE $condition";
            }

            $result = $this->conn->query($query);

            if ($result) {
                $data = [];
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }

                return $data;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }



}
class Ticket extends Connection
{
    public function insertFormData($titre, $probleme, $status, $description, $developers, $priorite)
    {

        $conn = $this->conn;


        $developersString = implode(', ', $developers);


        $stmt = $conn->prepare("INSERT INTO tickets (titre, probleme, status, description, developpeur, priorite) VALUES (?, ?, ?, ?, ?, ?)");


        if (!$stmt) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }


        $stmt->bind_param("sssssi", $titre, $probleme, $status, $description, $developersString, $priorite);


        if ($stmt->execute()) {
            echo "Données insérées avec succès.";
        } else {
            echo "Erreur lors de l'insertion des données : " . $stmt->error;
        }


        $stmt->close();
        header("Location: index.php");
        exit;
    }
}


?>