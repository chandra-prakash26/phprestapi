<?php


class EmployeeProject
{

    private $conn;
    private $table = 'employee';
    private $table1 = 'project';
    private $table2 = 'emp_proj';

    public $empid;
    public $firstname;
    public $lastname;
    public $mobileno;
    public $dob;
    public $gender;
    public $city;
    public $hobby;
    public $projid;
    public $projname;
    public $projdesc;
    public $projstartdate;
    public $projenddate;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read_emp_proj()
    {
        $query = "SELECT employee.empid,employee.firstname,project.projid,project.projname FROM $this->table,
        $this->table1,$this->table2
        WHERE employee.empid=emp_proj.empid AND
        project.projid=emp_proj.projid";

        $stmt = $this->conn->prepare($query);

        //clean data
        $this->projid = htmlspecialchars(strip_tags($this->empid));

        $stmt->execute();

        return $stmt;
    }

    public function assign_project()
    {
        $query = "INSERT INTO $this->table2 SET empid = :empid, projid = :projid";

        //parepare the statement
        $stmt = $this->conn->prepare($query);

        //clean data
        $this->empid = htmlspecialchars(strip_tags($this->empid));
        $this->projid = htmlspecialchars(strip_tags($this->projid));

        //binding parameter
        $stmt->bindParam(':empid', $this->empid);
        $stmt->bindParam(':projid', $this->projid);

        //execute the query
        try{
            if ($stmt->execute()) {
                return true;
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
