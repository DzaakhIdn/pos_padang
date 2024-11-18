<?php
require_once __DIR__ . '/../DB/Connections.php';
require_once __DIR__ . '/Model.php';

class Sales extends Model
{
    protected $table = 'sales';
    protected $primary_key = 'id_sales';
    public function create($datas)
    {
        return parent::create_data($datas, $this->table);
    }
    public function all()
    {
        return parent::all_data($this->table);
    }
    public function all2($limit, $start)
    {
        $query = "SELECT sales.id_sale, sales.name_customer, sales.note, sales.status, sales.amount, sales.user_id, sales.created_at_sale,
        items.id_item, items.name_item, items.attachment, items.price,
        users.id_user, users.full_name, users.avatar
        FROM sales
        JOIN pivot_items_sales ON sales.id_sale = pivot_items_sales.sale_id_pivot
        JOIN items ON items.id_item = pivot_items_sales.item_id_pivot
        JOIN users ON users.id_user = sales.user_id LIMIT $limit, $start";

        $result = mysqli_query($this->db, $query);  

        return $this->convert_data($result);

        // return parent::all_data($this->table);
    }
    public function find($id)
    {
        return parent::find_data($id, $this->table, $this->primary_key);
    }
    public function update($id, $datas)
    {
        return parent::update_data($id, $datas, $this->table, $this->primary_key);
    }
    public function delete($id)
    {
        return parent::delete_data($id, $this->table, $this->primary_key);
    }
}
