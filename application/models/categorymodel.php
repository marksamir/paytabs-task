<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of categorymodel
 *
 * @author https://www.roytuts.com
 */
class CategoryModel extends CI_Model
{

    private $category = 'categories';

    function __construct()
    {
    }

    public function fetch_sub_categories($parent_id)
    {

        // Select all entries from the category table
        $query = $this->db->query("select category_id, category_name,
            parent_id from " . $this->category . " where parent_id=" . $parent_id . " order by category_id");

        if (json_encode($query->result()) == "[]") {

            // you have to insert
            $query = $this->db->query("select category_name from " . $this->category . " where category_id=" . $parent_id);

            $parent_category_name = $query->result()[0]->category_name;
            $category_name_1 = "SUB " . $parent_category_name . "-1";
            $category_name_2 = "SUB " . $parent_category_name . "-2";

            // Insert SQL
            $this->db->query("INSERT INTO " . $this->category . " (category_name, parent_id) VALUES ('" . $category_name_1 . "', '" . $parent_id . "'),('" . $category_name_2 . "', '" . $parent_id . "')");



            // query to fetch the inserted records
            $query = $this->db->query("select category_id, category_name,
                parent_id from " . $this->category . " where parent_id=" . $parent_id . " order by category_id");
        }

        return json_encode($query->result());
    }

    public function initial_menu()
    {
        // Select all entries from the menu table
        $query = $this->db->query("select category_id, category_name,
            parent_id from " . $this->category . " where parent_id = 0 order by category_id");

        return "<li id=".$query->result()[0]->category_id." class='list-group-item' ><p>" . $query->result()[0]->category_name . "</p></li>" .
            "<li id=".$query->result()[1]->category_id." class='list-group-item' ><p>" . $query->result()[1]->category_name . "</p></li>";
    }


   
}
