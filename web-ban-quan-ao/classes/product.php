<?php
    $filepath = realpath(dirname(__FILE__));

    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');

?>

<?php
    class product
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function insert_product($data,$files){
            

            $tensp= mysqli_real_escape_string($this->db->link,$data['tensp']);
            $masp= mysqli_real_escape_string($this->db->link,$data['masp']);

 

            $hinhanh=$_FILES['hinhanh']['name'];
	        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];


            $giadexuat= mysqli_real_escape_string($this->db->link,$data['giadexuat']);
            $giamgia= mysqli_real_escape_string($this->db->link,$data['giagiam']);
            $soluong= mysqli_real_escape_string($this->db->link,$data['soluong']);
            $loaisp = mysqli_real_escape_string($this->db->link,$data['loaisp']);
            $hieusp = mysqli_real_escape_string($this->db->link,$data['hieusp']);
            $tinhtrang = mysqli_real_escape_string($this->db->link,$data['tinhtrang']);

            $noidung= mysqli_real_escape_string($this->db->link,$data['noidung']);

            if($tensp=="" || $masp=="" || $giadexuat=="" || $soluong=="" || $noidung==""){
                $alert = "<span class = 'error'>Không được để trống </span>";
                return $alert;
            }else{
      
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
                $query = "INSERT INTO sanpham(tensp,masp,hinhanh,giadexuat,giagiam,soluong,idloaisp,idhieusp,noidung,tinhtrang) 
                                      VALUES ('$tensp','$masp','$hinhanh','$giadexuat','$giamgia','$soluong','$loaisp','$hieusp','$noidung','$tinhtrang')";
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
        public function show_product(){
            $query = "SELECT sanpham.*,loaisp.tenloaisp,hieusp.tenhieusp 
            FROM sanpham INNER JOIN loaisp ON sanpham.idloaisp=loaisp.idloaisp 
            INNER JOIN hieusp ON sanpham.idhieusp=hieusp.idhieusp order by idsanpham desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyid($id){
            $query = "SELECT * FROM sanpham WHERE idsanpham='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data,$files,$id){
            $id= mysqli_real_escape_string($this->db->link,$id);
            $tensp= mysqli_real_escape_string($this->db->link,$data['tensp']);
            $masp= mysqli_real_escape_string($this->db->link,$data['masp']);

            $hinhanh=$_FILES['hinhanh']['name'];
	        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];;
            $giadexuat= mysqli_real_escape_string($this->db->link,$data['giadexuat']);
            $giamgia= mysqli_real_escape_string($this->db->link,$data['giagiam']);
            $soluong= mysqli_real_escape_string($this->db->link,$data['soluong']);
            $loaisp = mysqli_real_escape_string($this->db->link,$data['loaisp']);
            $hieusp = mysqli_real_escape_string($this->db->link,$data['hieusp']);
            $tinhtrang = mysqli_real_escape_string($this->db->link,$data['tinhtrang']);

            $noidung= mysqli_real_escape_string($this->db->link,$data['noidung']);

            if($tensp==" "){
                $alert = "Không được để trống";
                return $alert;
            }else{
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
                $query = "update sanpham set tensp='$tensp',masp='$masp',hinhanh='$hinhanh',giadexuat='$giadexuat',giagiam='$giamgia',soluong='$soluong',idloaisp='$loaisp',idhieusp='$hieusp',noidung='$noidung',tinhtrang='$tinhtrang' where idsanpham='$id'";
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
        public function delete_product($id){
            $query = "DELETE FROM sanpham WHERE idsanpham='$id'";
            $result = $this->db->delete($query);
            return $result;
        }
// END ADMIN
        public function product_ft(){
            $query = "SELECT * FROM sanpham WHERE type='1'";
            $result = $this->db->select($query);
            return $result;
        }
        public function product_new(){
            $query = "SELECT * FROM sanpham order by idsanpham desc limit 4";
            $result = $this->db->select($query);
            return $result;
        }
     public function product_detail($id){
         $query = "SELECT sanpham.*,loaisp.tenloaisp,hieusp.tenhieusp 
                    FROM sanpham INNER JOIN loaisp ON sanpham.idloaisp=loaisp.idloaisp 
                    INNER JOIN hieusp ON sanpham.idhieusp=hieusp.idhieusp WHERE sanpham.idsanpham='$id'";
       
         $result = $this->db->select($query);
         return $result;
     }
     public function products(){
        $query = "SELECT sanpham.*,loaisp.tenloaisp,hieusp.tenhieusp 
        FROM sanpham INNER JOIN loaisp ON sanpham.idloaisp=loaisp.idloaisp 
        INNER JOIN hieusp ON sanpham.idhieusp=hieusp.idhieusp WHERE sanpham.idhieusp='15' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function products1(){
        $query = "SELECT sanpham.*,loaisp.tenloaisp,hieusp.tenhieusp 
        FROM sanpham INNER JOIN loaisp ON sanpham.idloaisp=loaisp.idloaisp 
        INNER JOIN hieusp ON sanpham.idhieusp=hieusp.idhieusp WHERE sanpham.idhieusp='16' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function products2(){
        $query = "SELECT sanpham.*,loaisp.tenloaisp,hieusp.tenhieusp 
        FROM sanpham INNER JOIN loaisp ON sanpham.idloaisp=loaisp.idloaisp 
        INNER JOIN hieusp ON sanpham.idhieusp=hieusp.idhieusp WHERE sanpham.idhieusp='17' ";
        $result = $this->db->select($query);
        return $result;
    }
  
    }
?>