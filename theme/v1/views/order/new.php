<?php
$title='Order Baru';?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Order Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php if($x=$this->get_flash('order_success')) {?>
                    <div class="alert alert-success">
                        <?php echo $x;?>
                    </div>
                    <?php }?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Order Baru
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" action="<?php echo $this->url('order/new');?>">
                                        <div class="form-group">
                                            <label>Nama Order</label>
                                            <input name="name" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="description" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select name="department" class="form-control">
                                                <?php foreach($department as $value) {?>
                                                <option value="<?php echo $value['id'];?>"><?php echo $value['name']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default">Simpan</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->