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
            <th >
                <i class=" ace-icon fa fa-user bigger-120"></i>
                User ID 
            </th>
            <th >
                <i class=" ace-icon fa fa-mobile bigger-120"></i>
                Call ID
            </th>
            <th>
                <i class="ace-icon fa fa-clock-o bigger-120" ></i>
                Time Recorded</th>
            <th> 
                <i class="ace-icon fa fa-comments bigger-120" ></i>

                Feedback</th>
           
                 
            <th>
                <i class="ace-icon fa fa-pencil-square-o bigger-120" ></i>

                Mark As</th>
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
                    <td><?php echo $feedback->time_recorded; ?></td>
                    <td>
                        <audio id="<?php echo "audio" . $feedback->feedback_id; ?>" controls>
                            <source src='<?php echo path_to_feedback . $feedback->feedback_id; ?>.wav' type="audio/wav">
                        </audio><br>

                        <?php
                        if ($feedback->trans_upload_status == 1) {
                            ?>
                            <button type="button" class=" popover btn btn-primary bigger-140" data-toggle="popover" title="Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $feedback->feedback_urdu ?>"> Urdu Transcription</button>
                            <button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title=" English" data-placement="top" data-trigger="focus"  data-content="<?php echo $feedback->feedback_english ?>"> English Transcription</button>
                            <button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title="Roman Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $feedback->feedback_roman_urdu ?>">Roman Urdu Transcription</button>


                        <?php }
                        ?>
                    </td>
                    
                           <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="<?php echo "btnStatus" . $feedback->feedback_id; ?>" data-toggle="dropdown">
                                <?php
                                if ($feedback->status == "Constructive") {
                                    echo "Constructive";
                                } elseif ($feedback->status == "Irrelevant") {
                                    echo "Irrelevant";
                                } elseif ($feedback->status == "Inaudible") {
                                    echo "Inaudible";
                                } else {
                                    echo "Please Select:";
                                }
                                ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" id="<?php echo $feedback->feedback_id; ?>">
                                <li><a href="#">Constructive</a></li>
                                <li><a href="#">Irrelevant</a></li>
                                <li><a href="#">Inaudible</a></li>
                            </ul>
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
    //When status of a feedback is changed
    $('.dropdown-menu li a').on('click', function () {
        var feedback_id = $(this).parent().parent().attr('id');
        var status = $(this).text();
        var approved;

        if (status == "Constructive")
        {
            approved = "Constructive";
        } else if (status == "Irrelevant")
        {
            approved = "Irrelevant";
        } else if (status == "Inaudible")
        {
            approved = "Inaudible";
        }


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                $("#btnStatus" + feedback_id).html(status + " " + '<span class="caret"></span>');
            }
        };
        xmlhttp.open('GET', '<?php echo path_to_api; ?>Feedback/updateFeedbackStatus?feedback_id=' + feedback_id + '&approved=' + approved, true);
        xmlhttp.send();
    });
    $(".popover").popover();

</script>

</div>
</body>

</html>










