<?php
if(isset($_POST['submit'])){
//Lấy dữ liệu từ form
    $post_id = $_POST['post_id'];

	//Kết nối
	$kn=mysqli_connect("localhost","root","","webtimtro") or die ("Không thể kết nối!");
	//Xây dựng câu lệnh truy vấn
    $sql = "UPDATE phongtro SET status = 'approved' WHERE Id_PhongTro = '".$post_id."'";	
    $result=mysqli_query($kn,$sql);
	if($result){
				echo"<script> 
						window.location.href = '/Admin/duyetbai.php';
                        </script>";
				}
			else{
                echo'Lỗi khi duyệt bài';
            }
	
	//Đóng kết nối
	mysqli_close($kn);
}

?>