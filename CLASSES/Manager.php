<?php

class Manager
{
    private $db;


    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }


    public function getDestinationsFromDb(Destinations $destinations)
    {
        $query = $this->db->prepare("SELECT * FROM destinations WHERE id=:id");
        $query->bindValue(":id", $destinations->getId(), PDO::PARAM_INT);
        $query->execute();
        $ArrayDestinations = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($ArrayDestinations as $data) {
            $object = new Destinations($data);
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