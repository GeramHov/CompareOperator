<?php

class Manager
{
    private $db;

    
   public function __construct(PDO $db)
    {
        $this->setDb($db);
    }


    // GETTING ALL DESTINATION BY DEFAULT
    public function getAllDestinations()
    {
        $sql = "SELECT * FROM destinations";
        $statement = $this->db->query($sql);

        $destinations = [];
        $allDestinations = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allDestinations as $destination) {
            $destinations[] = new Destination($destination);
        }

        return $destinations;
    }

    // GETTING SEARCHED DESTINATIONS BY KEYWORD
    public function getSearchedDestinations($keyWord)
    {
        $sql = "SELECT * FROM destinations WHERE location LIKE :keyword OR country LIKE :keyword";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':keyword', '%'.$keyWord.'%');

        $destinations = [];
        $statement->execute();
        $allDestinations = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allDestinations as $destination) {
            $destinations[] = new Destination($destination);
        }

        return $destinations;
    }

    public function getDestinationsFromDb(Destination $destinations)
    {
        $query = $this->db->prepare("SELECT * FROM destinations WHERE id=:id");
        $query->bindValue(":id", $destinations->getId(), PDO::PARAM_INT);
        $query->execute();
        $ArrayDestinations = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($ArrayDestinations as $data) {
                $object = new Destination($data);
                $destinations->setLocation($object);
            }
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function delete($something_id)
    {
        $query = "DELETE FROM something WHERE id = ?";
        $statement = $this->db->prepare($query);
        $statement->execute([$something_id]);
        // Vérifie si la suppression a été effectuée avec succès
        $num_rows_deleted = $statement->rowCount();
        if ($num_rows_deleted == 0) {
            throw new Exception("Impossible to delete $something_id.");
        }
    }





    public function pretyDump($data)
    {
        highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
    }

    public function getDb()
    {
        return $this->db;
    }

    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }
}