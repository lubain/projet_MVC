<?php
    namespace app\Models;
    use CodeIgniter\Model;

    class Publication extends Model {
        protected $table = "publications";
        protected $primaryKey = "id";
        protected $allowedFields = ['sender_id','descriptions','created_at','publications_photo'];

        public function getPublications()
        {
            return $this->db->query("
                SELECT users.id, users.nom, users.prenom, users.profile_photo, publications.id, publications.sender_id, publications.descriptions, publications.created_at, publications.publications_photo
                    FROM publications
                JOIN users
                WHERE users.id = publications.sender_id
                ORDER BY publications.created_at DESC;
            ", [])->getResult();
        }
        public function getPublicationsOf($id)
        {
            return $this->db->query("
                SELECT users.id, users.nom, users.prenom, users.profile_photo, publications.id, publications.sender_id, 			publications.descriptions, publications.created_at, publications.publications_photo
                FROM publications
                JOIN users
                WHERE (users.id = publications.sender_id) AND 
                    (users.id = $id)
                ORDER BY publications.created_at DESC;
            ", [])->getResult();
        }
    }
