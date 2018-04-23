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
                    <li class="active">Approved</li>
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


                            <table id="report" class="table table-bordered table-hover table-striped auto width-95" style= "margin: auto; background-color:#ccffff;">
                                <tbody>

                                    <tr>

                                        <th colspan="">
                                            <div style=" margin-right: 10px; float: left;"> 
                                                <i class=" ace-icon fa fa-list bigger-120"></i>   
                                            </div> #

                                        </th>
                                        <th colspan="">
                                            <div style="margin-left:120px; margin-right: 10px; float: left;">
                                                <i class=" margin-10 ace-icon fa fa-tasks bigger-120"></i>
                                            </div>Story
                                        </th>
                                        <th>
                                            <div style=" margin-right: 10px; float: left;">
                                                <i class=" margin-10 ace-icon fa fa-calendar bigger-120"></i>
                                            </div>Date Approved
                                            <div style="  float: right;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_time=asc">
                                                    <i class="fa fa-sort-asc bigger-140"></i> </a>
                                            </div>
                                            <div style=" margin-right:-10px; margin-top: 10px; float: right;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_time=desc"> 
                                                    <i class="fa fa-sort-desc bigger-140"></i></a>
                                            </div>
                                        </th>

                                        <th>
                                            <div style=" margin-right: 10px; float: left;">
                                                <i class="ace-icon fa fa-bullhorn bigger-120"></i>
                                            </div> # of listens
                                            <div style="  float: right;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_listens=asc">
                                                    <i class="fa fa-sort-asc bigger-140"></i> </a>
                                            </div>
                                            <div style=" margin-right:-10px; margin-top: 10px; float: right;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_listens=desc">   <i class="fa fa-sort-desc bigger-140"></i></a>
                                            </div>
                                        </th>
                                        <th>
                                            <div style=" margin-right: 10px; float: left;">
                                                <i class="ace-icon fa fa-thumbs-up bigger-120" ></i>

                                            </div># of likes
                                            <div style="  float: right;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_likes=asc">
                                                    <i class="fa fa-sort-asc bigger-140"></i> </a>
                                            </div>
                                            <div style=" margin-right:-10px; margin-top: 10px; float: right;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_likes=desc">   <i class="fa fa-sort-desc bigger-140"></i></a>
                                            </div>
                                        </th>
                                        <th>
                                            <div style=" margin-right: 10px; float: left;">
                                                <i class="ace-icon fa fa-thumbs-down bigger-120" ></i>

                                            </div># of dislikes
                                            <div style="  float: right;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_dislikes=asc">
                                                    <i class="fa fa-sort-asc bigger-140"></i> </a>
                                            </div>
                                            <div style=" margin-right:-10px; margin-top: 10px; float: right;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_dislikes=desc">   <i class="fa fa-sort-desc bigger-140"></i></a>
                                            </div>

                                        </th>
                                        <th>
                                            <div style=" margin-right: 10px; float: left; text-align: center;">
                                                <i class="ace-icon fa fa-trash bigger-120" ></i>

                                            </div># of times<br> marked as inappropriate
                                            <div style="  float: right; margin-top: -15px;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_inappropriate=asc">
                                                    <i class="fa fa-sort-asc bigger-140"></i> </a>
                                            </div>
                                            <div style=" margin-right:-10px; margin-top: -5px; float: right;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_inappropriate=desc">   <i class="fa fa-sort-desc bigger-140"></i></a>
                                            </div>

                                        </th>
                                        <th colspan="3">
                                            <div style=" margin-right: 10px; float: left;">
                                                <i class="ace-icon fa fa-users bigger-120" ></i>

                                            </div># of approved comments
                                            <div style="  float: right;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_comments=asc">
                                                    <i class="fa fa-sort-asc bigger-140"></i> </a>
                                            </div>
                                            <div style=" margin-right:-10px; margin-top: 10px; float: right;">
                                                <a href="<?php echo base_url(); ?>story/storyApproved?order_by_comments=desc">   <i class="fa fa-sort-desc bigger-140"></i></a>
                                            </div>


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
                                    if ($stories) {
                                        foreach ($stories as $story) {
                                            ?>
                                            <tr>
                                                <td colspan="">
                                                    <!--<div class="row">-->
                                                    <div class="col-md-1">
                                                        <?php echo $story->user_story_id; ?>
                                                    </div>
                                                    <!--<div class="col-md-4" style="width: 30%;">--> 

                                                </td>
                                                <td colspan="">
                                                    <!--<div class="row">-->

                                                    <!--<div class="col-md-4" style="width: 30%;">--> 
                                                    <audio id="<?php echo "audio" . $story->user_story_id; ?>" controls>
                                                        <source src='<?php echo path_to_story . $story->user_story_id; ?>.wav' type="audio/wav">
                                                    </audio>
                                                    <!--</div>-->
                                                    <!--</div>-->
                                                </td>
                                                <td>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <?php $dateAssigned = date_create($story->time_approved); ?>
                                                            <?= date_format($dateAssigned, 'd/m/y'); ?>
                                                        </div>
                                                    </div>



                                                </td>
                                                <td>
                                                    <?php echo $story->no_of_listens; ?>

                                                </td>
                                                <td><?php echo $story->story_like; ?></td>

                                                <td><?php echo $story->story_dislike; ?></td>
                                                <td><?php echo $story->no_of_inappropriate; ?></td>
                                                <td colspan="3">
                                                    <?php $date = date_create($story->time_recorded); ?>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <?= $story->story_comments; ?>
                                                        </div> 
                                                        <div class="col-md-8"><button type="button" class=" popover  btn btn-danger" 
                                                                                      data-toggle="popover" title=" Details" data-placement="top"
                                                                                      data-trigger=""  data-content="User ID: <?php echo($story->user_id); ?><br> Call ID: <?php echo($story->call_id); ?><br> 
                                                                                      " data-html="true">
                                                                <i class="fa fa-ellipsis-h bigger-140 btn-sm"></i> 
                                                            </button>
                                                        </div>


                                                    </div>
                                                </td>  
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <button type="button"  data-storyid="<?php echo $story->user_story_id; ?>"  value="<?php echo $story->user_story_id; ?>" class="btn btn-success updateStory">Edit</button>
                                                        </div>
                                                    </div>

                                                    <div class="update" id = "updateStory-<?php echo $story->user_story_id; ?>" >
                                                        <div class="row">


                                                            <div class="col-md-3">
                                                                <div class="dropdown" style="margin-top: 15px;">
                                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="<?php echo "btnStatus" . $story->user_story_id; ?>" data-toggle="dropdown">
                                                                        <?php
                                                                        echo 'Please Select:';
                                                                        ?>
                                                                        <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu" id="<?php echo $story->user_story_id; ?>">
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


    $(document).ready(function () {

        $('.update').hide();
//        $('.approved').hide();

    });


    $('.updateStory').on('click', function () {
        var story_id = $(this).data('storyid');
        $('#updateStory-' + story_id).show();
        var action = $(this).text();
//        if (action === "Approved")
//        {
//
//            $('#approved-' + story_id).show();
//            // $('#tag' + story_id).attr('disabled', false);
//
//        }
    });

    $('.dropdown-menu #status a').on('click', function () {
        var story_id = $(this).parent().parent().attr('id');
        var status = $(this).text();
        var action = $(this).text();

//        if (action === "Approved")
//        {
//
//            $("#btnStatus" + story_id).html(status + " " + '<span class="caret"></span>');
//            $('#approved-' + story_id).show();
//            // $('#tag' + story_id).attr('disabled', false);
//
//        } else
        //  {
        //alert(status);
        $("#btnStatus" + story_id).html(status + " " + '<span class="caret"></span>');
        $('#rejected-' + story_id).show();
        //$('#story_disapproval' + story_id).attr('disabled', false);
        // $('#tag' + story_id).attr('disabled', false);

        // }

    });

    function handleSendClick(button)
    {
        var admin_id = <?php echo $this->session->admin_id ?>;
        var story_status;
        var story_disapproval;
        var tag;
        var story_id = button.value;
        var story_edit = 1;
        //Getting story status
        story_status = $('#btnStatus' + story_id).text();
        //Getting disapproval reason
        story_disapproval = $('#story_disapproval' + story_id).val();
        //Getting tag value
        tag = $('#tag' + story_id).val();
        if (story_status.indexOf("Please") >= 0) {
            alert("Please select Story Action");
            return;
        }
        if (tag === "NULL" && story_status.indexOf("Approved") >= 0) {
            alert("Please select tag first");
            return;
        }
       // alert('story_id=' + story_id + '&story_status=' + story_status + '&story_edit=' + story_edit + '&tag=' + tag + '&admin_id=' + admin_id);
        //Sending request to API
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#story_push" + story_id).html("Update");
            }
        };
        xmlhttp.open('GET', '<?php echo path_to_api; ?>Story/updateStoryStatusNew?story_id=' + story_id + '&story_status=' + story_status + '&tag=' + tag + '&story_edit=' + story_edit + '&admin_id=' + admin_id, true);
        xmlhttp.send();
        location.reload();
    }



    $(".popover").popover();
</script>
</div>
</body>

</html>
