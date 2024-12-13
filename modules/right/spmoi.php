<?php
// Truy vấn sản phẩm mới nhất
$sql_moinhat = "SELECT * FROM sanpham ORDER BY idsanpham DESC LIMIT 6";
$result_moinhat = mysqli_query($conn, $sql_moinhat); // Sử dụng MySQLi

if (!$result_moinhat) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}
?>
<div class="tieude">Sản phẩm mới nhất</div>
<ul class="product">
    <?php
    while ($dong_moinhat = mysqli_fetch_array($result_moinhat)) {
    ?>
        <li><a href="?quanly=chitietsp&idloaisp=<?php echo $dong_moinhat['loaisp'] ?>&id=<?php echo $dong_moinhat['idsanpham'] ?>">
                <img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong_moinhat['hinhanh'] ?>" width="150" height="150" />
                <p style="color:skyblue"><?php echo $dong_moinhat['tensp'] ?></p>
                <p style="color:red;font-weight:bold; border:1px solid #d9d9d9; width:150px;
                height:30px; line-height:30px;margin-left:35px;margin-bottom:5px;">
                <?php echo number_format($dong_moinhat['giadexuat']) . ' VNĐ' ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>
<div class="clear"></div>

<?php
// Truy vấn tất cả các loại sản phẩm
$sql_loai = "SELECT * FROM loaisp";
$result_loai = mysqli_query($conn, $sql_loai);

if (!$result_loai) {
    die("Lỗi truy vấn loại sản phẩm: " . mysqli_error($conn));
}

while ($dong_loai = mysqli_fetch_array($result_loai)) {
    echo '<div class="tieude">' . $dong_loai['tenloaisp'] . '</div>';

    // Truy vấn sản phẩm theo loại
    $sql_loaisp = "SELECT * FROM loaisp 
                   INNER JOIN sanpham 
                   ON sanpham.loaisp = loaisp.idloaisp 
                   WHERE sanpham.loaisp = '" . $dong_loai['idloaisp'] . "'";

    $result_loaisp = mysqli_query($conn, $sql_loaisp);

    if (!$result_loaisp) {
        die("Lỗi truy vấn sản phẩm loại: " . mysqli_error($conn));
    }

    $count = mysqli_num_rows($result_loaisp);
    if ($count > 0) {
    ?>
        <ul class="product">
            <?php
            while ($dong = mysqli_fetch_array($result_loaisp)) {
            ?>
                <li><a href="?quanly=chitietsp&idloaisp=<?php echo $dong['loaisp'] ?>&id=<?php echo $dong['idsanpham'] ?>">
                        <img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" width="150" height="150" />
                        <p style="color:skyblue"><?php echo $dong['tensp'] ?></p>
                        <p style="color:red;font-weight:bold; border:1px solid #d9d9d9; width:150px;
                        height:30px; line-height:30px;margin-left:35px;margin-bottom:5px;">
                        <?php echo number_format($dong['giadexuat']) . ' VNĐ' ?></p>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    <?php
    } else {
        echo '<h3 style="margin:5px;font-style:italic;color:#000">Hiện chưa có sản phẩm...</h3>';
    }
}
?>
<div class="clear"></div>
