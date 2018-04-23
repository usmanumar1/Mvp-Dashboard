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
                Doctor Name</th>
            <th>
                <i class="ace-icon fa fa-user-md bigger-120"></i>
                System Doctor ID</th>
            <th>
                <i class="ace-icon fa fa-user-md bigger-120"></i>
                Designation</th>

            <th>
                <i class="ace-icon fa fa-envelope-o bigger-120"></i>
                Workplace</th>
            <th>
                <i class="ace-icon fa fa-user-md"></i>
                Date Signup</th>
            <th>
                <i class="ace-icon fa fa-university bigger-120"></i>
                Approve</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        if ($doctors) {
            foreach ($doctors as $doctor) {
                ?>

                <tr>

                                        <!--                    <td><?php echo ++$count;
                ?></td>-->
                    <td><a href="<?php echo base_url(); ?>doctor?doctor_id=<?php echo $doctor->doc_id ?>"> <?php echo "Dr. " . $doctor->doc_fname; ?></a></td>
                    <td><?php echo $doctor->doc_id ?></td>
                    <td><?php echo $doctor->doc_designation; ?></td>
                    <td><?php echo $doctor->doc_workplace; ?></td>
                    <td><?php echo $doctor->doc_joiningdate; ?></td>
                    <td>                
                        <button type="button" id = "<?php echo "btn-status" . $doctor->doc_id; ?>" onclick="handleApproveDoctorClick(this)" value="<?php echo $doctor->doc_id; ?>" class="btn btn-primary">
                            Approve
                        </button>
                    </td>
                </tr>
                <?php
            }
        } else {
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
        var read_status = 0;
        //Sending request to API
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open('GET', '<?php echo path_to_api; ?>Doctor/updateReadStatus?doc_id=' + doc_id + '&read_status=' + read_status, true);
        xmlhttp.send();

    }
    
     function handleApproveDoctorClick(button) {
        var doctor_id = button.value;
        //Sending request to API
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open('GET', '<?php echo path_to_api; ?>Doctor/updateDoctorApproveStatus?doctor_id=' + doctor_id , true);
        xmlhttp.send();
    }
</script>


</div>
</body>

</html>










