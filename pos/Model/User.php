<?php
require_once __DIR__ . '/Model.php';

class User extends Model
{
    protected $table = 'user';

    public function create($datas)
    {
        return parent::create_data($datas, $this->table);
    }
    public function all()
    {
        parent::all_data($this->table);
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
