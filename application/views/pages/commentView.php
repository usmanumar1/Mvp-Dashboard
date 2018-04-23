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
                <i class=" ace-icon fa fa-comments bigger-120"></i>
                Feedback #</th>
            <th>
                <i class=" ace-icon fa fa-list-ol bigger-120"></i>
                Story #</th>
            <th>
                <i class=" ace-icon fa fa-calendar bigger-120"></i>
                Date Recorded</th>
            <th>
                <i class=" ace-icon fa fa-comment bigger-120"></i>
                Comment</th>
            <th>
                <i class=" ace-icon fa fa-pencil-square-o bigger-120"></i>
                Mark As</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        if ($comments) {

            foreach ($comments as $comment) {
                ?>
                <tr>
                    <td><?php echo $comment->comment_id; ?></td>
                    <td><?php echo $comment->story_id; ?></td>
                    <td><?php echo $comment->time_recorded; ?></td>
                    <td>
                        <audio id="<?php echo "audio" . $comment->comment_id; ?>" controls>
                            <source src='<?php echo path_to_comment . $comment->comment_id; ?>.wav' type="audio/wav">
                        </audio>
                    </td>
                    <td>
                        <div>
                            <button type="button" id = "<?php echo "btn-status" . $comment->comment_id; ?>" onclick="handleStatusClick(this)" class="btn btn-info" value="<?php echo $comment->comment_id; ?>">
                                <?php
                                if ($comment->approve_status == 1) {
                                    echo "Disapprove";
                                } else {
                                    echo "Approve";
                                }
                                ?>
                            </button>
                        </div>
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
    function handleStatusClick(button)
    {
        var admin_id = <?php echo $this->session->admin_id ?>;
        var comment_id = button.value;
        var status;

        //Getting button text and setting status value
        var text = $('#btn-status' + comment_id).text();
        var trimStr = $.trim(text);
        if (trimStr === "Approve") {
            status = 1;
        } else {
            status = 0;
        }
        //Sending request to API
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //Setting alternate text
                if (trimStr === "Approve") {
                    $('#btn-status' + comment_id).html('Disapprove');
                } else {
                    $('#btn-status' + comment_id).html('Approve');
                }
            }
        };
        xmlhttp.open('GET', '<?php echo path_to_api; ?>Story/updateCommentStatus?comment_id=' + comment_id + '&status=' + status, true);
        xmlhttp.send();
    }
</script>

</div>
</body>

</html>










