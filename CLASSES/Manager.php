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

    // GETTING ALL COMPANIES BY DEFAULT
    public function getAllCompanies()
    {
        $sql = "SELECT * FROM tour_operator";
        $statement = $this->db->query($sql);

        $companies = [];
        $allCompanies = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allCompanies as $company) {
            $companies[] = new TourOperator($company);
        }

        return $companies;
    }

    // GETTING SEARCHED COMPANIES BY KEYWORD
    public function getSearchedCompanies($keyWord)
    {
        $sql = "SELECT * FROM tour_operator WHERE name LIKE :keyword ";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':keyword', '%'.$keyWord.'%');

        $companies = [];
        $statement->execute();
        $allCompanies = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allCompanies as $company) {
            $companies[] = new TourOperator($company);
        }

        return $companies;
    }

    // UPDATE USER INFORMATIONS
    public function UpdateUserInformation($id, $firstname, $lastname, $admin, $email, $password, $image)
    {
        $sql = "UPDATE users SET firstname = ?, lastname = ?, admin = ?, email = ?, password = ?, image = ? WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$firstname, $lastname, $admin, $email, $password, $image, $id]);
    }

    // ADD USER PHOTO
    public function addUserPhoto($id, $image)
    {
        $sql = "UPDATE users SET image = ? WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$image, $id]);
    }

    // DELETE USER PHOTO
    public function deleteUserPhoto($id)
    {
        $sql = "UPDATE users SET image = ? WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute(['profilephoto.png', $id]);
    }

    public function getOffersByDestination($destinationId) {

        $sql = 'SELECT * FROM offers WHERE destination_id = :destination_id';

        $request = $this->db->prepare($sql);
        $request->bindParam(':destination_id', $destinationId, PDO::PARAM_INT);
        $request->execute();
        $offers = [];
        while ($resultat = $request->fetch(PDO::FETCH_ASSOC)) {
            $offers[] = new Offer([
                'id' => $resultat['id'],
                'destination_id' => $resultat['destination_id'],
                'tour_operator_id' => $resultat['tour_operator_id'],
                'price' => $resultat['price']
            ]);
        }
        return $offers;
    }


    public function getDestinationsFromDb(Destination $destinations)
    {
        $sql = "SELECT * FROM destinations WHERE id=:id";
        $query = $this->db->prepare($sql);
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