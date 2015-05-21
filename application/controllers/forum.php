<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function forum_overview() {
        $this->load->model('model_forum');
        $data = $this->model_staticdata->getData();
        $data['threads'] = $this->model_forum->getThreads();
        $data['page_header'] = 'Forum';

        $data['text'] = 'Threads';

        $this->load->view('head.php', $data);
        $this->load->view('header.php');
        $this->load->view('menubar.php');
        $this->load->view('page.php');
        $this->load->view('forum.php');
        $this->load->view('footer.php');
    }

    public function Thread($id) {
        $this->load->model('model_forum');
        $data = $this->model_staticdata->getData();
        $data['threadPost'] = $this->model_forum->getThreadPost($id);
        $data['comments'] = $this->model_forum->getComments($id);
        $data['page_header'] = 'Forum';

        $data['text'] = 'Thread #' . $id;

        $this->load->view('head.php', $data);
        $this->load->view('header.php');
        $this->load->view('menubar.php');
        $this->load->view('page.php');
        $this->load->view('thread.php');
        $this->load->view('footer.php');
    }

    public function New_Comment($id) {
        $this->load->model('model_forum');
        $data = $this->model_staticdata->getData();
        $data['threadPost'] = $this->model_forum->getThreadPost($id);
        $data['comments'] = $this->model_forum->getComments($id);
        $data['page_header'] = 'Forum';

        $data['text'] = 'Thread #' . $id;

        $this->load->view('head.php', $data);
        $this->load->view('header.php');
        $this->load->view('menubar.php');
        $this->load->view('page.php');
        $this->load->view('new_comment.php');
        $this->load->view('footer.php');
    }

}

?>