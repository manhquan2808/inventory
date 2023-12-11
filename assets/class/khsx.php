<?php
class khsx{
    public function connect(){
        $con = mysqli_connect("localhost", "ptud1", "","inventory_management_copy");

        if (!$con) {
		
            die("Khong ket noi duoc den CSDL");
		
            
        } else {
            mysqli_set_charset($con, "utf8mb4_unicode_ci");
	
            return $con;
        }
    }
    public function xuatdsKHSX($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		$dem=1;



		if($i>0)
		{
            echo'<table class="table">
            <tr>
				<th>STT</th>
                <th>ID Kế hoạch sản xuất</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Trạng thái</th>
                <th>ID BGD phê duyệt</th>
            </tr>';
			while($row=@mysqli_fetch_array($ketqua))
			{
				$ID_KHSX=$row['ID_KHSX'];	
				$NgayBatDau=$row['NgayBatDau'];	
				$NgayKetThuc=$row['NgayKetThuc'];	
				$TrangThai=$row['TrangThai'];	
				$ID_BGD_PheDuyet=$row['ID_BGD_PheDuyet'];	
				
				echo '
                <tr>
					<td><a href="?layid='.$ID_KHSX.'">'.$dem.'</a></td>
                    <td><a href="?layid='.$ID_KHSX.'">'.$ID_KHSX.'</a></td>
                    <td><a href="?layid='.$ID_KHSX.'">'.$NgayBatDau.'</a></td>
                    <td><a href="?layid='.$ID_KHSX.'">'.$NgayKetThuc.'</a></td>
                    <td><a href="?layid='.$ID_KHSX.'">'.$TrangThai.'</a></td>
                    <td><a href="?layid='.$ID_KHSX.'">'.$ID_BGD_PheDuyet.'</a></td>
                </tr>
                ';
            
				$dem++;
			}
            echo' </table>';
				
		}else
		{
			echo "không có dữ liệu. ";	
		}
		@mysqli_close($link);
	}
    public function themsuaxoa($sql)
	{
		$link=$this->connect();
		if(mysqli_query($link,$sql))
		{
			return 1;
		}else
		{
			return 0;
		}
			 
	}	
    public function chon_cot($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		$giatri='';
		if($i>0)
		{
			
					
			while($row=@mysqli_fetch_array($ketqua))
			{
			  	$giatri=$row[0];
				
			}
			
		}return $giatri;
	}
}



?>