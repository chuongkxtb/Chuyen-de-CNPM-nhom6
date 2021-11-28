<?php
        $filepath = realpath(dirname(__FILE__));

        include_once ($filepath.'/../lib/database.php');
        include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class category
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function insert_category($namecat,$status){
            $namecat = $this->fm->validation($namecat);
            $status = $this->fm->validation($status);

            $namecat= mysqli_real_escape_string($this->db->link,$namecat);
            $status= mysqli_real_escape_string($this->db->link,$status);

            if(empty($namecat)){
                $alert = "<span class = 'error'>Không được để trống </span>";
                return $alert;
            }else{
                $query = "INSERT INTO loaisp(tenloaisp,tinhtrang) VALUES ('$namecat','$status')";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert= " <span class = 'success'>Thêm thành công </span>";
                    return $alert;
                }else{
                    $alert= " <span class = 'error'>Thêm không thành công </span>";
                    return $alert;
                }
            }
        }
        public function show_category(){
            $query = "SELECT * FROM loaisp order by idloaisp desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyid($id){
            $query = "SELECT * FROM loaisp WHERE idloaisp='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_category($namecat,$status,$id){
            $namecat = $this->fm->validation($namecat);
            $status = $this->fm->validation($status);
            $id = $this->fm->validation($id);

            $namecat= mysqli_real_escape_string($this->db->link,$namecat);
            $status= mysqli_real_escape_string($this->db->link,$status);
            $id= mysqli_real_escape_string($this->db->link,$id);

            if(empty($namecat)){
                $alert = "Không được để trống";
                return $alert;
            }else{
                $query = "update loaisp set tenloaisp='$namecat',tinhtrang='$status' where idloaisp='$id'";
                $result = $this->db->update($query);
                if($result)
                {
                   
                    $alert= " <span class = 'success'>Update thành công </span>";
                    return $alert;
                }else{
                    $alert= " <span class = 'error'>Update không thành công </span>";
                    return $alert;
                }
            }
        }
        public function get_name_by_cat($id){
			$query = "SELECT sanpham.*,loaisp.idloaisp,loaisp.tenloaisp FROM sanpham,loaisp 
            WHERE sanpham.idloaisp=loaisp.idloaisp AND sanpham.idloaisp ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
        public function delete_category($id){
            $query = "DELETE FROM loaisp WHERE idloaisp='$id'";
            $result = $this->db->delete($query);
            return $result;
        }
        public function product_cat($id){
            $query = "SELECT sanpham.*,loaisp.*
            FROM loaisp INNER JOIN sanpham ON sanpham.idloaisp=loaisp.idloaisp  WHERE loaisp.idloaisp='$id'";
            $result = $this->db->select($query);
            return $result;
        }
 
    }
?>