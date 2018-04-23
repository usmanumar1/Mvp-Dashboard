<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<style type="text/css">
    th{
        white-space: nowrap;
    }
  
     .table {
    border-radius: 5px;
    width: 45%;
    margin: 0px auto;
    float: none;
}
</style>
<table class="table table-bordered table-hover table-striped auto">
    <tbody>
        <tr><th>User ID</th><td><?php echo $user->user_id?></td></tr>
        <tr><th>Status</th><td><?php echo $user->status?></tr>
        <tr><th>Questions</th><td><a target="_blank" href="<?php echo base_url();?>user_questions?user_id=<?php echo $user->user_id?>">Questions</a></td></tr>
        <tr><th>Stories</th><td><a target="_blank" href="<?php echo base_url();?>user_stories?user_id=<?php echo $user->user_id?>"> Stories</a></td></tr>
        <tr><th>Feedback</th><td><a target="_blank" href="<?php echo base_url();?>user_feedback?user_id=<?php echo $user->user_id?>"> Feedback</a></td></tr>
        <tr><th>Total Questions</th><td><?php echo $user->user_question_total;?></td></tr>
        <tr><th>Total Feedback</th><td><?php echo $user->user_feedback_total;?></td></tr>
        <tr><th>Total Calls</th><td><?php echo $user->user_calls_total;?></td></tr>
        <tr><th>Total Forwards</th><td><?php echo $user->user_forward_total;?></td></tr>
        <tr><th>Total inappropriate questions</th><td><?php echo $user->user_inappropriate_total;?></td></tr>

    </tbody>
</table>
<hr>
<script>

</script>
</div>
</body>

</html>










