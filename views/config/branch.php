<div class="panel panel-info" style="margin-right: 20px">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-th-large"></span>
        <strong>สาขา</strong>
    </div>
    <div class="panel-body">
        <a href="index.php?r=config/branchform" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span>
            เพิ่มรายการ
        </a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="200px">ชื่อ</th>
                    <th width="200px">เบอร์โทร</th>
                    <th>ที่ตั้ง</th>
                    <th width="90px"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($branchs as $branch): ?>
                    <tr>
                        <td><?php echo $branch->name; ?></td>
                        <td><?php echo $branch->tel; ?></td>
                        <td><?php echo $branch->address; ?></td>
                        <td aligh="center">
                            <a href="index.php?r=config/branchform&id=<?php echo $branch->id; ?>"
                               class="btn btn-success btn-sm">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="index.php?r=config/branchdelete&id=<?php echo $branch->id; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('ยืนยันการลบ')">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

