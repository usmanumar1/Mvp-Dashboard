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
                <i class=" ace-icon fa fa-list-ol bigger-120"></i>
                Story #
            </th>
            <th >
                <i class=" ace-icon fa fa-user bigger-120"></i>
                User ID 
            </th>
            <th >
                <i class=" ace-icon fa fa-mobile bigger-120"></i>
                Call ID
            </th>
            <th>
                <i class=" ace-icon fa fa-tasks"></i>
                Story</th>
            <th colspan="2">
                <i class=" ace-icon fa fa-clock-o"></i>
                Story Time Lapse</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        if ($stories) {

            foreach ($stories as $story) {
                ?>
                <tr>
                    <td><?php echo $story->user_story_id; ?></td>
                    <td><?php echo $story->user_id; ?></td>
                    <td><?php echo $story->call_id; ?></td>
                    <td>
                        <audio id="<?php echo "audio" . $story->user_story_id; ?>" controls>
                            <source src='<?php echo path_to_story . $story->user_story_id; ?>.wav' type="audio/wav">
                        </audio><br>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id = "<?php echo "story_urdu" . $story->user_story_id; ?>" readonly><?php if ($story->trans_upload_status == 1) {
            echo $story->story_urdu;
        } else {
            echo "Transcribe in Urdu here: ";
        } ?></textarea>
                            <textarea class="form-control" rows="5" id = "<?php echo "story_roman_urdu" . $story->user_story_id; ?>" readonly><?php if ($story->trans_upload_status == 1) {
            echo $story->story_roman_urdu;
        } else {
            echo "Transcribe in Roman Urdu here: ";
        } ?></textarea>
                            <textarea class="form-control" rows="5" id = "<?php echo "story_english" . $story->user_story_id; ?>" readonly><?php if ($story->trans_upload_status == 1) {
            echo $story->story_english;
        } else {
            echo "Transcribe in English here: ";
        } ?></textarea>
                        </div>
                        <div>
                            <button type="button" onclick="handleStorySaveButtonClick(this)" value="<?php echo $story->user_story_id; ?>" class="btn btn-success btn-round">Save
                                <i class="ace-icon fa fa-check-square-o icon-on-right bigger-110"></i>
                            </button>
                            <button type="button" onclick="handleStoryEditButtonClick(this)" value="<?php echo $story->user_story_id; ?>" class="btn btn-info btn-round">Edit
                                <i class="ace-icon fa fa-pencil-square-o icon-on-right bigger-110"></i>
                            </button>
                        </div>

                    </td>
                    <td><div style="width: 200px;"></div><?php
                if ($story->trans_upload_status == 1) {
                    echo "Time since story recorded by user and transcribed: $story->story_duration<br>";
                    echo "Date transcribed: $story->time_trans_uploaded";
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
    function handleStorySaveButtonClick(button) {
        var story_id = button.value;
        var story_urdu = $("#story_urdu" + story_id).val();
        var story_roman_urdu = $("#story_roman_urdu" + story_id).val();
        var story_english = $("#story_english" + story_id).val();

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#story_urdu" + story_id).attr('readonly', true);
                $("#story_roman_urdu" + story_id).attr('readonly', true);
                $("#story_english" + story_id).attr('readonly', true);
            }
        };
        xmlhttp.open("GET", "<?php echo path_to_api; ?>Story/saveStoryTranscription?story_id=" + story_id + "&story_urdu=" + story_urdu + "&story_roman_urdu=" + story_roman_urdu + "&story_english=" + story_english, true);
        xmlhttp.send();

    }

    //Editing a story
    function handleStoryEditButtonClick(button) {
        var story_id = button.value;
        $("#story_urdu" + story_id).removeAttr("readonly");
        $("#story_roman_urdu" + story_id).removeAttr("readonly");
        $("#story_english" + story_id).removeAttr("readonly");
        //$("#story_note" + story_id).focus();
    }

     

</script>

</div>
</body>

</html>










