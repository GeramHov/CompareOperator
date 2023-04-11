<?php

class Manager
{
    private $db;

    
   public function __construct(PDO $db)
    {
        $this->setDb($db);
    }


    // GETTING ALL DESTINATION BY DEFAULT WITH ITS OFFERS
    public function getAllDestinations()
    {
        $sql = "SELECT destinations.id, destinations.location, destinations.country, destinations.flag, destinations.image, destinations.starting_price, tour_operator.name, tour_operator.icon, offers.price
                FROM destinations
                JOIN offers ON destinations.id = offers.destination_id
                JOIN tour_operator ON tour_operator.id = offers.tour_operator_id";
        $statement = $this->db->query($sql);
    
        $destinations = [];
        $allDestinations = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allDestinations as $destination) {
            $destinationId = $destination['id'];
            if (!isset($destinations[$destinationId])) {
                $destinations[$destinationId] = new Destination([
                    'id' => $destinationId,
                    'location' => $destination['location'],
                    'country' => $destination['country'],
                    'flag' => $destination['flag'],
                    'image' => $destination['image'],
                    'starting_price' => $destination['starting_price'],
                    'offers' => [],
                ]);
            }
            $destinations[$destinationId]->addOffer([
                'tour_operator_name' => $destination['name'],
                'tour_operator_icon' => $destination['icon'],
                'price' => $destination['price'],
            ]);
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

    // ADDING A COMMENT
    public function addFeedback($comment, $note, $compName, $user)
    {
        $sql = "INSERT INTO feedback (message, note, tour_operator_name, user_id) VALUES (?, ?, ?, ?)";
        $request = $this->db->prepare($sql);
        $request->execute([$comment, $note, $compName, $user]);
    }


    // GET ALL USERS
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // GET USER BY HIS ID
    public function getUserByHisId($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$id]);

        $users = [];
        $allUsers = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allUsers as $user) {
            $users[] = new User($user);
        }

        return $users;
    }

    // GET FEEDBACKS BY ITS ID
    public function getFeedbacksByCompanyName($name)
    {
        $sql = "SELECT * FROM feedback WHERE tour_operator_name = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$name]);

        $feedbacks = [];
        $allFeedbacks = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allFeedbacks as $feedback) {
            $feedbacks[] = new Feedback($feedback);
        }

        return $feedbacks;
    }

    // DELETE A USER
    public function deleteUser($userId)
    {
        $query = "DELETE FROM users WHERE id = ? AND admin=0";
        $statement = $this->db->prepare($query);
        $statement->execute([$userId]);
        // Vérifie si la suppression a été effectuée avec succès
        $num_rows_deleted = $statement->rowCount();
        if ($num_rows_deleted == 0) {
            echo "<script>alert('Impossible de supprimer l\\'utilisateur.');</script>";
        }
    }

    // BAN A USER
    public function banUser(int $userId)
    {
        // Vérifier si l'utilisateur que vous essayez de bannir est un administrateur
        $query = "SELECT admin FROM users WHERE id = ?";
        $statement = $this->db->prepare($query);
        $statement->execute([$userId]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user['admin'] == 1) {
            echo "<script>alert('Vous ne pouvez pas bannir un administrateur.');</script>";
        } else {
            // Si l'utilisateur n'est pas un administrateur, bannir l'utilisateur
            $query = "UPDATE users SET banned = 1 WHERE id = ?";
            $statement = $this->db->prepare($query);
            $statement->execute([$userId]);

            // Vérifie si la mise à jour a été effectuée avec succès
            $num_rows_updated = $statement->rowCount();
            if ($num_rows_updated == 0) {
                echo "<script>alert('Impossible de bannir l\\'utilisateur.');</script>";
            }
        }
    }

    // UNBAN A USER
    public function unbanUser(int $userId)
    {
        // Vérifier si l'utilisateur a été banni auparavant
        $query = "SELECT banned FROM users WHERE id = ?";
        $statement = $this->db->prepare($query);
        $statement->execute([$userId]);
        $result = $statement->fetch();
        $banned = $result['banned'];

        if ($banned == 0) {
            echo "<script>alert('Impossible de débannir l\\'utilisateur qui n\\'a jamais été sanctionné.');</script>";
        } else {
            // Mettre à jour la base de données pour débannir l'utilisateur
            $query = "UPDATE users SET banned = 0 WHERE id = ?";
            $statement = $this->db->prepare($query);
            $statement->execute([$userId]);

            // Vérifier si la mise à jour a été effectuée avec succès
            $num_rows_updated = $statement->rowCount();
            if ($num_rows_updated == 0) {
                echo "<script>alert('Impossible de débannir l\\'utilisateur.');</script>";
            }
        }
    }

    // Update la db pour mettre à jour la dernière connection (utilisé en pannel admin)
    public function updateLastConnection(int $userid)
    {
        $currentTime = date('Y-m-d H:i:s');
        $query = $this->db->prepare("UPDATE users SET last_connection = ? WHERE id = ?");
        $query->execute(array($currentTime, $userid));
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