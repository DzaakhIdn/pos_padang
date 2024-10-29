<?php

class Stores extends Model
{
    protected $table = 'stores';

    public function create($datas)
    {
        return parent::create_data($datas, $this->table);
    }
    public function all()
    {
       return parent::all_data($this->table);
    }
    public function find($id)
    {
        parent::find_data($id, $this->table);
    }
    public function update($id, $datas)
    {
        parent::update_data($id, $datas, $this->table);
    }
    public function delete($id)
    {
        parent::delete_data($id, $this->table);
    }
}
