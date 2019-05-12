<?php

class Blog_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function loadPosts() {
        $query = $this->db->query('SELECT * FROM posts');

        $posts = [];
        foreach ($query->result() as $row)
        {
            $posts[] = [
                'id' => $row->id,
                'title' => $row->title,
                'slug' => $row->slug,
                'content' => $row->content,
                'created_by' => $row->created_by,
                'date_add' => $row->date_add,
                'url' => base_url('blog/showPost/' . $row->slug),
            ];
        }

        return $posts;
    }

    public function addPost($title, $slug, $content, $created_by) {

        $post = [
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
            'created_by' => $created_by,
            'date_add' => (new DateTime())->format('ISO8601')
        ];

        return $this->db->insert('posts', $post);
    }

    public function getPostBySlug($slug) {
        $query = $this->db->get_where('posts', ['slug' => $slug], 1);

        $row = $query->row();

        if (!$row) return false;

        return [
            'id' => $row->id,
            'title' => $row->title,
            'slug' => $row->slug,
            'content' => $row->content,
            'created_by' => $row->created_by,
            'date_add' => $row->date_add
        ];
    }

    public function getPostById($id) {
        $query = $this->db->get_where('posts', ['id' => $id], 1);

        $row = $query->row();

        if (!$row) return false;

        return [
            'id' => $row->id,
            'title' => $row->title,
            'slug' => $row->slug,
            'content' => $row->content,
            'created_by' => $row->created_by,
            'date_add' => $row->date_add
        ];
    }

    public function updatePost($id, $title, $slug, $content) {

        $post = [
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
        ];

        $this->db->where('id', $id);
        return $this->db->update('posts', $post);
    }

    public function deletePost($id) {
        $this->db->where('id', $id);
        return $this->db->delete('posts');
    }
}
