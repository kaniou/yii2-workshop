<div class="panel panel-info" style="margin-right: 20px">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-user"></span>
        ผู้ใช้ระบบ
    </div>
    <div class="panel-body">
        <a href="index.php?r=config/userform" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span>
            เพิ่มรายการ
        </a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>user</th>
                    <th>เบอร์โทร</th>
                    <th>อีเมล์</th>
                    <th>สาขา</th>
                    <th>กลุ่มผู้ใช้</th>
                    <th>วันที่บันทึก</th>
                    <th>สถานะ</th>
                    <th width="160px"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $n++; ?></td>
                        <td><?php echo $user->fname; ?></td>
                        <td><?php echo $user->lname; ?></td>
                        <td><?php echo $user->usr; ?></td>
                        <td><?php echo $user->tel; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->branch->name; ?></td>
                        <td><?php echo $user->userType->name; ?></td>
                        <td><?php echo $user->create_at; ?></td>
                        <td><?php echo $user->status; ?></td>
                        <td align="center">
                            <a href="index.php?r=config/userunblock&id=<?php echo $user->id; ?>"
                               class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-play"></span>
                            </a>
                            <a href="index.php?r=config/userblock&id=<?php echo $user->id; ?>"
                               class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-pause"></span>
                            </a>
                            <a href="index.php?r=config/userform&id=<?php echo $user->id; ?>"
                               class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="index.php?r=config/userdelete&id=<?php echo $user->id; ?>"
                               class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>