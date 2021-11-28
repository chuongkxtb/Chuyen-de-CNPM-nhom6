<?php
    $filepath = realpath(dirname(__FILE__));

    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class brand
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function insert_brand($namebr,$status){
            $namebr = $this->fm->validation($namebr);
            $status = $this->fm->validation($status);

            $namebr= mysqli_real_escape_string($this->db->link,$namebr);
            $status= mysqli_real_escape_string($this->db->link,$status);

            if(empty($namebr)){
                $alert = "<span class = 'error'>Không được để trống </span>";
                return $alert;
            }else{
                $query = "INSERT INTO hieusp(tenhieusp,tinhtrang) VALUES ('$namebr','$status')";
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
        public function show_brand(){
            $query = "SELECT * FROM hieusp order by idhieusp desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getbrbyid($id){
            $query = "SELECT * FROM hieusp WHERE idhieusp='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_name_by_brand($id){
			$query = "SELECT sanpham.*,hieusp.tenhieusp,hieusp.idhieusp FROM sanpham,hieusp
             WHERE sanpham.idhieusp=hieusp.idhieusp AND hieusp.idhieusp ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
        public function show_brand_home(){
			$query = "SELECT * FROM hieusp order by idhieusp desc";
			$result = $this->db->select($query);
			return $result;
		}
        public function update_brand($namebr,$status,$id){
            $namebr = $this->fm->validation($namebr);
            $status = $this->fm->validation($status);
            $id = $this->fm->validation($id);

            $namebr= mysqli_real_escape_string($this->db->link,$namebr);
            $status= mysqli_real_escape_string($this->db->link,$status);
            $id= mysqli_real_escape_string($this->db->link,$id);

            if(empty($namebr)){
                $alert = "Không được để trống";
                return $alert;
            }else{
                $query = "update hieusp set tenhieusp='$namebr',tinhtrang='$status' where idhieusp='$id'";
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
        public function delete_brand($id){
            $query = "DELETE FROM hieusp WHERE idhieusp='$id'";
            $result = $this->db->delete($query);
            return $result;
        }
        public function product_brand($id){
            $query = "SELECT sanpham.*,hieusp.*
            FROM hieusp INNER JOIN sanpham ON sanpham.idhieusp=hieusp.idhieusp  WHERE hieusp.idhieusp='$id'";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>