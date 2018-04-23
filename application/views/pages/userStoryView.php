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
                <i class="ace-icon fa fa-list-ol bigger-120" ></i>
                User Story #</th>
            <th>
                <i class="ace-icon fa fa-window-maximize bigger-120" ></i>
                System Story #</th>
            <th>
                <i class="ace-icon fa fa-android bigger-120" ></i>
                Call ID</th>
            <th>
                <i class="ace-icon fa fa-file bigger-120" ></i>
                Publish Status (On hotine)</th>
            <th>
                <i class="ace-icon fa fa-tasks bigger-120" ></i>
                Story</th>
            <th>
                <i class="ace-icon fa fa-file-text-o bigger-120" ></i>
                Status</th>
            <th>
                <i class="ace-icon fa fa-clock-o bigger-120" ></i>
                Time Lapse</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        if ($stories) {

            foreach ($stories as $story) {
                ?>
                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $story->user_story_id; ?></td>
                    <td><?php echo $story->call_id; ?></td>
                    <td><?php
                        if ($story->approve_status == 1) {
                            echo "Yes";
                        } else {
                            echo "No";
                        }
                        ?>
                    </td>
                    <td>
                        <audio id="<?php echo "audio" . $story->user_story_id; ?>" controls>
                            <source src='<?php echo path_to_story . $story->user_story_id; ?>.wav' type="audio/wav">
                        </audio>

                        <?php
                        if ($story->trans_upload_status == 1) {
                            ?>
                            <br><button type="button" class=" popover btn btn-primary bigger-140" data-toggle="popover" title="Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $story->story_urdu ?>"> Urdu Transcription</button>
                            <br><button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title=" English" data-placement="top" data-trigger="focus"  data-content="<?php echo $story->story_english ?>"> English Transcription</button>
                            <button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title="Roman Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $story->story_roman_urdu ?>">Roman Urdu Transcription</button>



                        <?php }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($story->approve_status == 1) {
                            echo 'Approved';
                        } elseif ($story->approve_status == 2) {
                            echo 'Rejected';
                        } else {
                            echo 'Pending';
                        }
                        ?>
                    </td>
                    <td><div style="width: 200px;"></div>
                        <?php
                        if ($story->approve_status == 1) {
                            echo "- Time b/w story recorded by user and getting it published on hotline:$story->time_duration<br>";
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
    $(".popover").popover();
</script>
</div>
</body>

</html>










