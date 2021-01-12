<?php


class Employee
{

    private $conn;
    private $table = 'employee';

    public $empid;
    public $firstname;
    public $lastname;
    public $mobileno;
    public $dob;
    public $gender;
    public $city;
    public $hobby;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read_emp()
    {
        $query = "SELECT * from $this->table";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function read_single_emp()
    {
        $query = "SELECT * FROM $this->table WHERE empid = ? LIMIT 1";

        //parepare the statement
        $stmt = $this->conn->prepare($query);

        //binding parameter
        $stmt->bindParam(1, $this->empid);

        //execute the query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->mobileno = $row['mobileno'];
        $this->dob = $row['dob'];
        $this->gender = $row['gender'];
        $this->city = $row['city'];
        $this->hobby = $row['hobby'];
    }

    public function create_emp()
    {
        $query = "INSERT INTO $this->table SET firstname = :firstname, lastname = :lastname, mobileno = :mobileno,
        dob = :dob , gender = :gender, city = :city, hobby = :hobby";

        //parepare the statement
        $stmt = $this->conn->prepare($query);

        //clean data
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->mobileno = htmlspecialchars(strip_tags($this->mobileno));
        $this->dob = htmlspecialchars(strip_tags($this->dob));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->hobby = htmlspecialchars(strip_tags($this->hobby));

        //binding parameter
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':mobileno', $this->mobileno);
        $stmt->bindParam(':dob', $this->dob);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':city', $this->city);
        $stmt->bindParam(':hobby', $this->hobby);

        //execute the query
        if ($stmt->execute()) {
            return true;
        }

        //print error if something went wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }

    //update post function
    public function update_emp()
    {
        $query = "UPDATE $this->table SET firstname = :firstname, lastname = :lastname, mobileno = :mobileno,
        dob = :dob , gender = :gender, city = :city, hobby = :hobby WHERE empid = :empid";

        //parepare the statement
        $stmt = $this->conn->prepare($query);

        //clean data
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->mobileno = htmlspecialchars(strip_tags($this->mobileno));
        $this->dob = htmlspecialchars(strip_tags($this->dob));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->hobby = htmlspecialchars(strip_tags($this->hobby));
        $this->empid = htmlspecialchars(strip_tags($this->empid));

        //binding parameter
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':mobileno', $this->mobileno);
        $stmt->bindParam(':dob', $this->dob);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':city', $this->city);
        $stmt->bindParam(':hobby', $this->hobby);
        $stmt->bindParam(':empid', $this->empid);

        //execute the query
        if ($stmt->execute()) {
            return true;
        }

        //print error if something went wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }

    public function delete_emp()
    {
        $query = "DELETE FROM $this->table WHERE empid = :empid";

        //parepare the statement
        $stmt = $this->conn->prepare($query);

        //clean data
        $this->empid = htmlspecialchars(strip_tags($this->empid));

        //binding parameter
        $stmt->bindParam(':empid', $this->empid);

        //execute the query
        if ($stmt->execute()) {
            return true;
        }

        //print error if something went wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }
}
