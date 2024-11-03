<?php
    namespace app\Models;
    use CodeIgniter\Model;

    class UserModel extends Model {
        protected $table = "users";
        protected $primaryKey = "id";
        protected $allowedFields = ['nom','prenom','email','password','adress','profile_photo'];

        public function updateProfilePhoto($userId, $filePath) {
            return $this->update($userId, ['profile_photo' => $filePath]);
        }
    }
