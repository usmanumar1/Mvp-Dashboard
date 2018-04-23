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
<table id="report" class="table table-bordered table-hover table-striped auto">
    <tbody>
        <tr>
            <th>
                <i class="ace-icon fa fa-question-circle bigger-120 "></i>

                User Question #</th>
            <th>
                <i class="ace-icon fa fa-question bigger-120 "></i>

                System Question #</th>
            <th>
                <i class=" ace-icon fa fa-mobile bigger-120"></i>

                Call ID</th>
            <th>
                <i class="ace-icon fa fa-bullhorn bigger-120" ></i>

                Question</th>
            <th>
                <i class="ace-icon fa fa-pencil-square-o bigger-120 " ></i>

                Answer</th>
            <th>
                <i class="ace-icon fa fa-wrench bigger-120" ></i>

                Action</th>
            <th>
                <i class="ace-icon fa fa-table bigger-120" ></i>

                Details
            </th>


        </tr>
    </tbody>
    <tbody>
        <?php
        $count = 0;
        if ($questions) {

            foreach ($questions as $question) {
                ?>
                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $question->question_id; ?></td>
                    <td><?php echo $question->call_id; ?></td>
                    <td>
                        <audio id="<?php echo "audio" . $question->question_id; ?>" controls>
                            <source src='<?php echo path_to_question . 'Q' . $question->question_id; ?>.wav' type="audio/wav">
                        </audio>

                        <?php
                        if ($question->trans_upload_status == 1) {
                            ?>
                            <br><button type="button" class=" popover btn btn-primary bigger-140" data-toggle="popover" title="Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $question->question_urdu ?>"> Urdu Transcription</button>
                            <br><button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title=" English" data-placement="top" data-trigger="focus"  data-content="<?php echo $question->question_english ?>"> English Transcription</button>
                            <br><button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="po$anpover" title="Roman Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $question->question_roman_urdu ?>">Roman Urdu Transcription</button>



                        <?php }
                        ?>
                    </td>
                    <td>
                        <?php
                        //Only display answer if it was a new question
                        if ($question->question_action == 1) {
                            //if doctor answered the question by audio
                            if ($question->answer_status == 1 && property_exists($question, "answer_id")) {
                                ?>
                                <audio controls>
                                    <source src='<?php echo path_to_doctor_answer . 'A' . $question->answer_id; ?>.wav' type="audio/wav">
                                </audio><br> <?php
                            }
                            if (property_exists($question, "answer_transcription")) {
                                ?>
                                 <button type="button" class=" popover btn btn-primary bigger-140" data-toggle="popover" title="Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $question->answer_urdu ?>"> Urdu Transcription</button>
                                <br> <button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title=" English" data-placement="top" data-trigger="focus"  data-content="<?php echo $question->answer_english ?>"> English Transcription</button>
                                <br><button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title="Roman Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $question->answer_roman_urdu ?>">Roman Urdu Transcription</button>


                                <?php
                            } else {
                                echo "No transcription available";
                            }
                        } else {
                            echo "N/A";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($question->question_action == 1) {
                            echo 'New Question';
                        } elseif ($question->question_action == 2) {
                            echo 'FAQ';
                        } elseif ($question->question_action == 3) {
                            echo 'Ignore';
                        } elseif ($question->question_action == 4) {
                            echo 'Irrelevant';
                        } elseif ($question->question_action == 5) {
                            echo 'Inappropriate';
                        } elseif ($question->question_action == 6) {
                            echo 'Inaudible';
                        } elseif ($question->question_action == 7) {
                            echo 'Unresponsive';
                        } elseif ($question->question_action == 0) {
                            echo 'N/A';
                        }
                        ?>
                    </td>
                    <td id="toggle" >
                        <p class="i_icon green bigger-140 fa fa-angle-double-down "></p></td>

                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>
                        <i class="ace-icon fa fa-question bigger-120" ></i>
                        Question Type</th>
                    <th>
                        <i class="ace-icon fa fa-weixin bigger-120" ></i>
                        FAQ Answer</th>
                    <th>
                        <i class="ace-icon fa fa-users bigger-120" ></i>
                        Publish Publicly</th>
                    <th>
                        <i class="ace-icon fa fa-clock-o bigger-120" ></i>
                        Time Lapse</th>
                    <th>
                        <i class=" ace-icon fa fa-file-o bigger-120"></i>
                        Publish Status (On hotine)</th>
                    <th colspan="2">
                        <i class=" ace-icon fa fa-pencil-square bigger-120"></i>

                        User has listened to answer</th>


                </tr>
                <tr>
                    <td>
                        <?php
                        if ($question->question_type == "Gyne") {
                            echo 'Gyne';
                        } elseif ($question->question_type == "GP") {
                            echo 'GP';
                        } elseif ($question->question_type == "Pediatrician") {
                            echo 'Pediatrician';
                        } elseif ($question->question_type == 0) {
                            echo 'N/A';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($question->question_action == 2) {
                            echo $question->faq;
                        } else {
                            echo "N/A";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($question->question_public_admin == 1) {
                            echo "Yes";
                        } else {
                            echo "No";
                        }
                        ?>
                    </td>
                    <td><div style="width: 200px;"></div>
                        <?php
                        if (in_array($question->question_action, array(1, 2, 3, 4, 5, 6, 7))) {
                            if ($question->answer_status == 1) {
                                echo "- Time b/w question recorded by user and answer published on hotline:$question->time_duration<br>";
                            } else {
                                echo "N/A";
                            }
                        } else {
                            echo "N/A";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        //if question was ignore, irrelevant etc
                        if (in_array($question->question_action, array(3, 4, 5, 6, 7))) {
                            echo "N/A";
                        } elseif ($question->answer_status == 1) {
                            echo "Yes";
                        } else {
                            echo "No";
                        }
                        ?>

                    </td>
                    <td colspan="2">N/A</td>
                </tr>
            </tbody>
            <?php
        }
    } else {
        ?>
        <tbody>
            <tr>
                <?php
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                ?>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th>Question Type</th>
                <th>FAQ Answer</th>
                <th>Publish Publicly</th>
                <th>Time Lapse</th>
                <th>Publish Status (On hotine)</th>
                <th>User has listened to answer</th>
            </tr>
            <tr>
                <?php
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
//                echo '<td></td>';
//                echo '<td></td>';
//                echo '<td></td>';
                ?>
            </tr>
        </tbody>
    <?php }
    ?>
</table>
<hr>

<!-- Pagination -->
<div class="row" style="margin-left: -130px;">
    <div class="col-md-12 text-center">
        <?php echo $links ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#report tbody:odd").addClass("odd");
        $("#report tbody:not(.odd)").hide();
        $("#report tbody:first-child").show();

        $(".odd #toggle p").click(function () {

            $(this).closest(".odd").next().toggle();
            $(this).closest(".i_icon").toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');

        });

    });

    $(".popover").popover();

</script>


</div>
</body>

</html>










