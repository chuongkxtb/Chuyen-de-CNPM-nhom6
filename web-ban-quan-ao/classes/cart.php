<?php
    $filepath = realpath(dirname(__FILE__));

    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');

?>

<?php
    class cart
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function cart_insert($id,$quantity){
         
            $quantity = $this->fm->validation($quantity);
            $id= mysqli_real_escape_string($this->db->link,$id);
            $quantity= mysqli_real_escape_string($this->db->link,$quantity);
            $sid = session_id();


            $query = "SELECT * FROM sanpham WHERE idsanpham='$id'";
            $result = $this->db->select($query)->fetch_assoc();

            $namesp = $result["tensp"];
            $image = $result["hinhanh"];
            $gia = $result["giadexuat"];

            $query_insert = "INSERT INTO cart_detail(idsanpham,sid,name_sp,quantity,image,price) 
            VALUES ('$id','$sid','$namesp','$quantity','$image','$gia')";
                $result_insert = $this->db->insert($query_insert);
                if($result_insert)
                {
                    $msg = "<span  style ='color:green; font-size: 20px;'>Thêm sản phẩm thành công</span>";
					return $msg;
                }

            }
            public function cart_show(){
                $sid = session_id();
                $query = "SELECT * From cart_detail where sid='$sid'";
                $result = $this->db->select($query);
                return $result;
            }
            public function check_cart(){
                $sId = session_id();
                $query = "SELECT * FROM cart_detail WHERE sId = '$sId'";
                $result = $this->db->select($query);
                return $result;
            }
        public function cart_update($idcart,$quantity){

            $idcart= mysqli_real_escape_string($this->db->link,$idcart);
            $quantity= mysqli_real_escape_string($this->db->link,$quantity);

            $query = "update cart_detail set quantity = '$quantity' where idcart='$idcart'";
                $result = $this->db->update($query);
                if($result)
                {
                    $alert= " <span class ='success'>Update thành công </span>";
                    return $alert;
                }else{
                    $alert= " <span class = 'error'>Update không thành công </span>";
                    return $alert;
                }
               
        }
        public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM cart_detail WHERE idcart = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				$msg = "<span class='error'>Xóa sản phẩm thành công</span>";
				return $msg;
			
			}
		}
  
    }
?>