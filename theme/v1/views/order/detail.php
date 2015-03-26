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
                <?php echo $item['name']?>
            </div>
            <div class="panel-body">
                <p><?php echo $item['description']?></p>
            </div>
            <div class="panel-footer">
                <?php echo $item['department_name'];?>
            </div>
        </div>
    </div>
</div>