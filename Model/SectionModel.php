<?php

namespace Model;

class SectionModel extends BaseModel
{
    protected $table = 'print_sections';

    /*
     * Selects distinct categories
     */
    public function getCategoriesList()
    {
        $result = $this->db->query("SELECT DISTINCT `category` FROM `{$this->table}`;");
        $this->ifNot($result);
        return $result;
    }

    /*
     * Selects sections
     */
    public function getSectionsList()
    {
        $result = $this->db->query("SELECT * FROM `{$this->table}`;");
        $this->ifNot($result);
        return $result;
    }
}