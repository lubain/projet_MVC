<?php
namespace App\Controllers;

use App\Models\MessagesModel;
use App\Models\UserModel;
use DateTime;

class Message extends BaseController
{
    public function index()
    {
        if (!session()->get('id')) {
            $url = base_url("public/login");
            return redirect()->to($url);
        }
        $messageModel = new MessagesModel();
        $userModel = new UserModel();
        $data['conversations'] = $messageModel->getConversations(session()->get('id'));
        $data['user'] = $userModel->find(session()->get('id'));
        return view('chats',$data);
    }
    public function openChat($id)
    {
        if (!session()->get('id')) {
            $url = base_url("public/login");
            return redirect()->to($url);
        }
        $messageModel = new MessagesModel();
        $userModel = new UserModel();
        $data['conversations'] = $messageModel->getConversations(session()->get('id'));
        $data['messages'] = $messageModel->getMessages($id,session()->get('id'));
        $data['user'] = $userModel->find(session()->get('id'));
        return view('conversation',$data);
    }
    
    public function sendMessage($id)
    {
        $model = new MessagesModel();
        $date = new DateTime();
        $data = [
            'sender_id'=>session()->get('id'),
            'receiver_id'=>$id,
            'content'=>$this->request->getPost('messages'),
            'created_at'=>$date->format('Y-m-d H:i:s')
        ];
        $model->insert($data);
        $url = base_url("public/chats/".$id);
        return redirect()->to($url);
    }
}