<?php 
            include_once './Model/Admin.php';
            $NgayTao = $_POST['dateExport'];
            $Admin = new Admin();
            $HienThiDonDaDuyet = $Admin->hienThiDonTrenHome(1)[0];
            $HienThiTongTien = $Admin->hienThiSoTienKiemDuoc()[0];
            $OutPut = '';
            if(isset($_POST['export_excel'])) {
                $OutPut .= '
                        <table class="table" bordered="1">
                            <tr>
                                <th>Ngay tao</th>
                                <th>So don da duyet</th>
                                <th>Tong tien</th>
                            </tr>
                ';
                $OutPut .= '
                            <tr> 
                                <td>'.$NgayTao.'</td>
                                <td>'.$HienThiDonDaDuyet.'</td>
                                <td>'.$HienThiTongTien.'</td>
                            </tr>
                
                ';
                $OutPut .= '</table>';
                header("Content-Type: application/xls");
                header("Content-Disposition: attachment, filename=thongke.xls");
                echo $OutPut;

            } else {
                header('Location: ./?Action=error');
                exit();
            }
?>