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
                <?php echo $item['name']?> - Order id:<?=$item['id'];?>
            </div>
            <div class="panel-body">
                <p><?php echo nl2br($item['description'])?></p>
                <p>
                    <?php
                    $i=0;
                    $btn=['primary','success','info','warning','danger','default'];
                    foreach($department['relevant_department_data'] as $key=>$value):
                    ?>
                <h3>Pindahkan Order ke:</h3>
                    <button type="button" onclick="move_to(<?=$key;?>,'<?=$value['name'];?>')" class="btn btn-<?php echo $btn[$i%6];?>"><?= $value['name']?></button>
                    <?php $i++; endforeach;?>
                </p>
            </div>
            <div class="panel-footer">
                <?php echo $item['department_name'];?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function move_to(id,name) {
        if(confirm('Yakin hendak memindahkan order ke ' + name + '?')) {
            window.location='<?=$this->url('order/move/'.$item['id'].'/');?>' + id;
        }
    }
</script>