<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<style type="text/css">
    th{
        white-space: nowrap;
    }
   
     .table {
    border-radius: 5px;
    width: 65%;
    margin: 0px auto;
    float: none;
}
</style>
<table class="table table-bordered table-hover table-striped  col-lg-4 ">
        <thead class="thead-inverse">
    <tr>
        <th>
            <i class="ace-icon fa fa-list-ol bigger-120" ></i>
            Sr. #</th>
        <th  style="margin: 200px;">
            <i class="ace-icon fa fa-user bigger-120" ></i>
            User ID</th>
    </tr>
    </thead>
    
    <tbody>
    <?php
    $count = 0;
    if($users) {
        foreach ($users as $user) {
            ?>
            <tr>
                <td><?php echo ++$count?></td>
                <td><a  href="<?php echo base_url();?>user?user_id=<?php echo $user->userid?>"> <?php echo $user->userid; ?></a></td>

            </tr>
        <?php }
    }
    else
    {
        echo '<td></td>';
        echo '<td></td>';
    }?>

    </tbody>
</table>


<!-- Pagination -->
<div class="row" style="margin-left: -100px;">
    <div class="col-md-12 text-center">
        <?php echo $links ?>
    </div>
</div>



</div>
</body>

</html>










