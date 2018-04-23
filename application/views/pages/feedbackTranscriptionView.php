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
                <i class="ace-icon fa fa-list-ol bigger-120 "></i>
                Feedback #</th>
            <th>
                <i class="ace-icon fa fa-user bigger-120 "></i>

                User ID</th>
            <th>
                <i class="ace-icon fa fa-mobile bigger-120 "></i>

                Call ID</th>
            <th>
                <i class="ace-icon fa fa-comments bigger-120 "></i>

                Feedback</th>
            <th>
                <i class="ace-icon fa fa-clock-o bigger-120 "></i>

                Feedback Time Lapse</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        if ($feedbacks) {

            foreach ($feedbacks as $feedback) {
                ?>
                <tr>
                    <td><?php echo $feedback->feedback_id; ?></td>
                    <td><?php echo $feedback->user_id; ?></td>
                    <td><?php echo $feedback->call_id; ?></td>
                    <td>
                        <audio id="<?php echo "audio" . $feedback->feedback_id; ?>" controls>
                            <source src='<?php echo path_to_feedback . $feedback->feedback_id; ?>.wav' type="audio/wav">
                        </audio><br>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id = "<?php echo "feedback_urdu" . $feedback->feedback_id; ?>" readonly><?php if ($feedback->trans_upload_status == 1) {
            echo $feedback->feedback_urdu;
        } else {
            echo "Transcribe in Urdu here: ";
        } ?></textarea>
                            <textarea class="form-control" rows="5" id = "<?php echo "feedback_roman_urdu" . $feedback->feedback_id; ?>" readonly><?php if ($feedback->trans_upload_status == 1) {
            echo $feedback->feedback_roman_urdu;
        } else {
            echo "Transcribe in Roman Urdu here: ";
        } ?></textarea>
                            <textarea class="form-control" rows="5" id = "<?php echo "feedback_english" . $feedback->feedback_id; ?>" readonly><?php if ($feedback->trans_upload_status == 1) {
            echo $feedback->feedback_english;
        } else {
            echo "Transcribe in English here: ";
        } ?></textarea>
                        </div>
                        <div>
                            <button type="button" onclick="handleFeedbackSaveButtonClick(this)" value="<?php echo $feedback->feedback_id; ?>" class="btn btn-success btn-round">Save
                                <i class="ace-icon fa fa-check-square-o icon-on-right bigger-110"></i>
                            </button>
                            <button type="button" onclick="handleFeedbackEditButtonClick(this)" value="<?php echo $feedback->feedback_id; ?>" class="btn btn-info btn-round">Edit
                                <i class="ace-icon fa fa-pencil-square-o icon-on-right bigger-110"></i>
                            </button>
                        </div>

                    </td>
                    <td><div style="width: 200px;"></div><?php
                if ($feedback->trans_upload_status == 1) {
                    echo "Time since feedback recorded by user and transcribed: $feedback->feedback_duration<br>";
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
    function handleFeedbackSaveButtonClick(button) {
        var feedback_id = button.value;
        var feedback_urdu = $("#feedback_urdu" + feedback_id).val();
        var feedback_roman_urdu = $("#feedback_roman_urdu" + feedback_id).val();
        var feedback_english = $("#feedback_english" + feedback_id).val();

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#feedback_urdu" + feedback_id).attr('readonly', true);
                $("#feedback_roman_urdu" + feedback_id).attr('readonly', true);
                $("#feedback_english" + feedback_id).attr('readonly', true);
            }
        };
        xmlhttp.open("GET", "<?php echo path_to_api; ?>Feedback/saveFeedbackTranscription?feedback_id=" + feedback_id + "&feedback_urdu=" + feedback_urdu + "&feedback_roman_urdu=" + feedback_roman_urdu + "&feedback_english=" + feedback_english, true);
        xmlhttp.send();

    }

    //Editing a feedback
    function handleFeedbackEditButtonClick(button) {
        var feedback_id = button.value;
        $("#feedback_urdu" + feedback_id).removeAttr("readonly");
        $("#feedback_roman_urdu" + feedback_id).removeAttr("readonly");
        $("#feedback_english" + feedback_id).removeAttr("readonly");
        //$("#feedback_note" + feedback_id).focus();
    }

</script>

</div>
</body>

</html>










