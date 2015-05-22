<?php

class Model_forum extends CI_Model {

    public function getThreads() {
        $query = $this->db->get('forum_threads');

        return $query->result();
    }

    public function getThreadPost($id) {
        $this->db->where('thread_id', $id);

        $query = $this->db->get('forum_threads');

        return $query->row();
    }

    public function getComments($id) {
        $this->db->select('*');
        $this->db->from('forum_comments');
        $this->db->join('forum_threads', 'forum_comments.thread_id = forum_threads.thread_id');
        $this->db->where('forum_comments.thread_id', $id);

        $query = $this->db->get();

        return $query->result();
    }

    public function insertComment($id, $comment, $username) {
        $data = array(
            'postedBy' => $username,
            'comment' => $comment,
            'thread_id' => $id
        );
        $did_add_comment = $this->db->insert('forum_comments', $data);

        if ($did_add_comment) {
            $this->db->select('*');
            $this->db->from('forum_comments');
            $this->db->join('forum_threads', 'forum_comments.thread_id = forum_threads.thread_id');
            $this->db->where('forum_comments.thread_id', $id);

            $query = $this->db->get();

            return $query->result();
        } else {
            return false;
        }
    }

}

?>