<div class="panel panel-info" style="margin-right: 20px;">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-book"></span>
        ประเภทสินค้า
    </div>
    <div class="panel-body">
        <a href="index.php?r=producttype/form" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span>
            เพิ่มรายการ
        </a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ชื่อ</th>
                    <th>หมายเหตุ</th>
                    <th width="90px"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productTypes as $productType): ?>
                    <tr>
                        <td><?php echo $productType->name; ?></td>
                        <td><?php echo $productType->remark; ?></td>
                        <td align="center">
                            <a href="index.php?r=producttype/form&id=<?php echo $productType->id; ?>"
                               class="btn btn-success btn-sm">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="index.php?r=producttype/delete&id=<?php echo $productType->id; ?>"
                               onclick="return confirm('ยืนยันการลบ')"
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