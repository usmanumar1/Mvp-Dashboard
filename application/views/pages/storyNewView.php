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
                        <a href="#">Stories</a>
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

                            <?php
                            $count = 0;
                            if ($stories) {
                                foreach ($stories as $story) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label class="control-label">

                                                </label><label id="companyError" class="errorClass"></label>
                                                <?php echo $story->user_story_id; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    <span class="symbol required"></span><br>
                                                </label><label id="bookingrefError" class="errorClass"></label>
                                                <audio id="<?php echo "audio" . $story->user_story_id; ?>" controls>
                                                    <source src='<?php echo path_to_story . $story->user_story_id; ?>.wav' type="audio/wav">
                                                </audio>

                                                <?php
                                                //if ($story->trans_upload_status == 1) {
                                                ?>
                                                                                                                                                                                                                                <!--                        <br> <button type="button" class=" popover btn btn-primary bigger-140" data-toggle="popover" title="Urdu" data-placement="top" data-trigger=""  data-content="<?php echo $story->question_urdu ?>"> Urdu Transcription</button>
                                                                                                                                                                                                                                                        <button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title=" English" data-placement="top" data-trigger=""  data-content="<?php echo $story->question_english ?>"> English Transcription</button>

                                                                                                                                                                                                                                                        <button type="button" class=" popover btn btn-lg btn-primary bigger-140" data-toggle="popover" title="Roman Urdu" data-placement="top" data-trigger=""  data-content="<?php echo $story->question_roman_urdu ?>">Roman Urdu Transcription</button>-->

                                                <?php // }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    <span class="symbol required"></span>
                                                </label><label id="guestError" class="errorClass"></label><br>
                                                <div class="dropdown" style="margin-top: -20px;">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="<?php echo "btnStatus" . $story->user_story_id; ?>" data-toggle="dropdown">
                                                        <?php
                                                        if ($story->approve_status == 1) {
                                                            echo 'Approved';
                                                        } elseif ($story->approve_status == 2) {
                                                            echo 'Rejected';
                                                        } else {
                                                            echo 'Please Select:';
                                                        }
                                                        ?>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" id="<?php echo $story->user_story_id; ?>">
                                                        <li id="status"><a>Approved</a></li>
                                                        <li id="status"><a>Inappropriate</a></li>
                                                        <li id="status"><a>Irrelevant</a></li>
                                                        <li id="status"><a>Misinformation</a></li>
                                                        <li id="status"><a>Inaudible</a></li>
                                                        <li id="status"><a>Hang Up</a></li>
                                                        <li id="status"><a>Silent</a></li>
                                                        <li id="status"><a>Misplaced</a></li>
                                                    </ul>
                                                </div>                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label class="control-label">
                                                    <span class="symbol required"></span> 
                                                </label><label id="paxperbookingError" class="errorClass"></label>
                                                <?php $date = date_create($story->time_recorded); ?>
                                                <button type="button" class=" popover  btn btn-danger" 
                                                        data-toggle="popover" title=" Details" data-placement="top"
                                                        data-trigger=""  data-content="User ID: <?php echo($story->user_id); ?><br> Call ID: <?= $story->call_id; ?> 
                                                        <br>Date recorded:<?= date_format($date, 'd/m/y'); ?><br>
                                                        Time recorded:<?= date_format($date, 'g:i A'); ?>" data-html="true">
                                                    <i class="fa fa-ellipsis-h bigger-140 btn-sm"></i> 
                                                </button>

                                            </div>
                                        </div>


                                    </div>

                                    <div class="approved" id="approved-<?php echo $story->user_story_id; ?>" >

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
                                                    <br> Tags:
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">

                                                    </label>
                                                    <br><select id="<?php echo "tag" . $story->user_story_id; ?>">
                                                        <?php
                                                        if ($story->tag == "Childbirth") {
                                                            echo '<option value="Childbirth">Childbirth</option>';
                                                        } else if ($story->tag == "Pregnancy") {
                                                            echo '<option value="Pregnancy">Pregnancy</option>';
                                                        } else if ($story->tag == "Dais") {
                                                            echo '<option value="Dais">Dais</option>';
                                                        } else if ($story->tag == "Public_hospitals") {
                                                            echo '<option value="Public_hospitals">Public hospitals</option>';
                                                        } else if ($story->tag == "Cost") {
                                                            echo '<option value="Cost">Cost</option>';
                                                        } else if ($story->tag == "Death") {
                                                            echo '<option value="Death">Death</option>';
                                                        } else if ($story->tag == "Positive") {
                                                            echo '<option value="Positive">Positive</option>';
                                                        } else if ($story->tag == "Negative") {
                                                            echo '<option value="Negative">Negative</option>';
                                                        } else if ($story->tag == "Nutrition") {
                                                            echo '<option value="Nutrition">Nutrition</option>';
                                                        } else if ($story->tag == "Breastfeeding") {
                                                            echo '<option value="Breastfeeding">Breastfeeding</option>';
                                                        } else if ($story->tag == "Immunization") {
                                                            echo '<option value="Immunization">Immunization</option>';
                                                        } else if ($story->tag == "Other") {
                                                            echo '<option value="Other">Other</option>';
                                                        } else {
                                                            echo '<option value="NULL">Please Select</option>';
                                                        }
                                                        ?>
                                                        <option value="Childbirth">Childbirth</option>
                                                        <option value="Pregnancy">Pregnancy</option>
                                                        <option value="Dais">Dais</option>
                                                        <option value="Public_hospitals">Public hospitals</option>
                                                        <option value="Cost">Cost</option>
                                                        <option value="Death">Death</option>
                                                        <option value="Positive">Positive</option>
                                                        <option value="Negative">Negative</option>
                                                        <option value="Nutrition">Nutrition</option>
                                                        <option value="Breastfeeding">Breastfeeding</option>
                                                        <option value="Immunization">Immunization</option>
                                                        <option value="Other">Other</option>
                                                    </select>                                   </div>
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
                                                    if ($story->approve_status != 0) {
                                                        ?>
                                                        <button type="button" id="<?php echo "story_push" . $story->user_story_id; ?>" onclick="handleSendClick(this)" value="<?php echo $story->user_story_id; ?>" class="btn btn-success">Update</button>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <button type="button" id="<?php echo "story_push" . $story->user_story_id; ?>" onclick="handleSendClick(this)" value="<?php echo $story->user_story_id; ?>" class="btn btn-success">Send</button>
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
                                    <div class="rejected" id="rejected-<?php echo $story->user_story_id; ?>" >
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">

                                                    </label>
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
                                                    if ($story->approve_status != 0) {
                                                        ?>
                                                        <button type="button" id="<?php echo "story_push" . $story->user_story_id; ?>" onclick="handleSendClick(this)" value="<?php echo $story->user_story_id; ?>" class="btn btn-success">Update</button>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <button type="button" id="<?php echo "story_push" . $story->user_story_id; ?>" onclick="handleSendClick(this)" value="<?php echo $story->user_story_id; ?>" class="btn btn-success">Send</button>
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

                                    <div style=" border: 1px solid lightblue;"></div><br>
                                    <?php
                                }
                            } else {
                                echo ("Nothing to show");
                            }
                            ?>


                            <!-- Pagination -->
                            <div class="row" style="margin-left: -130px;">
                                <div class="col-md-12 text-center">
                                    <?php echo $links ?>
                                </div>
                            </div>  </div>

                        <!----------------------Question Fields End--------------------->




                    </div>
                </div>

            </div>

        </div>
        <div class="hr hr-24"></div>


    </div>
    <div class="footer" style="background-color: #f2f2f2;">

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

    $(document).ready(function () {

        $('.approved').hide();
        $('.rejected').hide();

    });

    $('.dropdown-menu #status a').on('click', function () {
        var story_id = $(this).parent().parent().attr('id');
        var status = $(this).text();
        var action = $(this).text();

        if (action === "Approved")
        {

            $("#btnStatus" + story_id).html(status + " " + '<span class="caret"></span>');
            $('#approved-' + story_id).show();
            $('#rejected-' + story_id).hide();
            // $('#tag' + story_id).attr('disabled', false);

        } else
        {

            //alert(status);
            $('#approved-' + story_id).hide();
            $("#btnStatus" + story_id).html(status + " " + '<span class="caret"></span>');
            $('#rejected-' + story_id).show();
            //$('#story_disapproval' + story_id).attr('disabled', false);
            // $('#tag' + story_id).attr('disabled', false);

        }

    });

    //When user approves the sending status of question
    function handleSendClick(button)
    {
        var admin_id = <?php echo $this->session->admin_id ?>;
        var story_status;
        var story_disapproval;
        var tag;
        var story_id = button.value;
        //Getting story status
        story_status = $('#btnStatus' + story_id).text();

        //Getting disapproval reason
        story_disapproval = $('#story_disapproval' + story_id).val();
        //Getting tag value
        tag = $('#tag' + story_id).val();

        //  alert('story_id=' + story_id + '&story_status=' + story_status + '&tag=' + tag + '&admin_id=' + admin_id);
        //Sending request to API
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#story_push" + story_id).html("Update");
            }
        };
        xmlhttp.open('GET', '<?php echo path_to_api; ?>Story/updateStoryStatusNew?story_id=' + story_id + '&story_status=' + story_status + '&tag=' + tag + '&admin_id=' + admin_id, true);
        xmlhttp.send();
        location.reload();
    }
    $(".popover").popover();
</script>

</div>
</body>

</html>
