
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Departemen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Departemen Aktif
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-order">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Departemen</th>
                                            <th>Deskripsi</th>
                                            <th>Departemen Terkait</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        foreach($items as $value) {?>
                                        <tr class="odd gradeX">
                                            <td><?= $i;?></td>
                                            <td><?= $value['name']?></td>
                                            <td><?= $value['description']?></td>
                                            <td><?=$value['relevant_department_text']?></td>
                                            <td class="center">
                                                <a href="<?= $this->url('department/detail/' . $value['id']);?>" title="Detail" class="btn btn-success btn-circle">
                                                    <i class="fa fa-link"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $themeurl=phpsam::$theme_url;
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
            ;?>