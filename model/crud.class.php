<?php
class crud
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getPasien()
    {
        $query = "SELECT * FROM pasien";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPasien($data)
    {
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tl = $data['tl'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telp = $data['telp'];
        $query = "INSERT INTO pasien (nama, tempat, tl, gender, email, telp) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nama, $tempat, $tl, $gender, $email, $telp]);
    }

    public function updatePasien($data)
    {
        $id = $data['id'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tl = $data['tl'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telp = $data['telp'];
        $query = "UPDATE pasien SET nama=?, tempat=?, tl=?, gender=?, email=?, telp=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nama, $tempat, $tl, $gender, $email, $telp, $id]);
    }

    public function deletePasien($id)
    {
        $query = "DELETE FROM pasien WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
    }
}
?>
