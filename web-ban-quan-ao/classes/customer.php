<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class customer
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		
		
		public function insert_customers($data){
			$tenkhachhang = mysqli_real_escape_string($this->db->link, $data['tenkhachhang']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$diachinhan = mysqli_real_escape_string($this->db->link, $data['diachinhan']);
			$dienthoai = mysqli_real_escape_string($this->db->link, $data['dienthoai']);
			$matkhau = mysqli_real_escape_string($this->db->link, md5($data['matkhau']));
			if($tenkhachhang==""  || $email=="" || $diachinhan==""  || $dienthoai =="" || $matkhau ==""){
				$alert = "<span style ='color:red; font-size: 20px;'>Fields must be not empty</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM dangky WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span style ='color:red; font-size: 20px;'>Email này đã đăng ký</span>";
					return $alert;
				}else{
					$query = "INSERT INTO dangky(tenkhachhang,email,diachinhan,dienthoai,matkhau) 
                    VALUES('$tenkhachhang','$email','$diachinhan','$dienthoai','$matkhau')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span style ='color:green; font-size: 20px;'>Đăng ký thành công</span>";
						return $alert;
					}else{
						$alert = "<span style ='color:red; font-size: 20px;'>Dăng ký không thành côn</span>";
						return $alert;
					}
				}
			}
		}
		public function login_customers($data){
			$tenkhachhang = mysqli_real_escape_string($this->db->link, $data['tenkhachhang']);
			$matkhau = mysqli_real_escape_string($this->db->link, md5($data['matkhau']));
			if($tenkhachhang=="" || $matkhau==""){
				$alert = "<span style ='color:red; font-size: 15px;'>Không được để trống email vs mật khẩu</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM dangky WHERE tenkhachhang='$tenkhachhang' AND matkhau='$matkhau'";
				$result_check = $this->db->select($check_login);
				if($result_check){

					$value = $result_check->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['id_khachhang']);
					Session::set('customer_name',$value['tenkhachhang']);
                    // header('location:index.php');
                    $alert = "<span style ='color:green; font-size: 20px;'>Đăng nhập thành công <a href='index.php'>Đến trang chủ</a></span>";
                    return $alert;
				
				}else{
					$alert = "<span style ='color:red; font-size: 20px;'>email hoặc matkhau không đúng</span>";
					return $alert;
				}
			}
		}
		
		
		


	}
?>