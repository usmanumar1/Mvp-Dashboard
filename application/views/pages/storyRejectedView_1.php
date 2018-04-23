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

    <div id="sidebar" class="sidebar  responsive">
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
                    <li class="active">Rejected</li>
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


                            <table id="report" class="table table-bordered table-hover table-striped auto width-80 "style="margin: auto; background-color:#ccffff;">
                                <tbody>

                                    <tr>

                                        <th colspan="">
                                            <div style="float: left;"><i class=" ace-icon fa fa-list bigger-120"></i></div>
                                            <div style="margin-left:120px; margin-right: 10px; float: left;">
                                                <i class=" margin-10 ace-icon fa fa-tasks bigger-120"></i>
                                            </div>Story
                                        </th>
                                        <th>
                                            <div style=" margin-right: 10px; float: left;">
                                                <i class=" margin-10 ace-icon fa fa-calendar bigger-120"></i>
                                            </div>Date Rejected:

                                        </th>

                                        <th colspan="4">
                                            <div style=" margin-right: 10px; float: left;">
                                                <i class="ace-icon fa fa-frown-o bigger-120"></i>
                                            </div> Reason
                                        </th>



                                    </tr>

                                </tbody>      
                                <tbody>
                                    <?php
                                    if ($stories) {
                                        foreach ($stories as $story) {
                                            ?>

                                            <tr>
                                                <td colspan=""><div class="row"><div class="col-md-1"><?php echo $story->user_story_id; ?></div>
                                                        <div class="col-md-">
                                                            <audio id="<?php echo "audio" . $story->user_story_id; ?>" controls>
                                                                <source src='<?php echo path_to_story . $story->user_story_id; ?>.wav' type="audio/wav">
                                                            </audio></div>
                                                    </div> </td>

                                                <td>
                                                    <?php $dateRejected = date_create($story->time_approved); ?>

                                                    <?= date_format($dateRejected, 'd/m/y'); ?></td>
                                                <td colspan="4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <?php echo $story->disapproved_reason; ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="button"  data-storyid="<?php echo $story->user_story_id; ?>"  value="<?php echo $story->user_story_id; ?>" class="btn btn-success updateStory">Edit</button>
                                                        </div>
                                                    </div>
                                                    <div class="update" id = "updateStory-<?php echo $story->user_story_id; ?>" >
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
                                                                    <br> Reason:
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="dropdown" style="margin-top: 15px;">
                                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="<?php echo "btnStatus" . $story->user_story_id; ?>" data-toggle="dropdown">
                                                                        <?php
                                                                        echo 'Please Select:';
                                                                        ?>
                                                                        <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu" id="<?php echo $story->user_story_id; ?>">
<!--                                                                        <li id="status"><a>Approved</a></li>-->
                                                                        <li id="status"><a>Inappropriate</a></li>
                                                                        <li id="status"><a>Irrelevant</a></li>
                                                                        <li id="status"><a>Misinformation</a></li>
                                                                        <li id="status"><a>Inaudible</a></li>
                                                                        <li id="status"><a>Hang Up</a></li>
                                                                        <li id="status"><a>Silent</a></li>
                                                                        <li id="status"><a>Misplaced</a></li>
                                                                    </ul>
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
                                                </td>


                                            </tr>

                                            <?php
                                        }
                                    } else {
                                        ?>

                                        <tr>
                                            <?php
                                            echo '<td></td>';
                                            echo '<td></td>';
                                            echo '<td></td>';
                                            ?>
                                        </tr>



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

        $('.update').hide();
    });

    $('.updateStory').on('click', function () {
        var story_id = $(this).data('storyid');
        $('#updateStory-' + story_id).show();
    });
    $('.dropdown-menu #status a').on('click', function () {

        var story_id = $(this).parent().parent().attr('id');
        var status = $(this).text();
        $("#btnStatus" + story_id).html(status + " " + '<span class="caret"></span>');

    });

    function handleSendClick(button)
    {
        var admin_id = <?php echo $this->session->admin_id ?>;
        var story_status;
        var story_disapproval;
        var tag;
        var story_id = button.value;
        //Getting story status
        story_status = $('#btnStatus' + story_id).text();
           alert("id is " + story_id + "status is" + story_status);

        //Getting disapproval reason
        story_disapproval = $('#story_disapproval' + story_id).val();
        //Getting tag value
        tag = "NULL";

        alert('story_id=' + story_id + '&story_status=' + story_status + '&tag=' + tag + '&admin_id=' + admin_id);
        
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
