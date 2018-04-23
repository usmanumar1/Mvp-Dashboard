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
            <th >
                <i class="ace-icon fa fa-question-circle bigger-120 "></i>
                Question #
            </th>
            <th>
                <i class=" ace-icon fa fa-user bigger-120"></i>
                User ID 
            </th>
            <th>
                <i class=" ace-icon fa fa-mobile bigger-120"></i>
                Call ID
            </th>
            <th>
                <i class="ace-icon fa fa-bullhorn bigger-120" ></i>

                Question
            </th>
            <th><i class="ace-icon fa fa-clock-o bigger-120" ></i>
                Time Lapse</th>
            <th><i class="ace-icon fa fa-pencil-square-o bigger-120 " ></i>
                Answer</th>
            <th><i class="ace-icon fa fa-clock-o bigger-120" ></i>
                Time Lapse</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        if ($questions) {

            foreach ($questions as $question) {               
                ?>
<!--    <p dir="rtl">  <?=($question->question_urdu);
                ?></p>-->
                <tr>
                    <td><?php echo $question->question_id; ?></td>
                    <td><?php echo $question->user_id; ?></td>
                    <td><?php echo $question->call_id; ?></td>
                    <td>
                        <audio id="<?php echo "audio" . $question->question_id; ?>" controls>
                            <source src='<?php echo path_to_question . 'Q' . $question->question_id; ?>.wav' type="audio/wav">
                        </audio>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id = "<?php echo "question_urdu" . $question->question_id; ?>" readonly><?php if ($question->trans_upload_status == 1) {
            echo $question->question_urdu;
        } else {
            echo "Transcribe in Urdu here: ";
        } ?></textarea>
                            <textarea class="form-control" rows="5" id = "<?php echo "question_roman_urdu" . $question->question_id; ?>" readonly><?php if ($question->trans_upload_status == 1) {
            echo $question->question_roman_urdu;
        } else {
            echo "Transcribe in Roman Urdu here: ";
        } ?></textarea>
                            <textarea class="form-control" rows="5" id = "<?php echo "question_english" . $question->question_id; ?>" readonly><?php if ($question->trans_upload_status == 1) {
            echo $question->question_english;
        } else {
            echo "Transcribe in English here: ";
        } ?></textarea>
                        </div>
                        <div>
                            <button type="button" onclick="handleQuestionSaveButtonClick(this)" value="<?php echo $question->question_id; ?>" class="btn btn-success btn-round">Save
                                <i class="ace-icon fa fa-check-square-o icon-on-right bigger-110"></i>
                            </button>
                            <button type="button" onclick="handleQuestionEditButtonClick(this)" value="<?php echo $question->question_id; ?>" class="btn btn-info btn-round">Edit
                                <i class="ace-icon fa fa-pencil-square-o icon-on-right bigger-110"></i>
                            </button>
                        </div>




                    </td>
                    <td><div style="width: 200px;"></div><?php
                        if ($question->trans_upload_status == 1) {
                            echo "Time since question recorded by user and transcribed: $question->question_duration<br>";
                            echo "Date transcribed: $question->time_trans_uploaded";
                        } else {
                            echo "N/A";
                        }
                        ?> </td>
                    <td>
        <?php
        //Only display answer if it was a new question
        if ($question->question_action == 1) {
            if ($question->doc_answer_status == 1) {
                if (property_exists($question, "answer_file_id")) {
                    ?>
                                    <audio controls>
                                        <source src='<?php echo path_to_doctor_answer . 'A' . $question->answer_file_id; ?>.wav' type="audio/wav">
                                    </audio>

                <?php }
                ?>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" id = "<?php echo "answer_urdu" . $question->answer_id; ?>" readonly><?php if (property_exists($question, "answer_transcription")) {
                    echo $question->answer_urdu;
                } else {
                    echo "Transcribe in Urdu here: ";
                } ?></textarea>
                                    <textarea class="form-control" rows="5" id = "<?php echo "answer_roman_urdu" . $question->answer_id; ?>" readonly><?php if (property_exists($question, "answer_text")) {
                    echo $question->answer_text;
                } else {
                    echo "Transcribe in Roman Urdu here: ";
                } ?></textarea>
                                    <textarea class="form-control" rows="5" id = "<?php echo "answer_english" . $question->answer_id; ?>" readonly><?php if (property_exists($question, "answer_transcription")) {
                    echo $question->answer_english;
                } else {
                    echo "Transcribe in English here: ";
                } ?></textarea>
                                </div>
                                <div>
                                    <button type="button" onclick="handleAnswerSaveButtonClick(this)" value="<?php echo $question->answer_id; ?>"  class="btn btn-success btn-round">Save
                                        <i class="ace-icon fa fa-check-square-o icon-on-right bigger-110"></i>
                                    </button>
                                    <button type="button" onclick="handleAnswerEditButtonClick(this)" value="<?php echo $question->answer_id; ?>" class="btn btn-info btn-round">Edit
                                        <i class="ace-icon fa fa-pencil-square-o icon-on-right bigger-110"></i>
                                    </button>
                                </div>

                        <?php
                    } else {
                        echo "Not Answered yet by doctor";
                    }
                } else {
                    echo "N/A";
                }
                ?>
                    </td>
                    <td><div style="width: 200px;"></div>
        <?php
        if (property_exists($question, "answer_transcription")) {
            echo "Time since question received by doctor and transcribed: $question->answer_duration<br>";
            echo "Date transcribed: $question->time_transcription";
        } else {
            echo "N/A";
        }
        ?></td>
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
    //Saving a new question
    function handleQuestionSaveButtonClick(button) {
        var question_id = button.value;
        var question_urdu = $("#question_urdu" + question_id).val();
        var question_roman_urdu = $("#question_roman_urdu" + question_id).val();
        var question_english = $("#question_english" + question_id).val();

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#question_urdu" + question_id).attr('readonly', true);
                $("#question_roman_urdu" + question_id).attr('readonly', true);
                $("#question_english" + question_id).attr('readonly', true);
            }
        };
        xmlhttp.open("GET", "<?php echo path_to_api; ?>Question/saveQuestionTranscription?question_id=" + question_id + "&question_urdu=" + question_urdu + "&question_roman_urdu=" + question_roman_urdu + "&question_english=" + question_english, true);
        xmlhttp.send();

    }

    //Editing a question
    function handleQuestionEditButtonClick(button) {
        var question_id = button.value;
        $("#question_urdu" + question_id).removeAttr("readonly");
        $("#question_roman_urdu" + question_id).removeAttr("readonly");
        $("#question_english" + question_id).removeAttr("readonly");
        //$("#question_note" + question_id).focus();
    }


    //Saving a new answer
    function handleAnswerSaveButtonClick(button) {
        var answer_id = button.value;
        var answer_urdu = $("#answer_urdu" + answer_id).val();
        var answer_roman_urdu = $("#answer_roman_urdu" + answer_id).val();
        var answer_english = $("#answer_english" + answer_id).val();

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#answer_urdu" + answer_id).attr('readonly', true);
                $("#answer_roman_urdu" + answer_id).attr('readonly', true);
                $("#answer_english" + answer_id).attr('readonly', true);
            }
        };
        xmlhttp.open("GET", "<?php echo path_to_api; ?>Answer/saveAnswerTranscription?answer_id=" + answer_id + "&answer_urdu=" + answer_urdu + "&answer_roman_urdu=" + answer_roman_urdu + "&answer_english=" + answer_english, true);
        xmlhttp.send();

    }

    //Editing a answer
    function handleAnswerEditButtonClick(button) {
        var answer_id = button.value;
        $("#answer_urdu" + answer_id).removeAttr("readonly");
        $("#answer_roman_urdu" + answer_id).removeAttr("readonly");
        $("#answer_english" + answer_id).removeAttr("readonly");
        // $("#question_note" + question_id).focus();
    }



</script>

</div>
</body>

</html>










