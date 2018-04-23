<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style type="text/css">
    th{
        white-space: nowrap;
    }

    .table {
        border-radius: 5px;
        width: 95%;
        margin: 0px auto;
        float: none;
    }
</style>
<table class="table table-bordered table-hover table-striped auto">
    <thead>
        <tr>
            <th>
                <i class=" ace-icon fa fa-list-ol bigger-120"></i>
                Sr. #</th>
         <th>
                <i class="ace-icon fa fa-user-md bigger-120"></i>
                System Doctor ID</th>
            <th>
                <i class="ace-icon fa fa-user-md bigger-120"></i>
                Name</th>
        
            <th>
                <i class="ace-icon fa fa-envelope-o bigger-120"></i>
                Messages</th>
            <th>
                <i class="ace-icon fa fa-user-md"></i>
                Designation</th>
            <th>
                <i class="ace-icon fa fa-university bigger-120"></i>
                Institute</th>
            <th>
                <i class="ace-icon fa fa-calendar bigger-120"></i>

                Date of joining</th>
            <th>
                <i class="ace-icon fa fa-list-ol bigger-120"></i>
                Registration #</th>
            <th>
                <i class=" ace-icon fa fa-file-o bigger-120"></i>
                Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        if ($doctors) {
            foreach ($doctors as $doctor) {
                ?>
        
                <tr>
                    
                    <td><?php echo ++$count;        
                    ?></td>
                    <td><?php echo $doctor->doc_id?></td>
                    <td><a href="<?php echo base_url(); ?>doctor?doctor_id=<?php echo $doctor->doc_id ?>"> <?php echo "Dr. " . $doctor->doc_fname; ?></a></td>
                    <?php
                    if ($doctor->read_status == 1) {

                        ?>
                    <td><a id="<?php echo $doctor->doc_id; ?>" class="read_status" href="<?php echo base_url(); ?>help?doctor_id=<?php echo $doctor->doc_id ?>"onclick="handleReadStatus(this.id)"><div style="color: black; text-transform:    ; font-weight: bolder; ">Messages</div></a></td>
                        <?php
                    } 
                        else{?>
                    <td><a href = "<?php echo base_url();?>help?doctor_id=<?php echo $doctor->doc_id?>">Messages</a></td>
                       
                    <?php
                }
                ?>
                <td><?php echo $doctor->doc_designation; ?></td>
                <td><?php echo $doctor->doc_workplace; ?></td>
                <td><?php echo $doctor->doc_joiningdate; ?></td>
                <td><?php echo $doctor->doc_regid; ?></td>
                <td><?php echo $doctor->status; ?></td>
            </tr>
        <?php
        }
        }
        else {
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
        }
        ?>

    </tbody>
</table>
<hr>

<!-- Pagination -->
<div class="row" style="margin-left: -130px;">
    <div class="col-md-12 text-center">
        <?php echo $links ?>
    </div>
</div>

<script>
    function handleReadStatus(clicked_id)
    {
        var doc_id = clicked_id;        
        var read_status =0;
        //Sending request to API
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open('GET', '<?php echo path_to_api; ?>Doctor/updateReadStatus?doc_id=' + doc_id + '&read_status=' + read_status, true);
        xmlhttp.send();

    }
</script>


</div>
</body>

</html>










