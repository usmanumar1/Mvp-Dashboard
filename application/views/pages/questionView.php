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
<table id="report" class="table table-bordered table-hover table-striped auto">
    <tbody>

        <tr>
            <th>
                <i class="ace-icon fa fa-question-circle bigger-120 "></i>
                Question #
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
                <i class="ace-icon fa fa-user-md bigger-120"></i>
                Doctor`s Name
            </th>
            <th>
                <i class="ace-icon fa fa-bullhorn bigger-120" ></i>

                Question
            </th>
            <th>
                <i class="fa fa-clock bigger-120"></i>
                Time Question Recorded
            </th>
            <th>
                <i class="ace-icon fa fa-table bigger-120" ></i>

                Details
            </th>

        </tr>

    </tbody>      



    <tbody>


        <?php
        //$count = 0;
        if ($questions) {

            foreach ($questions as $question) {
                ?>
                <tr>
                    <td><?php echo $question->question_id; ?></td>
                    <td><?php echo $question->user_id; ?></td>
                    <td><?php echo $question->call_id; ?></td>
                    <td>
                        <?php
                        //Only get doctor name if its a new question and answered
                        if ($question->question_action == 1) {
                            if ($question->doc_answer_status == 1) {
                                echo "Dr. " . $question->doctor_name;
                            } else {
                                echo "not answered yet by doctor";
                            }
                        } elseif ($question->question_action == 2) {
                            echo "answered by FAQ";
                        } else {
                            echo "N/A";
                        }
                        ?>
                    </td>
                    <td>
                        <audio id="<?php echo "audio" . $question->question_id; ?>" controls>
                            <source src='<?php echo path_to_question . 'Q' . $question->question_id; ?>.wav' type="audio/wav">
                        </audio>

                        <?php
                        if ($question->trans_upload_status == 1) {
                            ?>
                            <br> <button type="button" class=" popover btn btn-primary bigger-140" data-toggle="popover" title="Urdu" data-placement="top" data-trigger=""  data-content="<?php echo $question->question_urdu ?>"> Urdu Transcription</button>
                            <button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title=" English" data-placement="top" data-trigger=""  data-content="<?php echo $question->question_english ?>"> English Transcription</button>

                            <button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title="Roman Urdu" data-placement="top" data-trigger=""  data-content="<?php echo $question->question_roman_urdu ?>">Roman Urdu Transcription</button>

                        <?php }
                        ?>
                    </td>
                    <td><?php echo $question->time_recorded ?></td>
                    <td id="toggle" >
                        <p class="i_icon green bigger-140 fa fa-angle-double-down "></p></td>


                </tr>



            </tbody>     




            <tbody >

                <tr>
                    <th><i class="ace-icon fa fa-pencil-square-o bigger-120 " ></i>
                        Answer</th>
                    <th><i class="ace-icon fa fa-wrench bigger-120" ></i>
                        Action</th>

                    <th><i class="ace-icon fa fa-question bigger-120" ></i>

                        Question Type
                    </th>
                    <th><i class="ace-icon fa fa-weixin bigger-120" ></i>
                        FAQ Answer</th>
                    <th>stats</th>
                    <th colspan="2"><i class="ace-icon fa fa-users bigger-120" ></i>
                        Publish Publicly</th>
                </tr>

                <tr>
                    <td>
                        <?php
                        //Only display answer if it was a new question
                        if ($question->question_action == 1) {
                            //if doctor answered the question by audio
                            if ($question->answer_status == 1 && property_exists($question, "answer_id")) {
                                ?>
                                <audio controls>
                                    <source src='<?php echo path_to_answer . 'A' . $question->answer_id; ?>.wav' type="audio/wav">
                                </audio> <?php
                            }
                            if (property_exists($question, "answer_transcription")) {
                                ?>
                                <br> <button type="button" class=" popover btn btn-primary bigger-140" data-toggle="popover" title="Urdu" data-placement="top" data-trigger=""  data-content="<?php echo $question->answer_urdu ?>"> Urdu Transcription</button>
                                <button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title=" English" data-placement="top" data-trigger=""  data-content="<?php echo $question->answer_english ?>"> English Transcription</button>

                                <button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title="Roman Urdu" data-placement="top" data-trigger=""  data-content="<?php echo $question->answer_roman_urdu ?>">Roman Urdu Transcription</button>


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
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="<?php echo "btnAction" . $question->question_id; ?>" data-toggle="dropdown">
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
                                    echo 'Please Select:';
                                }
                                ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" id="<?php echo $question->question_id; ?>">
                                <li id="action"><a href="#">New Question</a></li>
                                <li id="action"><a href="#">FAQ</a></li>
                                <li id="action"><a href="#">Ignore</a></li>
                                <li id="action"><a href="#">Irrelevant</a></li>
                                <li id="action"><a href="#">Inappropriate</a></li>
                                <li id="action"><a href="#">Inaudible</a></li>
                                <li id="action"><a href="#">Unresponsive</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <select id="<?php echo "question_type" . $question->question_id; ?>" disabled>
                            <?php
                            if ($question->question_type == "Gyne") {
                                echo '<option value="Gyne">Gyne</option>';
                            } elseif ($question->question_type == "GP") {
                                echo '<option value="GP">GP</option>';
                            } elseif ($question->question_type == "Pediatrician") {
                                echo '<option value="Pediatrician">Pediatrician</option>';
                            } elseif ($question->question_type == 0) {
                                echo '<option value="0">Please Select</option>';
                            }
                            ?>
                            <option value="Gyne">Gyne</option>
                            <option value="GP">GP</option>
                            <option value="Pediatrician">Pediatrician</option>
                        </select>
                    </td>
                    <td>
                        <select id="<?php echo "faq" . $question->question_id; ?>" disabled>
                            <?php if ($question->question_action == 2) { ?>
                                <option value="<?php echo $question->faq; ?>"><?php echo $question->faq; ?></option>
                                <?php
                            } else {
                                echo '<option value="0">Please select</option>';
                            }
                            ?>
                            <option value="0">Please select</option>
                            <?php foreach ($faqs as $faq) { ?>
                                <option value="<?php echo $faq->faq_id; ?>"><?php echo $faq->faq_id; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        No. of times forwarded: <?php echo $question->forward_count; ?> <br>
                        Liked by user:  <?php echo $question->user_like_count; ?><br>
                        Disliked by user: <?php echo $question->user_dislike_count; ?> <br>
                        Report by user: <?php echo $question->user_report_count; ?> <br>

                        Answer liked by doctor: <?php echo $question->doctor_like_count; ?><br>
                        Answer disliked by doctor: <?php echo $question->doctor_dislike_count; ?><br>
                        Answer report by doctor: <?php echo $question->doctor_report_count; ?><br>
                    </td>
                    <td colspan="2">
                        <?php
                        if ($question->question_public_admin == 1 && $question->question_public_user == 1) {
                            ?>
                            <input class ="check" disabled checked type="checkbox" id = "<?php echo "question_public" . $question->question_id; ?>">
                            <?php
                        } elseif ($question->question_public_user == 0) {
                            echo ("Not publish by user");
                        } else {
                            ?>
                            <input class ="check" disabled type="checkbox" id = "<?php echo "question_public" . $question->question_id; ?>">
                        <?php } ?>
                    </td>


                </tr>

                <tr>
                    <th><i class="ace-icon fa fa-check-square-o bigger-120" ></i>
                        Approve to Send</th>
                    <th><i class="ace-icon fa fa-clock-o bigger-120" ></i>
                        Time Lapse</th>
                    <th>
                        <i class=" ace-icon fa fa-file-o"></i>
                        Publish Status (on hotline)</th>
                    <th><i class="ace-icon fa fa-upload bigger-120" ></i>
                        Upload Status (by VA)
                    </th>
                    <th colspan="1">
                        <i class=" ace-icon fa fa-pencil"></i>
                        Notes</th>
                    <th colspan="2">
                        <i class="fa fa-user"</i>
                        Block User
                    </th>

                </tr>

                <tr>

                    <td>
                        <?php
                        if ($question->approve_status != 0) {
                            ?>
                            <button type="button" id="<?php echo "question_approve" . $question->question_id; ?>" onclick="handleSendClick(this)" value="<?php echo $question->question_id; ?>" class="btn btn-success">Update</button>
                            <?php
                        } else {
                            ?>
                            <button type="button" id="<?php echo "question_approve" . $question->question_id; ?>" onclick="handleSendClick(this)" value="<?php echo $question->question_id; ?>" class="btn btn-success">Send</button>
                        <?php } ?>
                    </td>
                    <td><div style="width: 200px;"></div>
                        <?php
                        if ($question->question_action == 1) {
                            echo "- Time question sent to doctor: $question->time_approved <br>";
                        }
                        if (in_array($question->question_action, array(1, 2, 3, 4, 5, 6, 7))) {
                            if ($question->answer_status == 1) {
                                echo "- Time b/w question recorded by user and answer published on hotline:$question->time_duration<br>";
                                echo "- Time answer sent to user:  $question->time_approved_answer<br>";
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
                    <td id="<?php echo "voice_artist" . $question->question_id; ?>">
                        <?php
                        if ($question->question_action == 2) {
                            echo "FAQ";
                        } else if ($question->question_action == 1 && $question->answer_status == 1) {
                            echo "Uploaded";
                        } else {
                            echo "Not Uploaded";
                        }
                        ?>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="note">Note:</label>
                            <textarea class="form-control" rows="5" id = "<?php echo "question_note" . $question->question_id; ?>" readonly><?php echo $question->question_note; ?></textarea>
                        </div>
                        <div>
                            <button type="button" onclick="handleSaveButtonClick(this)" value="<?php echo $question->question_id; ?>" class="btn btn-success">Save</button>
                            <button type="button" onclick="handleEditButtonClick(this)" value="<?php echo $question->question_id; ?>" class="btn btn-info">Edit</button>
                        </div>
                    </td>
                    <td colspan="2">
                        <button type="button" id = "<?php echo "btn-status" . $question->question_id; ?>" onclick="handleBlockUserClick(this)" value="<?php echo $question->question_id; ?>" class="btn btn-primary">
                            <?php
                            if ($question->block_status == 1) {
                                echo "Un-Block";
                            } else {
                                echo 'Block';
                            }
                            ?>
                        </button>
                    </td>

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
                ?>
            </tr>
            </tdody>
        <tbody>
            <tr>
                <th>Answer</th>
                <th>Action</th>
                <th>Question Type</th>
                <th>FAQ Answer</th>
                <th>Publish Publicly</th>
            </tr>

            <tr>
                <?php
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                ?>
            </tr>

            <tr>
                <th>Approve to Send</th>
                <th>Time Lapse</th>
                <th>Publish Status (On hotine)</th>
                <th>Upload Status by VA</th>
                <th>Notes</th>


            </tr>
            <tr>
                <?php
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                ?>
            </tr>
            </tdody>

            <?php
        }
        ?>  
</table>









<hr>

<!-- Pagination -->
<div class="row" style="margin-left: -130px;">
    <div class="col-md-12 text-center">
<?php echo $links ?>
    </div>
</div>



</div>
<!-- inline scripts related to this page -->

<script type="text/javascript">
    //When action of a question is changed
    $('.dropdown-menu #action a').on('click', function () {
        var question_id = $(this).parent().parent().attr('id');
        var action = $(this).text();

        if (action == "New Question")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#faq' + question_id).attr('disabled', 'disabled');
            $('#question_type' + question_id).attr('disabled', false);
            $('#question_public' + question_id).attr('disabled', false);
            $('#voice_artist' + question_id).html("N/A");
        } else if (action == "FAQ")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#faq' + question_id).attr('disabled', false);
            $('#question_type' + question_id).attr('disabled', 'disabled');
            $('#question_public' + question_id).attr('disabled', 'disabled');
            $('#voice_artist' + question_id).html("FAQ");

        } else if (action == "Ignore")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#faq' + question_id).attr('disabled', 'disabled');
            $('#question_type' + question_id).attr('disabled', 'disabled');
            $('#question_public' + question_id).attr('disabled', 'disabled');
            $('#voice_artist' + question_id).html("N/A");
        } else if (action == "Irrelevant")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#faq' + question_id).attr('disabled', 'disabled');
            $('#question_type' + question_id).attr('disabled', 'disabled');
            $('#question_public' + question_id).attr('disabled', 'disabled');
            $('#voice_artist' + question_id).html("N/A");
        } else if (action == "Inappropriate")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#faq' + question_id).attr('disabled', 'disabled');
            $('#question_type' + question_id).attr('disabled', 'disabled');
            $('#question_public' + question_id).attr('disabled', 'disabled');
            $('#voice_artist' + question_id).html("N/A");
        } else if (action == "Inaudible")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#faq' + question_id).attr('disabled', 'disabled');
            $('#question_type' + question_id).attr('disabled', 'disabled');
            $('#question_public' + question_id).attr('disabled', 'disabled');
            $('#voice_artist' + question_id).html("N/A");
        } else if (action == "Unresponsive")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#faq' + question_id).attr('disabled', 'disabled');
            $('#question_type' + question_id).attr('disabled', 'disabled');
            $('#question_public' + question_id).attr('disabled', 'disabled');
            $('#voice_artist' + question_id).html("N/A");
        }
    });


    function handleBlockUserClick(button) {
        var question_id = button.value;
        var status;

        //Getting button text and setting block value
        var text = $('#btn-status' + question_id).text();
        var trimStr = $.trim(text);
        if (trimStr === "Block") {
            status = 1;
        } else {
            status = 0;
        }

        //Sending request to API
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //Setting alternate text
                if (trimStr === "Block") {
                    $('#btn-status' + question_id).html('Un-Block');
                } else {
                    $('#btn-status' + question_id).html('Block');
                }
            }
        };
        xmlhttp.open('GET', '<?php echo path_to_api; ?>User/updateUserBlockStatus?source_id=' + question_id + '&status=' + status + '&type=Question', true);
        xmlhttp.send();
    }

    //Saving a new note
    function handleSaveButtonClick(button) {
        var question_id = button.value;
        var note = $("#question_note" + question_id).val();
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#question_note" + question_id).attr('readonly', true);
            }
        };
        xmlhttp.open("GET", "<?php echo path_to_api; ?>Question/saveQuestionNote?question_id=" + question_id + "&question_note=" + note, true);
        xmlhttp.send();

    }

    //Editing a note
    function handleEditButtonClick(button) {
        var question_id = button.value;
        $("#question_note" + question_id).removeAttr("readonly");
        $("#question_note" + question_id).focus();
    }


    //When user approves the sending status of question
    function handleSendClick(button)
    {
        var admin_id = <?php echo $this->session->admin_id ?>;
        var question_public;
        var question_action;
        var question_type;
        var faq_file;
        var question_id = button.value;


        //Getting question action
        question_action = $('#btnAction' + question_id).text();

        if (question_action.indexOf("Please") >= 0) {
            alert("Please select Question Action");
            return;
        }

        //If question action is a new question
        if (question_action == "New Question ") {
            //Getting question type
            question_type = $('#question_type' + question_id).val();

            if (question_type == 0) {
                alert("Please select Question type first.");
                return;
            }

            //Getting whether to make question public or not
            if ($('#question_public' + question_id).is(':checked'))
                question_public = 1;
            else
                question_public = 0;

        }


        //If question action is a new question
        if (question_action == "FAQ ") {
            //Getting FAQ file
            faq_file = $('#faq' + question_id).val();

            if (faq_file == 0) {
                alert("Please select FAQ");
                return;
            }

        }



        //Sending request to API
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#question_approve" + question_id).html("Update");
            }
        };
        xmlhttp.open('GET', '<?php echo path_to_api; ?>Question/updateQuestionStatus?question_id=' + question_id + '&question_public=' + question_public + '&question_action=' + question_action + '&question_type=' + question_type + '&faq_file=' + faq_file + '&admin_id=' + admin_id, true);
        xmlhttp.send();

    }
    //When user approves the sending status of faq question
  
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










