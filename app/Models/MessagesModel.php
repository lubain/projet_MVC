<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class MessagesModel extends Model
    {
        protected $table = 'messages';
        protected $primaryKey = 'id';
        protected $allowedFields = ['sender_id', 'receiver_id', 'content', 'created_at'];

        public function getMessages($sender_id, $receiver_id)
        {
            return $this->db->query("
                SELECT users.profile_photo, messages.sender_id, messages.content, messages.created_at
                    FROM users
                JOIN messages
                    ON (messages.sender_id = $sender_id AND messages.receiver_id = $receiver_id)
                    OR (messages.sender_id = $receiver_id AND messages.receiver_id = $sender_id)
                WHERE users.id = messages.sender_id
                ORDER BY messages.created_at ASC;
            ", [])->getResult();
        }
        public function getConversations($userId)
        {
            return $this->db->query("
                SELECT users.id, users.nom, users.prenom, users.profile_photo, messages.sender_id, messages.content, messages.created_at
                FROM users
                JOIN messages 
                    ON (messages.sender_id = users.id AND messages.receiver_id = $userId)
                    OR (messages.receiver_id = users.id AND messages.sender_id = $userId)
                WHERE users.id != $userId
                AND messages.created_at = (
                    SELECT MAX(m2.created_at)
                        FROM messages m2
                    WHERE (m2.sender_id = users.id AND m2.receiver_id = $userId)
                        OR (m2.receiver_id = users.id AND m2.sender_id = $userId)
                )
                ORDER BY messages.created_at DESC;
                
            ", [$userId])->getResult();
        }
    }