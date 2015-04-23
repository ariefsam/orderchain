<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Order Detail</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo $item['name'] ?> - Order id:<?= $item['id']; ?>
            </div>
            <div class="panel-body">
                <p><?php echo nl2br($item['description']) ?></p>
                <p>
                    <h3>Pindahkan Order ke:</h3>
                    <?php
                    $i = 0;
                    $btn = ['primary', 'success', 'info', 'warning', 'danger', 'default'];
                    foreach ($department['relevant_department_data'] as $key => $value):
                        ?>
                    
                    <button type="button" onclick="move_to(<?= $key; ?>, '<?= $value['name']; ?>')" class="btn btn-<?php echo $btn[$i % 6]; ?>"><?= $value['name'] ?></button>
                    <?php $i++;
                endforeach; ?>
                </p>
            </div>
            <div class="panel-footer">
<?php echo $item['department_name']; ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">History Order</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                History Order
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-order">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Posisi Department</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($items as $value) {
                                $date = DateTime::createFromFormat('Y-m-d H:i:s', $value['date']);
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $date->format('j M Y H:i:s'); ?></td>
                                    <td><?php echo $value['department_name'] ?></td>
                                    <td class="center">
                                        <a href="<?php echo $this->url('order/detail/' . $value['id']); ?>" title="Detail" class="btn btn-success btn-circle">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </td>
                                </tr>
    <?php $i++;
} ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>
<?php
$themeurl = phpsam::$theme_url;
@$script.="<link href=\"{$themeurl}assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css\" rel=\"stylesheet\">"
        . "<link href=\"{$themeurl}assets/bower_components/datatables-responsive/css/dataTables.responsive.css\" rel=\"stylesheet\">"
        . "<!-- DataTables JavaScript -->"
        . "<script src=\"{$themeurl}assets/bower_components/DataTables/media/js/jquery.dataTables.min.js\"></script>"
        . "<script src=\"{$themeurl}assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js\"></script>"
        . "<script>
    $(document).ready(function() {
        $('#dataTables-order').DataTable({
                responsive: true
        });
    });
    </script>"
;
?>
<script type="text/javascript">
    function move_to(id, name) {
        if (confirm('Yakin hendak memindahkan order ke ' + name + '?')) {
            window.location = '<?= $this->url('order/move/' . $item['id'] . '/'); ?>' + id;
        }
    }
</script>