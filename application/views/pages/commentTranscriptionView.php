<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
    th{
        white-space: nowrap;
    }
    .form-control {
        width: 250px;
        height: 150px;
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
                Story #</th>
            <th>
                <i class=" ace-icon fa fa-list bigger-120"></i>
                Comment #</th>
            <th >
                <i class=" ace-icon fa fa-user bigger-120"></i>
                User ID 
            </th>
            <th >
                <i class=" ace-icon fa fa-mobile bigger-120"></i>
                Call ID
            </th>
            <th>
                <i class=" ace-icon fa fa-comment bigger-120"></i>
                Comment</th>
            <th>
                <i class="ace-icon fa fa-clock-o bigger-120" ></i>
                Comment Time Lapse</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        if ($comments) {

            foreach ($comments as $comment) {
                ?>
                <tr>
                    <td>
                        <audio id="<?php echo "audio" . $comment->comment_id; ?>" controls>
                            <source src='<?php echo path_to_story . $comment->story_id; ?>.wav' type="audio/wav">
                        </audio>
                    </td>
                    <td><?php echo $comment->comment_id; ?></td>
                    <td><?php echo $comment->user_id; ?></td>
                    <td><?php echo $comment->call_id; ?></td>
                    <td>
                        <audio id="<?php echo "audio" . $comment->comment_id; ?>" controls>
                            <source src='<?php echo path_to_comment . $comment->comment_id; ?>.wav' type="audio/wav">
                        </audio><br>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id = "<?php echo "comment_urdu" . $comment->comment_id; ?>" readonly><?php if ($comment->trans_upload_status == 1) {
            echo $comment->comment_urdu;
        } else {
            echo "Transcribe in Urdu here: ";
        } ?></textarea>
                            <textarea class="form-control" rows="5" id = "<?php echo "comment_roman_urdu" . $comment->comment_id; ?>" readonly><?php if ($comment->trans_upload_status == 1) {
            echo $comment->comment_roman_urdu;
        } else {
            echo "Transcribe in Roman Urdu here: ";
        } ?></textarea>
                            <textarea class="form-control" rows="5" id = "<?php echo "comment_english" . $comment->comment_id; ?>" readonly><?php if ($comment->trans_upload_status == 1) {
            echo $comment->comment_english;
        } else {
            echo "Transcribe in English here: ";
        } ?></textarea>
                        </div>
                        <div>
                            <button type="button" onclick="handleCommentSaveButtonClick(this)" value="<?php echo $comment->comment_id; ?>" class="btn btn-success btn-round">Save
                                <i class="ace-icon fa fa-check-square-o icon-on-right bigger-110"></i>
                            </button>
                            <button type="button" onclick="handleCommentEditButtonClick(this)" value="<?php echo $comment->comment_id; ?>" class="btn btn-info btn-round">Edit
                                <i class="ace-icon fa fa-pencil-square-o icon-on-right bigger-110"></i>
                            </button>
                        </div>
                    </td>
                    <td><div style="width: 200px;"></div><?php
                if ($comment->trans_upload_status == 1) {
                    echo "Time since comment recorded by user and transcribed: $comment->comment_duration<br>";
                    echo "Date transcribed: $comment->time_trans_uploaded";
                } else {
                    echo "N/A";
                }
                ?>
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
    //Saving a new question
    function handleCommentSaveButtonClick(button) {
        var comment_id = button.value;
        var comment_urdu = $("#comment_urdu" + comment_id).val();
        var comment_roman_urdu = $("#comment_roman_urdu" + comment_id).val();
        var comment_english = $("#comment_english" + comment_id).val();

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#comment_urdu" + comment_id).attr('readonly', true);
                $("#comment_roman_urdu" + comment_id).attr('readonly', true);
                $("#comment_english" + comment_id).attr('readonly', true);
            }
        };
        xmlhttp.open("GET", "<?php echo path_to_api; ?>Story/saveCommentTranscription?comment_id=" + comment_id + "&comment_urdu=" + comment_urdu + "&comment_roman_urdu=" + comment_roman_urdu + "&comment_english=" + comment_english, true);
        xmlhttp.send();

    }

    //Editing a comment
    function handleCommentEditButtonClick(button) {
        var comment_id = button.value;
        $("#comment_urdu" + comment_id).removeAttr("readonly");
        $("#comment_roman_urdu" + comment_id).removeAttr("readonly");
        $("#comment_english" + comment_id).removeAttr("readonly");
        //$("#comment_note" + comment_id).focus();
    }
 
</script>

</div>
</body>

</html>










