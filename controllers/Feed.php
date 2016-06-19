<?php
class Feed extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('feed_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['feeds'] = $this->feed_model->get_feed();
                $data['title'] = 'Feed archive';

                $this->load->view('templates/header', $data);
                $this->load->view('feed/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                $data['feed_item'] = $this->feed_model->get_feed($slug);

                if (empty($data['feed_item']))
                {
                show_404();
              }

                $data['title'] = $data['feed_item']['title'];

                $this->load->view('templates/header', $data);
                $this->load->view('feed/view', $data);
                $this->load->view('templates/footer');
        }
        public function create()
        {
          $this->load->helper('form');
          $this->load->library('form_validation');

          $data['title'] = 'Create a feed item';

          $this->form_validation->set_rules('title', 'Title', 'required');
          $this->form_validation->set_rules('text', 'Text', 'required');

          if ($this->form_validation->run() === FALSE)
          {
            $this->load->view('templates/header', $data);
            $this->load->view('feed/create');
            $this->load->view('templates/footer');

          }
          else
          {
            $this->feed_model->set_feed();
            $this->load->view('feed/success');
          }
        }
}
