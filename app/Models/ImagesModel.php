<?php
    namespace app\Models;
    use CodeIgniter\Model;

    class ImagesModel extends Model {
        protected $table = "photo";
        protected $primaryKey = "id";
        protected $allowedFields = ['pub_id','img_dir'];
    }
