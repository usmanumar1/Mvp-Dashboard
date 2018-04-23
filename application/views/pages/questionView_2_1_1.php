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
                    <li class="active">New</li>
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


                                    padding-bottom:15px; padding-top:13px; padding-right:15px; padding-left:8px; border-radius: 3px;
                                    margin-left: 1.1%; float: left; margin-bottom: -13px; color: #003580; border-top-left-radius: 13.5px; border-top-right-radius: 13.5px;">Rah-e-maa </h3>
                            </div>
                            <a href="../../../../../../C_Projects/Rahemaa-v2/Rahemaa-v2/app/src/main/java/com/itu/rem/rahemaa/AnswerTextActivity.java"></a>
                        </div>
                        <div style=" background: red; /* For browsers that do not support gradients */
                             background: -webkit-linear-gradient(left, #e8e8e8, #deebf9); /* For Safari 5.1 to 6.0 */
                             background: -o-linear-gradient(right, #e8e8e8, #deebf9); /* For Opera 11.1 to 12.0 */
                             background: -moz-linear-gradient(right, #e8e8e8, #deebf9); /* For Firefox 3.6 to 15 */
                             background: linear-gradient(to right, #e8e8e8, #deebf9); 



                             padding: 30px 10px 20px 10px; margin-right: 0; border-radius: 13.5px; ">

                            
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
        $count = 0;
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
                        }
                        elseif($question->question_action == 2) {
                            echo "answered by FAQ";
                        } 
                        else {
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
                        <select id="<?php echo "question_type".$question->question_id;?>" disabled>
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
                        if ($question->question_public_admin == 1) {
                            ?>
                            <input class ="check" disabled checked type="checkbox" id = "<?php echo "question_public" . $question->question_id; ?>">
                            <?php
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
                        } else if ($question->question_action == 1 && $question->trans_upload_status == 1) {
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
                        <button type="button" id = "<?php echo "btn-status".$question->question_id;?>" onclick="handleBlockUserClick(this)" value="<?php echo $question->question_id;?>" class="btn btn-primary">
                            <?php if($question->block_status == 1){ echo "Un-Block";}else{ echo 'Block';}?>
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
                            
                            
                            
                            
<!--                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">
                <i class="ace-icon fa fa-question-circle bigger-120 "></i>
                Question #
                                        </label><label id="companyError" class="errorClass"></label>
                                        <input class="form-control tooltips" maxlength="200" type="text" name="companyagentname" id="companyagent" data-original-title="" title="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">
                                           Rah-e-maa <span class="symbol required"></span>
                                        </label><label id="bookingrefError" class="errorClass"></label>
                                        <audio id="" controls>
                                            <source src='<?php echo path_to_question . 'Q1'; ?>.wav' type="audio/wav">
                                        </audio>                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">
                                         Rah-e-maa <span class="symbol required"></span>
                                        </label><label id="guestError" class="errorClass"></label>
                                        <input class="form-control tooltips" type="text" maxlength="225" name="guestname" id="guestid" data-original-title="" title="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Rah-e-maa <span class="symbol required"></span> 
                                        </label><label id="paxperbookingError" class="errorClass"></label>
                                        <select class="form-control search-select select2-offscreen" id="adultperbooking" name="adultperbooking" tabindex="-1">
                                            <option value="">SELECT</option>
                                            <option value="1">1</option><option value="2">2</option><option value="3">Action</option>
                                            <option value="4">4</option><option value="5">5</option><option value="6">FAQ</option>
                                            <option value="7">7</option><option value="8">8</option><option value="9">Ignore</option>
                                            <option value="10">10</option><option value="11">11</option><option value="12">Irrelevant</option>
                                            <option value="13">13</option><option value="14">14</option><option value="15">Inappropriate</option>
                                            <option value="16">16</option><option value="17">17</option><option value="18">Inaudible</option>
                                            <option value="19">19</option><option value="20">20</option><option value="21">21</option>
                                            <option value="22">22</option><option value="23">23</option><option value="24">24</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">
                                          Rah-e-maa<span class="symbol required"></span> 
                                        </label><label id="paxperbookingError" class="errorClass"></label>
                                        <input class="form-control tooltips" type="number" maxlength="225" name="child" placeholder="Enter Value" id="guestid" data-original-title="" title=""> 
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">
                                        Rah-e-maa<span class="symbol required"></span> 
                                        </label><label id="paxperbookingError" class="errorClass"></label>
                                        <input class="form-control tooltips" type="number" maxlength="225" name="infant" placeholder="Enter Value" id="guestid" data-original-title="" title=""> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">
                                          Rah-e-maa<span class="symbol required"></span> 
                                        </label><label id="businesstypeError" class="errorClass"></label>
                                        <select class="form-control" id="businesstype" name="businesstypename">
                                            <option value="0">SELECT</option>
                                            <option value="FIT">FIT</option>
                                            <option value="Group">Group</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">
                                           Rah-e-maa<span class="symbol required"></span>
                                        </label><label id="bookingdateError" class="errorClass"></label>
                                        <div class="">
                                            <input type="text" maxlength="15" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="13-12-2017" name="bookingdatename" id="bookingdate">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Rah-e-maa<span class="symbol required"></span>
                                        </label><label id="traveldateError" class="errorClass"></label>
                                        <div class="">
                                            <input type="text" maxlength="15" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" id="traveldate" name="traveldatename">
                                        </div>
                                    </div>
                                </div>




                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">
                                          Rah-e-maa
                                        </label><label id="inqueryError" class="errorClass"></label>
                                        <input class="form-control tooltips" maxlength="20" type="email" name="email" id="email" data-original-title="" title="">
                                    </div>
                                </div>

                            </div>-->
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">
                                            
                                        </label>
                                        <button style="display:block;" class="btn btn-primary" onclick="AddFlight()"><i class="fa fa-plus"></i>Update</button>
                                    </div>
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
</div>
</body>

</html>
