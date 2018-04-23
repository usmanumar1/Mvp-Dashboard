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
    <tdody>
        <tr>
            <th>
                <i class=" ace-icon fa fa-list-ol bigger-120"></i>
                Story #
            </th>
            <th>
                <i class=" ace-icon fa fa-user bigger-120"></i>
                User ID 
            </th>
            <th >
                <i class=" ace-icon fa fa-mobile bigger-120"></i>
                Call ID
            </th>
            <th>
                <i class=" ace-icon fa fa-clock-o bigger-120"></i>
                Time Story Recorded</th>
            <th>            
                <i class=" ace-icon fa fa-clock-o bigger-120"></i>
                Time Story Published</th>
            <th>
                <i class=" ace-icon fa fa-file-o"></i>
                Publish Status (On hotine)</th>
            <th>
                <i class="ace-icon fa fa-table bigger-120" ></i>

                Details
            </th>

        </tr>
        </tbody>
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
                        <td><?php echo $story->time_recorded; ?></td>
                        <td><?php
                            if ($story->approve_status == 1) {
                                echo $story->time_approved;
                            } else {
                                echo "N/A";
                            }
                            ?>
                        </td>
                        <td><?php
                            if ($story->approve_status == 1) {
                                echo "Yes";
                            } else {
                                echo "No";
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
                            <i class=" ace-icon fa fa-tasks"></i>
                            Story</th>
                        <th>
                            <i class=" ace-icon fa fa-check"></i>
                            Approval Status</th>
                        <th>
                            <i class=" ace-icon fa fa-times"></i>
                            Reason for disapproval</th>
                        <th>
                            <i class=" ace-icon fa fa-tags"></i>
                            Tags</th>
                        <th>
                            <i class=" ace-icon fa fa-file-o"></i>
                            Send</th>
                        <th>
                            <i class=" ace-icon fa fa-clock-o"></i>
                            Time Lapse</th>
                            <th>
                        <i class="fa fa-user" ></i>
                        Block User
                        </th> 

                    </tr>
                    <tr>
                        <td>
                            <audio id="<?php echo "audio" . $story->user_story_id; ?>" controls>
                                <source src='<?php echo path_to_story . $story->user_story_id; ?>.wav' type="audio/wav">
                            </audio><br>

                            <?php
                            if ($story->trans_upload_status == 1) {
                                ?>
                                <button type="button" class=" popover btn btn-primary bigger-120" data-toggle="popover" title="Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $story->story_urdu ?>"> Urdu Transcription</button>
                                <br><button type="button" class=" popover btn btn-sm btn-primary bigger-120" data-toggle="popover" title=" English" data-placement="top" data-trigger="focus"  data-content="<?php echo $story->story_english ?>"> English Transcription</button>
                                <br><button type="button" class=" popover btn  btn-primary bigger-120" data-toggle="popover" title="Roman Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $story->story_roman_urdu ?>">Roman Urdu Transcription</button>


                            <?php }
                            ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="<?php echo "btnStatus" . $story->user_story_id; ?>" data-toggle="dropdown">
                                    <?php
                                    if ($story->approve_status == 1) {
                                        echo 'Approved';
                                    } elseif ($story->approve_status == 2) {
                                        echo 'Rejected';
                                    } else {
                                        echo 'Pending';
                                    }
                                    ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" id="<?php echo $story->user_story_id; ?>">
                                    <li id="status"><a href="#">Approved</a></li>
                                    <li id="status"><a href="#">Rejected</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <select id="<?php echo "story_disapproval" . $story->user_story_id; ?>" disabled>
                                <?php
                                if ($story->disapproved_reason == "Inappropriate") {
                                    echo '<option value="Inappropriate">Inappropriate</option>';
                                } elseif ($story->disapproved_reason == "Irrelevant") {
                                    echo '<option value="Irrelevant">Irrelevant</option>';
                                } elseif ($story->disapproved_reason == "Misinformation") {
                                    echo '<option value="Misinformation">Misinformation</option>';
                                } elseif ($story->disapproved_reason == "Inaudible") {
                                    echo '<option value="Inaudible">Inaudible</option>';
                                } else {
                                    echo '<option value="NULL">Please Select</option>';
                                }
                                ?>
                                <option value="Inappropriate">Inappropriate</option>
                                <option value="Irrelevant">Irrelevant</option>
                                <option value="Misinformation">Misinformation</option>
                                <option value="Inaudible">Inaudible</option>
                            </select>
                        </td>
                        <td>
                            <select id="<?php echo "tag" . $story->user_story_id; ?>" disabled>
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
                            </select>
                        </td>
                        <td>
                            <?php
                            if ($story->approve_status != 0) {
                                ?>
                                <button type="button" id="<?php echo "story_push" . $story->user_story_id; ?>" onclick="handleSendClick(this)" value="<?php echo $story->user_story_id; ?>" class="btn btn-success">Update</button>
                                <?php
                            } else {
                                ?>
                                <button type="button" id="<?php echo "story_push" . $story->user_story_id; ?>" onclick="handleSendClick(this)" value="<?php echo $story->user_story_id; ?>" class="btn btn-success">Send</button>
                            <?php } ?>
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
                          <td>
                    <button type="button" id = "<?php echo "btn-status".$story->user_story_id;?>" onclick="handleBlockUserClick(this)" value="<?php echo $story->user_story_id;?>" class="btn btn-primary">
                        <?php if($story->block_status == 1){ echo "Un-Block";}else{ echo 'Block';}?>
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
                    echo '<td></td>';
                    ?>
                </tr>
            </tbody>
            <tbody>
                <tr>

                    <th>
                        <i class=" ace-icon fa fa-tasks"></i>
                        Story</th>
                    <th>
                        <i class=" ace-icon fa fa-check"></i>
                        Approval Status</th>
                    <th>
                        <i class=" ace-icon fa fa-times"></i>
                        Reason for disapproval</th>
                    <th>
                        <i class=" ace-icon fa fa-tags"></i>
                        Tags</th>
                    <th>
                        <i class=" ace-icon fa fa-file-o"></i>
                        Send</th>
                    <th>
                        <i class=" ace-icon fa fa-clock-o"></i>
                        Time Lapse</th> 
                        <th>
                        <i class="fa fa-user" ></i>
                        Block User
                        </th>   


                </tr>
                <tr>
                    <?php
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>'
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
    //When action of a question is changed
    $('.dropdown-menu #status a').on('click', function () {
        var story_id = $(this).parent().parent().attr('id');
        var status = $(this).text();

        if (status == "Approved") {
            $("#btnStatus" + story_id).html(status + " " + '<span class="caret"></span>');
            $('#story_disapproval' + story_id).attr('disabled', 'disabled');
            $('#tag' + story_id).attr('disabled', false);

        } else if (status == "Rejected") {
            $("#btnStatus" + story_id).html(status + " " + '<span class="caret"></span>');
            $('#story_disapproval' + story_id).attr('disabled', false);
            $('#tag' + story_id).attr('disabled', false);
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

        //Sending request to API
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#story_push" + story_id).html("Update");
            }
        };
        xmlhttp.open('GET', '<?php echo path_to_api; ?>Story/updateStoryStatus?story_id=' + story_id + '&story_status=' + story_status + '&story_disapproval=' + story_disapproval + '&tag=' + tag + '&admin_id=' + admin_id, true);
        xmlhttp.send();

    }

    function handleBlockUserClick(button){
        var story_id = button.value;
        var status;

        //Getting button text and setting block value
        var text = $('#btn-status' + story_id).text();
        var trimStr = $.trim(text);
        if(trimStr === "Block"){
            status = 1;
        }
        else{
            status = 0;
        }

        //Sending request to API
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //Setting alternate text
                if(trimStr === "Block"){
                    $('#btn-status' + story_id).html('Un-Block');
                }
                else{
                    $('#btn-status' + story_id).html('Block');
                }
            }
        };
        xmlhttp.open('GET', '<?php echo path_to_api;?>User/updateUserBlockStatus?source_id=' + story_id + '&status=' +status+ '&type=Story', true);
        xmlhttp.send();
    }

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










