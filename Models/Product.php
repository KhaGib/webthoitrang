<?php
include_once "./Models/Database.php";
class Product
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }
    function getNew()
    {
        return $this->db->query("SELECT * FROM products ORDER BY id ASC LIMIT 4");
    }
    function getNewJT()
    {
        return $this->db->query("SELECT * FROM products WHERE id > 5 AND id < 10");
    }
    function getTshirt()
    {
        return $this->db->query("SELECT * FROM products WHERE LOWER(name) LIKE 'a%'");
    }
    function getTrous()
    {
        return $this->db->query("SELECT * FROM products WHERE LOWER(name) LIKE 'q%'");
    }
    function getLimit()
    {
        return $this->db->query("SELECT * FROM products WHERE id >= ? AND id < ?", 10, 18);
    }
    function getById($id)
    {
        return $this->db->queryOne("SELECT * FROM products WHERE id=$id");
    }
    //lỗi 
    function showSearch($keyword)
    {
        $sql = "SELECT * FROM products WHERE 1";
        $params = [];
        $sql .= " AND name LIKE ?";
        $params[] = "%$keyword%";
        return $this->db->query($sql, ...$params);
    }

    function getAll($keyword, $sort, $category_id)
    {
        // Bắt đầu với WHERE 1 để dễ nối điều kiện
        $sql = "SELECT * FROM products WHERE 1";
        $params = [];

        // Xử lý tìm kiếm theo tên sản phẩm
        if (!empty($keyword)) {
            $sql .= " AND name LIKE ?";
            $params[] = "%$keyword%";
        }

        // Xử lý lọc theo category nếu hợp lệ
        if ($category_id !== 'null' && is_numeric($category_id)) {
            $sql .= " AND category_id = ?";
            $params[] = $category_id;
        }

        // Xử lý sắp xếp nếu hợp lệ
        if ($sort !== 'null' && strpos($sort, '-') !== false) {
            list($column, $type) = explode('-', $sort);

            $allowedColumns = ['price', 'name'];
            $allowedTypes = ['asc', 'desc'];

            if (in_array($column, $allowedColumns) && in_array($type, $allowedTypes)) {
                $sql .= " ORDER BY $column $type";
            }
        }

        return $this->db->query($sql, ...$params);
    }

}




?>