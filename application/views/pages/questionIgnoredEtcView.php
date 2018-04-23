<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>


    .sidebar {
        background-color: #f2f2f2;
        border-style: solid;
        border-color: #ccc;
        border-width: 0 1px 0 0;
        width: 190px;
        float: left;
        position: static;
        padding-left: 0;
        padding-right: 0;
    }
    li.buttons{
        padding: 17px 20px;   

    }
    .nav-list>li.buttons{
        background-color: #f8f8f8;
        color: #585858;
        display: block;
        height: 39px;
        /*    line-height: 17px;*/
        padding: 17px 20px;   
        text-shadow: none!important;
        font-size: 13px;
    }
    .sidebar-toggle {
        background-color: #f3f3f3;
        border-color: #e0e0e0;
    }
    .nav-list>li {
        display: block;
        /* position: relative; */
        float: none;
        padding: 5px 2px;
        border-color: #e0e0e0;
        background-color: #f8f8f8;

        /* border-style: solid; */
        /* border-width: 1px 0 0; */   
    }
    .sidebar-toggle>.ace-icon {
        border-color: #bbb;
        color: #aaa;
        background-color: #fff;
    }
</style>



<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>

    <div id="sidebar" class="sidebar                  responsive">
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'fixed')
            } catch (e) {
            }
        </script>

        <?= $left_sidebar; ?>
        <!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'collapsed')
            } catch (e) {
            }
        </script>
    </div>


    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try {
                        ace.settings.check('breadcrumbs', 'fixed')
                    } catch (e) {
                    }
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>

                    <li>
                        <a href="#">Questions</a>
                    </li>
                    <li class="active">Ignored, Etc.</li>
                </ul><!-- /.breadcrumb -->


            </div>

            <div class="page-content">
                <div class="row">

                    <div class="col-md-12">
                        <!----------------------Quotation Fields--------------------->
                        <div class="row">
                            <div>

                                <h3 style=" 



                                    background: red; /* For browsers that do not support gradients */
                                    background: -webkit-linear-gradient(#deebf9, #e8e8e8, #e8e8e8, #e8e8e8, #e8e8e8 ); /* For Safari 5.1 to 6.0 */
                                    background: -o-linear-gradient(#deebf9,  #e8e8e8, #e8e8e8, #e8e8e8); /* For Opera 11.1 to 12.0 */
                                    background: -moz-linear-gradient(#deebf9,  #e8e8e8, #e8e8e8, #e8e8e8); /* For Firefox 3.6 to 15 */
                                    background: linear-gradient(#deebf9,  #e8e8e8, #e8e8e8  #e8e8e8); /* Standard syntax */


                                    padding-bottom:15px; padding-top:13px; padding-right:15px; padding-left:8px; border-radius: 3px;border: 1px solid lightblue;
                                    margin-left: 1.1%; float: left; margin-bottom: -13px; color: #003580; border-top-left-radius: 13.5px; border-top-right-radius: 13.5px; border: 2px solid lightblue;">Rah-e-maa </h3>
                            </div>
                        </div>
                        <div style=" background: red; /* For browsers that do not support gradients */
                             background: -webkit-linear-gradient(left, #e8e8e8, #deebf9); /* For Safari 5.1 to 6.0 */
                             background: -o-linear-gradient(right, #e8e8e8, #deebf9); /* For Opera 11.1 to 12.0 */
                             background: -moz-linear-gradient(right, #e8e8e8, #deebf9); /* For Firefox 3.6 to 15 */
                             background: linear-gradient(to right, #e8e8e8, #deebf9); 



                             padding: 30px 10px 20px 10px; margin-right: 0; border-radius: 13.5px;border: 2px solid lightblue; ">



                            <table id="report" class="table table-bordered table-hover width-80" style="margin: auto; background-color:#ccffff;">
                                <tbody>

                                    <tr>
                                        <th>
                                            <div style="float: left;"><i class=" ace-icon fa fa-list bigger-120"></i></div>
                                            <div style="margin-left:120px; margin-right: 10px; float: left;">
                                                <i class=" margin-10 ace-icon fa fa-question-circle bigger-120"></i>
                                            </div>Question

                                        </th>
                                        <th >
                                            <div style=" margin-right: 10px; float: left;">
                                                <i class=" margin-10 ace-icon fa fa-frown-o bigger-120"></i>
                                            </div>
                                            Reason:

                                        </th>
                                        <th >
                                            <div style=" margin-right: 10px; float: left;">
                                                <i class=" margin-10 ace-icon fa fa-calendar bigger-120"></i>
                                            </div>                                            Date asked:

                                        </th>
                                        <th>
                                            <div style=" margin-right: 10px; float: left;">
                                                <i class=" margin-10 ace-icon fa fa-calendar-o bigger-120"></i>
                                            </div>                                             Date answered:
                                        </th>
                                        <th>
                                            <div style=" margin-right: 10px; float: left;">
                                                <i class="ace-icon fa fa-cogs bigger-120" ></i>
                                            </div>Edit
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
                                                <td><div class="row"><div class="col-md-1" style="margin-left: 10px;"><?php echo $question->question_id; ?></div>
                                                        <div class="col-md-3"> <audio id="<?php echo "audio" . $question->question_id; ?>" controls>
                                                                <source src='<?php echo path_to_question . 'Q' . $question->question_id; ?>.wav' type="audio/wav">
                                                            </audio></div>
                                                    </div> </td>
                                                <td>
                                                    <?php
                                                    if ($question->question_action == 3) {
                                                        echo 'Ignore';
                                                    } elseif ($question->question_action == 4) {
                                                        echo 'Irrelevant';
                                                    } elseif ($question->question_action == 5) {
                                                        echo 'Inappropriate';
                                                    } elseif ($question->question_action == 6) {
                                                        echo 'Inaudible';
                                                    } elseif ($question->question_action == 7) {
                                                        echo 'Unresponsive';
                                                    } elseif ($question->question_action == 8) {
                                                        echo 'Only Urdu';
                                                    } elseif ($question->question_action == 9) {
                                                        echo 'Hang Up';
                                                    } elseif ($question->question_action == 10) {
                                                        echo 'Silent';
                                                    } elseif ($question->question_action == 11) {
                                                        echo 'Misplaced';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $dateAsk = date_create($question->time_recorded); ?>
                                                    <?= date_format($dateAsk, 'd/m/y'); ?>
                                                </td>
                                                <td><div class="row">
                                                        <?php
                                                        $dateAns = date_create($question->time_approved);
                                                        ?>
                                                        <div class="col-md-6">  <?= date_format($dateAns, 'd/m/y'); ?></div>
                                                        <div> <button type="button" class=" popover  btn btn-danger" 
                                                                      data-toggle="popover" title=" Details" data-placement="top"
                                                                      data-trigger=""  data-content="User ID: <?php echo($question->user_id); ?> <br>Call ID: <?= $question->call_id; ?>"data-html="true">


                                                                <i class="fa fa-ellipsis-h bigger-140 btn-sm"></i> 
                                                            </button></div>
                                                    </div></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <button type="button"  data-question_id="<?php echo $question->question_id; ?>"  value="<?php echo $question->question_id; ?>" class="btn btn-success updateQuestion">Edit</button>
                                                        </div>
                                                    </div>

                                                    <div style="margin-top: 40px;" class="update" id = "updateQuestion-<?php echo $question->question_id; ?>" >
                                                        <div class="row">


                                                            <div class="col-md-3">
                                                                <div class="dropdown" style="margin-top: -20px;">
                                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="<?php echo "btnAction" . $question->question_id; ?>" data-toggle="dropdown">
                                                                        <?php
                                                                        if ($question->question_action == 1) {
                                                                            echo 'New Question';
                                                                        }
                                                                        //elseif ($question->question_action == 2) {
                                                                        //  echo 'FAQ';
                                                                        //}
                                                                        elseif ($question->question_action == 3) {
                                                                            echo 'Ignore';
                                                                        } elseif ($question->question_action == 4) {
                                                                            echo 'Irrelevant';
                                                                        } elseif ($question->question_action == 5) {
                                                                            echo 'Inappropriate';
                                                                        } elseif ($question->question_action == 6) {
                                                                            echo 'Inaudible';
                                                                        } elseif ($question->question_action == 7) {
                                                                            echo 'Unresponsive';
                                                                        } elseif ($question->question_action == 8) {
                                                                            echo 'Only Urdu';
                                                                        } elseif ($question->question_action == 9) {
                                                                            echo 'Hang Up';
                                                                        } elseif ($question->question_action == 10) {
                                                                            echo 'Silent';
                                                                        } elseif ($question->question_action == 11) {
                                                                            echo 'Misplaced';
                                                                        } elseif ($question->question_action == 0) {
                                                                            echo 'Please Select:';
                                                                        }
                                                                        ?>
                                                                        <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu" id="<?php echo $question->question_id; ?>">
                                                                        <li id="action"><a>New Question</a></li>
                                                                        <!--<li id="action"><a>FAQ</a></li>-->
                                                                        <li id="action"><a>Ignore</a></li>
                                                                        <li id="action"><a>Irrelevant</a></li>
                                                                        <li id="action"><a>Inappropriate</a></li>
                                                                        <li id="action"><a>Inaudible</a></li>
                                                                        <li id="action"><a>Unresponsive</a></li>
                                                                        <li id="action"><a>Only Urdu</a></li>
                                                                        <li id="action"><a>Hang Up</a></li>
                                                                        <li id="action"><a>Silent</a></li>
                                                                        <li id="action"><a>Misplaced</a></li>
                                                                    </ul>
                                                                </div>    
                                                            </div>

                                                        </div>
                                                        <div class="approved" id="approved-<?php echo $question->question_id; ?>" >

                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="control-label">

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="control-label">

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="control-label">

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">

                                                                    </label>
                                                                    <?php
                                                                    if ($question->approve_status != 0) {
                                                                        ?>
                                                                        <button type="button" id="<?php echo "story_push" . $question->question_id; ?>" onclick="handleSendClick(this)" value="<?php echo $question->question_id; ?>" class="btn btn-success">Update</button>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <button type="button" id="<?php echo "story_push" . $question->question_id; ?>" onclick="handleSendClick(this)" value="<?php echo $question->question_id; ?>" class="btn btn-success">Send</button>
                                                                    <?php } ?>                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">
                                                                    </label>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class=" send" id="send-<?php echo $question->question_id; ?>" >
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">

                                                                    </label>
                                                                    <br>Send To:                                            </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">

                                                                    </label>
                                                                    <br> <select id="<?php echo "question_type" . $question->question_id; ?>" disabled>
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
                                                                    </select>                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">

                                                                    </label>
                                                                    <br><h6> Publish Publicly:</h6> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">

                                                                    </label>
                                                                    <br>
                                                                    <?php
                                                                    if ($question->question_public_user == 1) {
                                                                        ?>
                                                                        <input class ="check" type="checkbox" id = "<?php echo "question_public" . $question->question_id; ?>">
                                                                        <?php
                                                                    } elseif ($question->question_public_user == 0) {
                                                                        echo ("Not publish by user");
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="control-label">

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">

                                                                    </label>
                                                                    <button type="button" id="<?php echo "question_approve" . $question->question_id; ?>" onclick="handleSendClick(this)" value="<?php echo $question->question_id; ?>" class="btn btn-success">Send</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="control-label">

                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--                                    <div class="row">
                                                                                                <div class="col-md-10"></div>
                                                                                                <div class="col-md-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="control-label">
                                                        
                                                                                                        </label>
                                                                                                        <button style="display:block;" class="btn btn-primary" onclick="AddFlight()"><i class="fa fa-plus"></i>Update</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>-->

                                                    </div> 


                                                </td>
                                            </tr>

                                            <?php
                                        }
                                    } else {
                                        ?>

                                        <tr>
                                            <td>
                                                <?php
                                                echo("Nothing To Show")
                                                ?>
                                            </td> </tr>



                                        <?php
                                    }
                                    ?>  </tbody>
                            </table> 



                            <!-- Pagination -->
                            <div class="row" style="margin-left: -130px;">
                                <div class="col-md-12 text-center">
                                    <?php echo $links ?>
                                </div>
                            </div>                         




                        </div>
                        <!----------------------Question Fields End--------------------->




                    </div>
                </div>

            </div>

        </div>
        <div class="hr hr-24"></div>


    </div>
    <div class="footer">

        <div class="footer-inner">          

            <div class="footer-content">
                <span class="bigger-120">
                    <span class="blue bolder">Rah  </span>
                    -e-maa MVP &copy; 2017
                </span>

                &nbsp; &nbsp;

            </div>
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->
<script type="text/javascript">
    //When action of a question is changed
    $(document).ready(function () {
        $(".send").each(function (  ) {
            $('.send').hide();
            $('.faq').hide();
            $('.ignore-etc').hide();
        });
    });
    $('.dropdown-menu #action a').on('click', function () {
        var question_id = $(this).parent().parent().attr('id');
        var action = $(this).text();
        if (action == "New Question")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#faq' + question_id).attr('disabled', 'disabled');
            $('#send-' + question_id).show();
            $('#question_type' + question_id).attr('disabled', false);
            $('#question_public' + question_id).attr('disabled', false);
            $('#voice_artist' + question_id).html("N/A");
        } else if (action == "FAQ")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#faq' + question_id).attr('disabled', false);
            $('#faq-' + question_id).show();
            $('#question_type' + question_id).hide();
            $('#question_public' + question_id).attr('disabled', 'disabled');
            $('#voice_artist' + question_id).html("FAQ");

        } else if (action == "Ignore")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#ignore-etc-' + question_id).show();
            $('#question_type' + question_id).attr('disabled', 'disabled');
            $('#question_public' + question_id).attr('disabled', 'disabled');
            $('#voice_artist' + question_id).html("N/A");
        } else if (action == "Irrelevant")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#ignore-etc-' + question_id).show();
            $('#question_type' + question_id).attr('disabled', 'disabled');
            $('#question_public' + question_id).attr('disabled', 'disabled');
            $('#voice_artist' + question_id).html("N/A");
        } else if (action == "Inappropriate")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#ignore-etc-' + question_id).show();
            $('#question_type' + question_id).attr('disabled', 'disabled');
            $('#question_public' + question_id).attr('disabled', 'disabled');
            $('#voice_artist' + question_id).html("N/A");
        } else if (action == "Inaudible")
        {
            $("#btnAction" + question_id).html(action + " " + '<span class="caret"></span>');
            $('#ignore-etc-' + question_id).show();
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





    $(document).ready(function () {

        $('.update').hide();
        $('.approved').hide();

    });


    $('.updateQuestion').on('click', function () {
        var question_id = $(this).data('question_id');
        $('#updateQuestion-' + question_id).show();
        var action = $(this).text();
        if (action === "Approved")
        {

            $('#approved-' + question_id).show();
            // $('#tag' + story_id).attr('disabled', false);

        }
    });

    $('.dropdown-menu #action a').on('click', function () {
        var question_id = $(this).parent().parent().attr('id');
        var status = $(this).text();
        var action = $(this).text();
        alert("assa");
        if (action === "Approved")
        {

            $("#btnAction" + question_id).html(status + " " + '<span class="caret"></span>');
            $('#approved-' + question_id).show();
            // $('#tag' + story_id).attr('disabled', false);

        } else
        {
            alert(status);
            $("#btnAction" + question_id).html(status + " " + '<span class="caret"></span>');
            $('#rejected-' + question_id).show();
        }
        //$('#story_disapproval' + story_id).attr('disabled', false);
        // $('#tag' + story_id).attr('disabled', false);

        // }

    });






    $(".popover").popover();
</script>
</div>
</body>

</html>
