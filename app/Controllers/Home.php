<?php

namespace App\Controllers;

use App\Models\MessagesModel;
use App\Models\Publication;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        if (!session()->get('id')) {
            $url = base_url("public/login");
            return redirect()->to($url);
        }
        $user = new UserModel();
        $message = new MessagesModel();
        $publications = new Publication();
        if ($this->request->getPost('search')) {
            $data["resultats"] = $user->like("nom",$this->request->getPost('search'))->findAll();
        }
        $data["user"] = $user->where('id',session()->get('id'))->first();
        $data["publications"] = $publications->getPublications();
        $data["conversations"] = $message->getConversations(session()->get('id'));
        return view('home', $data);
    }
    
    public function addUser()
    {
        $model = new UserModel();
        $data = [
            "nom"=>$this->request->getPost('nom'),
            "prenom"=>$this->request->getPost('prenom'),
            "email"=>$this->request->getPost('email'),
            "password"=>password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            "adress"=>$this->request->getPost('adress')
        ];
        $model->insert($data);
        $id = $model->db->insertID();
        session()->set('id', $id);
        if (isset($_FILES['profile'])) {
            return $this->updatePhoto('profile');
        }
        $url = base_url("public/");
        return redirect()->to($url);
    }

    public function register()
    {
        return view('register');
    }

    public function profile($id)
    {
        if (!session()->get('id')) {
            $url = base_url("public/login");
            return redirect()->to($url);
        }
        $user = new UserModel();
        $message = new MessagesModel();
        $publications = new Publication();
        if ($this->request->getPost('search')) {
            $data["resultats"] = $user->like("nom",$this->request->getPost('search'))->findAll();
        }
        $data["user"] = $user->where('id',$id)->first();
        $data["publications"] = $publications->getPublicationsOf($id);
        $data["conversations"] = $message->getConversations(session()->get('id'));
        return view('profile', $data);
    }

    public function updateUser()
    {
        if (!session()->get('id')) {
            $url = base_url("public/login");
            return redirect()->to($url);
        }
        $model = new UserModel();
        $user = $model->find(session()->get('id'));
        if ($this->request->getPost('password')) {
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        } else {
            $password = $user["password"];
        }
        $data = [
            "nom"=>$this->request->getPost('nom'),
            "prenom"=>$this->request->getPost('prenom'),
            "email"=>$this->request->getPost('email'),
            "password"=>$password,
            "adress"=>$this->request->getPost('adress')
        ];
        $model->update(session()->get('id'),$data);
        $url = base_url("public/");
        return redirect()->to($url);
    }

    public function updatePhoto($profile)
    {
        $model = new UserModel();
        $newImagePath = $this->uploadImage($profile, 'local/profile_');
        $user = $model->find(session()->get('id'));
        $imagePath = $user["profile_photo"];
        $model->updateProfilePhoto(session()->get('id'),$newImagePath);
        $url = base_url("public/");
        if (file_exists($imagePath) && $imagePath != "user-default.png") {
            if (unlink($imagePath)) {
                echo "L'image a été supprimée avec succès.";
            } else {
                echo "Une erreur est survenue lors de la suppression de l'image.";
            }
        } else {
            echo "L'image n'existe pas.";
        }
        return redirect()->to($url);
    }

    public function postHome()
    {
        if (isset($_FILES['profile_photo'])) {
            return $this->updatePhoto('profile_photo');
        } elseif ($this->request->getPost('descriptions')) {
            return $this->Publication();
        } elseif ($this->request->getPost('update')) {
            return $this->updateUser();
        } elseif ($this->request->getPost('search')) {
            return $this->index();
        }
    }

    public function Publication()
    {
        $model = new Publication();
        if (isset($_FILES['publications_photo'])) {
            $img_dir = $this->uploadImage('publications_photo', 'publications/pub_');
        } else {
            $img_dir = null;
        }
        $data = [
            'sender_id'=>session()->get('id'),
            'descriptions'=>$this->request->getPost('descriptions'),
            'publications_photo'=>$img_dir
        ];
        $model->insert($data);
        $url = base_url("public/");
        return redirect()->to($url);
    }

    public function deletePublication($id)
    {
        $model = new Publication();
        $publication = $model->find($id);
        $model->delete($id);
        if (file_exists($publication["publications_photo"])) {
            if (unlink($publication["publications_photo"])) {
                echo "L'image a été supprimée avec succès.";
            } else {
                echo "Une erreur est survenue lors de la suppression de l'image.";
            }
        } else {
            echo "L'image n'existe pas.";
        }
        $url = base_url("public/");
        return redirect()->to($url);
    }

    public function uploadImage($file, $output_dir) {
        $phpFileUploadErrors = array(
            0 => 'There is no error, the file upload with succes',
            1 => 'the upload file excceds the upload_maxfilesize directive in php.ini',
            2 => 'the upload file excceds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'the upload file excceds only partially uploaded',
            4 => 'on file was uploaded',
            6 => 'missing a temporary folder',
            7 => 'failed to write file to disk',
            8 => 'a php extesion stopped the file upload.',
        );
        if (isset($_FILES[$file])){
            $image = $this->reArrayFiles($_FILES[$file]);
            if ($image['error']){
                echo $image['name'].' - '.$phpFileUploadErrors[$image['error']];
            }else{
                $extensions = array('jpg','png','gif','jpeg','webp','PNG');

                $file_ext = explode('.',$image['name']);
                $file_ext = end($file_ext);

                if (!in_array($file_ext,$extensions)){
                    echo "{$image['name']} - invalid file extension!";
                }else{
                    $img_dir = $output_dir . session()->get('id') . time() . '.' . $file_ext;
                    move_uploaded_file($image['tmp_name'],$img_dir);
                    return $img_dir;
                }
            }
        }
    }

    public function reArrayFiles(&$file_post){
        $file_ary = array();
        $file_keys = array_keys($file_post);
        foreach ($file_keys as $key){
            $file_ary[$key] = $file_post[$key];
        }
        return $file_ary;
    }
}
