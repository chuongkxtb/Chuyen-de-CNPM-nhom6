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
        public function search_product($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT * FROM sanpham WHERE tensp LIKE '%$tukhoa%'";
			$result = $this->db->select($query);
			return $result;

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
    
            // $query = "SELECT sanpham.*,loaisp.tenloaisp,hieusp.tenhieusp 
            //  FROM sanpham INNER JOIN loaisp ON sanpham.idloaisp=loaisp.idloaisp 
            //  INNER JOIN hieusp ON sanpham.idhieusp=hieusp.idhieusp order by sanpham.idsanpham desc";
            $query = "SELECT sanpham.*,loaisp.tenloaisp,hieusp.tenhieusp 
            FROM sanpham INNER JOIN loaisp ON sanpham.idloaisp=loaisp.idloaisp 
            INNER JOIN hieusp ON sanpham.idhieusp=hieusp.idhieusp  order by sanpham.idsanpham desc";
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

            // $hinhanh=$_FILES['hinhanh']['name'];
	        // $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
            $permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['hinhanh']['name'];
			$file_size = $_FILES['hinhanh']['size'];
			$file_temp = $_FILES['hinhanh']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
	
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

            $giadexuat= mysqli_real_escape_string($this->db->link,$data['giadexuat']);
            $giamgia= mysqli_real_escape_string($this->db->link,$data['giagiam']);
            $soluong= mysqli_real_escape_string($this->db->link,$data['soluong']);
            $loaisp = mysqli_real_escape_string($this->db->link,$data['loaisp']);
            $hieusp = mysqli_real_escape_string($this->db->link,$data['hieusp']);
            $tinhtrang = mysqli_real_escape_string($this->db->link,$data['tinhtrang']);

            $noidung= mysqli_real_escape_string($this->db->link,$data['noidung']);

            if($tensp=="" || $hieusp=="" || $loaisp=="" || $noidung=="" || $giadexuat=="" || $tinhtrang==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
                    if(!empty($file_name)){
                        //Nếu người dùng chọn ảnh
                        if ($file_size > 20480) {
    
                         $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
                        return $alert;
                        } 
                        elseif (in_array($file_ext, $permited) == false) 
                        {
                      
                        $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
                        return $alert;
                        }
                        move_uploaded_file($file_temp,$uploaded_image);
                        $query = "UPDATE sanpham SET
                        tensp='$tensp',masp='$masp',
                        hinhanh='$unique_image',giadexuat='$giadexuat',
                        giagiam='$giamgia',soluong='$soluong',
                        idloaisp='$loaisp',idhieusp='$hieusp',noidung='$noidung',
                        tinhtrang='$tinhtrang' where idsanpham='$id'";
                        
                    }else{
                        //Nếu người dùng không chọn ảnh
                        $query = "UPDATE sanpham SET
                        tensp='$tensp',masp='$masp',
                        giadexuat='$giadexuat',
                        giagiam='$giamgia',soluong='$soluong',
                        idloaisp='$loaisp',idhieusp='$hieusp',noidung='$noidung',
                        tinhtrang='$tinhtrang' where idsanpham='$id'";
                        
                    }
                    $result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Product Updated Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Product Updated Not Success</span>";
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
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $query =  "SELECT * FROM sanpham where type = '1' ORDER BY Rand() LIMIT " . $item_per_page . " OFFSET " . $offset;
       
        $result = $this->db->select($query);
        return $result;
            
        }
       
        public function product_new(){
    
            $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
            $current_page = !empty($_GET['page'])?$_GET['page']:1; 
            $offset = ($current_page - 1) * $item_per_page;
            $query = "SELECT * FROM sanpham order by idsanpham desc limit " . $item_per_page . " OFFSET " . $offset;
            $result = $this->db->select($query);
            return $result;
        }
        public function get_all_product(){
			$query = "SELECT * FROM sanpham";
			$result = $this->db->select($query);
			return $result;
		} 
        public function get_all_product_ft(){
			$query = "SELECT * FROM sanpham where type='1'";
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

  
    }
?>