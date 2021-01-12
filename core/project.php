<?php


class Project
{

    private $conn;
    private $table = 'project';
    public $projid;
    public $projname;
    public $projdesc;
    public $projstartdate;
    public $projenddate;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read_proj()
    {
        $query = "SELECT * from $this->table";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function read_single_proj()
    {
        $query = "SELECT * FROM $this->table WHERE projid = ? LIMIT 1";

        //parepare the statement
        $stmt = $this->conn->prepare($query);

        //binding parameter
        $stmt->bindParam(1, $this->projid);

        //execute the query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->projname = $row['projname'];
        $this->projdesc = $row['projdesc'];
        $this->projstartdate = $row['projstartdate'];
        $this->projenddate = $row['projenddate'];
    }

    public function create_proj()
    {
        $query = "INSERT INTO $this->table SET projname = :projname, projdesc = :projdesc, projstartdate = :projstartdate,
        projenddate = :projenddate";

        //parepare the statement
        $stmt = $this->conn->prepare($query);

        //clean data
        $this->projname = htmlspecialchars(strip_tags($this->projname));
        $this->projdesc = htmlspecialchars(strip_tags($this->projdesc));
        $this->projstartdate = htmlspecialchars(strip_tags($this->projstartdate));
        $this->projenddate = htmlspecialchars(strip_tags($this->projenddate));

        //binding parameter
        $stmt->bindParam(':projname', $this->projname);
        $stmt->bindParam(':projdesc', $this->projdesc);
        $stmt->bindParam(':projstartdate', $this->projstartdate);
        $stmt->bindParam(':projenddate', $this->projenddate);

        //execute the query
        if ($stmt->execute()) {
            return true;
        }

        //print error if something went wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }

    public function update_proj()
    {
        $query = "UPDATE $this->table SET projname = :projname, projdesc = :projdesc, projstartdate = :projstartdate,
        projenddate = :projenddate WHERE projid = :projid";

        //parepare the statement
        $stmt = $this->conn->prepare($query);

        //clean data
        $this->projname = htmlspecialchars(strip_tags($this->projname));
        $this->projdesc = htmlspecialchars(strip_tags($this->projdesc));
        $this->projstartdate = htmlspecialchars(strip_tags($this->projstartdate));
        $this->projenddate = htmlspecialchars(strip_tags($this->projenddate));
        $this->projid = htmlspecialchars(strip_tags($this->projid));

        //binding parameter
        $stmt->bindParam(':projname', $this->projname);
        $stmt->bindParam(':projdesc', $this->projdesc);
        $stmt->bindParam(':projstartdate', $this->projstartdate);
        $stmt->bindParam(':projenddate', $this->projenddate);
        $stmt->bindParam(':projid', $this->projid);

        //execute the query
        if ($stmt->execute()) {
            return true;
        }

        //print error if something went wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }

    public function delete_proj()
    {
        $query = "DELETE FROM $this->table WHERE projid = :projid";

        //parepare the statement
        $stmt = $this->conn->prepare($query);

        //clean data
        $this->projid = htmlspecialchars(strip_tags($this->projid));

        //binding parameter
        $stmt->bindParam(':projid', $this->projid);

        //execute the query
        if ($stmt->execute()) {
            return true;
        }

        //print error if something went wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }

}
