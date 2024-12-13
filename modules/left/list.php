<?php
    // Kết nối cơ sở dữ liệu từ config.php
    include('C:\xampp\htdocs\webphukiendienthoai\admincp\modules\config.php'); 

    // Kiểm tra sự tồn tại của bảng loaisp
    $check_table_query = "SHOW TABLES LIKE 'loaisp'";
    $result_check_table = mysqli_query($conn, $check_table_query);

    if (mysqli_num_rows($result_check_table) > 0) {
        // Nếu bảng tồn tại, thực hiện truy vấn
        $sql_loai = "SELECT * FROM loaisp ORDER BY idloaisp ASC";
        $result_loai = mysqli_query($conn, $sql_loai);

        if (!$result_loai) {
            die("Lỗi truy vấn: " . mysqli_error($conn));
        }
    } else {
        die("Bảng 'loaisp' không tồn tại trong cơ sở dữ liệu.");
    }
?>
<div class="box_list">
    <div class="tieude">
        <h3>Loại phụ kiện</h3>
    </div>
    <ul class="list">
        <?php while ($dong_loai = mysqli_fetch_array($result_loai)) { ?>
            <li><a href="index.php?quanly=loaisp&id=<?php echo $dong_loai['idloaisp'] ?>">
                <?php echo $dong_loai['tenloaisp'] ?>
            </a></li>
        <?php } ?>
    </ul>
</div>
