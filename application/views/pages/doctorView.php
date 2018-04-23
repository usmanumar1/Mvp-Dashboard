<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">

    .table {
        border-radius: 5px;
        width: 45%;
        margin: 0px auto;
        float: none;
    }
</style>
<table class="table table-bordered table-hover table-striped auto">
    <tbody>
        <tr>
            <td colspan="6"><?php echo "Dr. " . $doctor->doc_fname . " " . $doctor->doc_lname . ", DID#: " . $doctor->doc_id; ?></td>
            <td colspan="6"><?php echo $doctor->doc_type; ?></td>
        </tr>
        <tr><th>Doctor Name:</th><td colspan="12"><?php echo $doctor->doc_fname . " " . $doctor->doc_lname; ?></td></tr>
        <tr><th>Email ID:</th><td colspan="12"><?php echo $doctor->doc_email; ?></td></tr>
        <tr><th>Cell No:</th><td colspan="12"><?php echo $doctor->doc_phoneno; ?></td></tr>
        <tr><th>Registration ID:</th><td colspan="12"><?php echo $doctor->doc_regid; ?></td></tr>
        <tr><th>Work Place:</th><td colspan="12"><?php echo $doctor->doc_workplace; ?></td></tr>
        <tr><th>Designation:</th><td colspan="12"><?php echo $doctor->doc_designation; ?></td></tr>
        <tr><th>Joining Date:</th><td colspan="12"><?php echo $doctor->doc_joiningdate; ?></td></tr>
<!--        <tr><td colspan="12"><?php echo "Date of joining: " . $doctor->doc_joiningdate; ?></td></tr>-->
        <tr><th>Number Of Questions Answered:</th><td colspan="12"><?php echo $doctor->answer_total; ?></td></tr>
        <tr><th>Average Response Time:</th><td colspan="12"><?php echo $doctor->average_time; ?></td></tr>
    </tbody>
</table>
<hr>


<script>


</script>

</div>
</body>

</html>










