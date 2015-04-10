<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Departemen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php if($x=$this->get_flash('department_success')) {?>
                    <div class="alert alert-success">
                        <?php echo $x;?>
                    </div>
                    <?php }?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Departemen
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" action="<?php echo $this->url('department/edit/' . $item['id']);?>">
                                        <div class="form-group">
                                            <label>Nama Order</label>
                                            <input name="name" value="<?php echo $item['name'];?>" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="description" class="form-control" rows="3"><?php echo $item['description'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Department Terkait</label>
                                            <?php foreach($items as $value) {
                                                if($value['id']!=$item['id']) { ?>
                                            
                                            <div class="checkbox">
                                                <label>
                                                    <input name="relevant_department[]" type="checkbox"<?php if(in_array($value['id'], $item['relevant_department'])) echo ' checked';?> value="<?php echo $value['id'];?>"><?php echo $value['name'];?>
                                                </label>
                                            </div>
                                            <?php }}?>
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