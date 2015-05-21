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

    public function insertComment($id, $comment) {
        $data = array(
            'title' => 'My title',
            'name' => 'My Name',
            'comment' => $comment,
            'thread_id' => $id
        );

        $this->db->insert('mytable', $data);
    }

}

?>