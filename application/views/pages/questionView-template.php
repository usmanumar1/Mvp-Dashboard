<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
    <table class="table table-bordered table-hover table-striped auto">
        <thead>
        <tr>
            <th>#</th>
            <th>user id</th>
            <th>call id</th>
            <th>audio file</th>
            <th>Listened Before</th>
            <th>Time</th>
            <th>Status</th>
            <th>Status By</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $count = 0;
        if($questions) {

            foreach ($questions as $question) {
                ?>
                <tr>
                    <td><?php echo $question->question_id; ?></td>
                    <td><?php echo $question->user_id; ?></td>
                    <td><?php echo $question->call_id; ?></td>
                    <td>
                        <audio id="<?php echo "audio".$question->question_id;?>" onplay="audioClick(<?php echo $question->question_id ?>)" controls>
                            <source src='<?php echo path_to_question.'Q'.$question->question_id;?>.wav' type="audio/wav">
                        </audio>
                    </td>
                    <!----Listened Before------->
                    <td>
                        <?php
                        if($question->isListened == 1)
                        {
                            ?>
                            <input id="<?php echo "isListened".$question->question_id;?>" class ="check" checked type="checkbox" name="approve" disabled>
                        <?php }
                        else
                        {?>
                            <input id="<?php echo "isListened".$question->question_id;?>" class ="check" type="checkbox" name="approve" disabled>
                        <?php }?>
                    </td>
                    <!----Listened Before------->
                    <td><?php echo $question->timestamp; ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="<?php echo "btnStatus".$question->question_id;?>" data-toggle="dropdown">
                                <?php
                                if($question->approved == 1) {
                                    echo "Send to Doctor";
                                }
                                elseif($question->approved == 2) {
                                    echo "Inappropriate";
                                }
                                elseif($question->approved == 3) {
                                    echo "Irrelevant";
                                }
                                elseif($question->approved == 4) {
                                    echo "Inaudible";
                                }
                                elseif($question->approved == 5) {
                                    echo "Irresponsive";
                                }
                                elseif($question->approved == 0) {
                                    echo "Please Select:";
                                }
                                ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" id="<?php echo $question->question_id;?>">
                                <li><a href="#">Send to Doctor</a></li>
                                <li><a href="#">Inappropriate</a></li>
                                <li><a href="#">Irrelevant</a></li>
                                <li><a href="#">Inaudible</a></li>
                                <li><a href="#">Irresponsive</a></li>
                            </ul>
                        </div>


                    </td>
                    <td id="<?php echo "status_by".$question->question_id;?>">
                        <?php if(isset($question->status_by)){echo $question->status_by;}else{echo "N/A";} ?>
                    </td>

                </tr>
            <?php }
        }
        else
        {
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
        }?>

        </tbody>
    </table>
    <hr>

<!-- Pagination -->
<div class="row">
    <div class="col-md-12 text-center">
        <?php echo $links ?>
    </div>
</div>

<script>

    //When status of a question is changed
    $('.dropdown-menu li a').on('click', function(){
        var question_id = $(this).parent().parent().attr('id');
        var status = $(this).text();
        var admin_id = <?php echo $this->session->admin_id?>;
        var approved;

        if(status == "Inappropriate")
        {
            approved = 2;
        }
        else if(status == "Irrelevant")
        {
            approved = 3;
        }
        else if(status == "Inaudible")
        {
            approved = 4;
        }
        else if(status == "Send to Doctor")
        {
            approved = 1;
        }
        else if(status == "Irresponsive")
        {
            approved = 5;
        }


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                $("#btnStatus"+question_id).html(status +" "+ '<span class="caret"></span>');
                $('#status_by'+question_id).html(xmlhttp.responseText);
            }
        };
        xmlhttp.open('GET', '<?php echo path_to_api;?>Question/updateQuestionApprovedStatus?question_id=' + question_id + '&approved=' + approved + '&admin_id=' +admin_id, true);
        xmlhttp.send();
    });

    //When question audio file is played
    function audioClick(question_id)
    {
        var admin_id = <?php echo $this->session->admin_id?>;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $('#isListened'+question_id).attr('checked', true);
            }
        };
        xmlhttp.open("GET", "<?php echo path_to_api;?>Question/insertQuestionListenBeforeStatus?question_id="+question_id +"&admin_id=" +admin_id ,true);
        xmlhttp.send();
    }
</script>
</div>
</body>

</html>










