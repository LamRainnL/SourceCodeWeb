<?php
if(isset($_POST['submit'])){
//Lấy dữ liệu từ form
    $post_id = $_POST['post_id'];

	//Kết nối
	$kn=mysqli_connect("localhost","root","","webtimtro") or die ("Không thể kết nối!");
	//Xây dựng câu lệnh truy vấn
    $sql = "UPDATE timtro SET status = 'rejected' WHERE Id_TimTro = '".$post_id."'";	
    $result=mysqli_query($kn,$sql);
	if($result){
				echo"<script> 
						alert('Đã xóa bài.'); 
						window.location.href = '/Admin/baidang.php';
                        </script>";
				}
			else{
                echo'Lỗi khi duyệt bài';
            }
	
	//Đóng kết nối
	mysqli_close($kn);
}

?>