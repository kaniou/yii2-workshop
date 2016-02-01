<div class="panel panel-info" style="margin-right: 20px;">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-lock"></span>
        <strong>ประเภทผู้ใช้งาน</strong>
    </div>
    <div class="panel-body">
        <a href="index.php?r=config/usertypeform" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span>
            เพิ่มรายการ
        </a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2" width="200px">ชื่อ</th>
                    <th colspan="10">สิทธิการเข้าถึงเมนู</th>
                </tr>
                <tr>
                    <th width="80px" style="text-align: center">รายงาน</th>
                    <th width="80px" style="text-align: center">ขาย</th>
                    <th width="80px" style="text-align: center">ตั้งค่า</th>
                    <th width="80px" style="text-align: center">สต๊อก</th>
                    <th width="80px" style="text-align: center">สมาชิก</th>
                    <th width="80px" style="text-align: center">บัญชี</th>
                    <th width="80px" style="text-align: center">ลูกหนี้</th>
                    <th width="80px" style="text-align: center">ซ่อม</th>
                    <th width="80px" style="text-align: center">รับประกัน</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userTypes as $userType): ?>
                    <tr>
                        <td><?php echo $userType->name; ?></td>
                        <td align="center"><?php echo $icon[$userType->access_report]; ?></td>
                        <td align="center"><?php echo $icon[$userType->access_sale]; ?></td>
                        <td align="center"><?php echo $icon[$userType->access_config]; ?></td>
                        <td align="center"><?php echo $icon[$userType->access_stock]; ?></td>
                        <td align="center"><?php echo $icon[$userType->access_member]; ?></td>
                        <td align="center"><?php echo $icon[$userType->access_account]; ?></td>
                        <td align="center"><?php echo $icon[$userType->access_ar]; ?></td>
                        <td align="center"><?php echo $icon[$userType->access_repair]; ?></td>
                        <td align="center"><?php echo $icon[$userType->access_serial]; ?></td>
                        <td align="center">
                            <a href="index.php?r=config/usertypeform&id=<?php echo $userType->id; ?>" class="btn btn-success btn-sm">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="index.php?r=config/usertypedelete&id=<?php echo $userType->id; ?>" onclick="return confirm('ยืนยันการลบ')"
                               class="btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
