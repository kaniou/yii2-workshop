<div class="panel panel-info" style="margin-right: 20px;">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-cloud"></span>
        <strong>คลังสินค้า</strong>
    </div>
    <div class="panel-body">
        <a href="index.php?r=config/storeform" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="200px">ชื่อ</th>
                    <th width="200px">เบอร์โทร</th>
                    <th>ที่ตั้ง</th>
                    <th width="200px">สาขา</th>
                    <th width="90px"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stores as $store): ?>
                    <tr>
                        <td><?php echo $store->name; ?></td>
                        <td><?php echo $store->tel; ?></td>
                        <td><?php echo $store->address; ?></td>
                        <td><?php echo $store->branch->name; ?></td>
                        <td align="center">
                            <a href="index.php?r=config/storeform&id=<?php echo $store->id; ?>" class="btn btn-success btn-sm">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="index.php?r=config/storedelete&id=<?php echo $store->id; ?>" class="btn btn-danger btn-sm"
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
