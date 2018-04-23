<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
    th{
        white-space: nowrap;
    }
    .myProgress {
        width: 100%;
        background-color: grey;
    }
    .myBar {
        width: 1%;
        height: 30px;
        background-color: green;
        text-align: center;
    }
 
    .table {
        border-radius: 5px;
        width: 95%;
        margin: 0px auto;
        float: none;
    }
</style>

<input type="text" id="search" placeholder="Type Doctor ID to search..."   style=" clear: both; margin-left: 35px; margin-top: -5px; margin-bottom:5px;  width:200px;">
<table class="table table-bordered table-hover table-striped auto">
    <thead>
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
            <th><i class="ace-icon fa fa-user-md bigger-120 " ></i>
                Doctor ID
            </th>
            <th><i class="ace-icon fa fa-pencil-square-o bigger-120 " ></i>
                Answer
            </th>
            <th><i class="ace-icon fa fa-clock-o bigger-120" ></i>
                Time Lapse
            </th>
            <th><i class="ace-icon fa fa-upload bigger-120" ></i>
                Upload
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        if ($answers) {

            foreach ($answers as $answer) {
                ?>
                <tr>
                    <td><?php echo $answer->question_id; ?></td>
                    <td><?php echo $answer->user_id; ?></td>
                    <td><?php echo $answer->call_id; ?></td>
                    <td><?php echo $answer->doctor_id; ?></td>
                    <td>
                        <?php
                        if ($answer->answer_text == null) {
                            ?>
                            <audio controls>
                                <source src='<?php echo path_to_doctor_answer . 'A' . $answer->answer_id; ?>.wav' type="audio/wav">
                            </audio><br>
                           
                            <button type="button" data-btn_upload_orignal="<?php echo $answer->answer_id; ?>" class="btn btn-success btn_upload_orignal">Upload Orignal</button>
                          <div id="alert-msg-<?php echo $answer->answer_id?>" class="alert-msg" style="color: green;"></div>
 <?php
                        } else {
                            //print_r($answer->answer_text);
                            echo $answer->answer_text;
                            echo "<br>";
                        }
                        if (property_exists($answer, "answer_transcription")) {
                            ?>
                            <button type="button" class=" popover btn  btn-primary bigger-140" data-toggle="popover" title="Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $answer->answer_urdu ?>"> Urdu Transcription</button>
                            <button type="button" class=" popover btn  btn-primary bigger-120" data-toggle="popover" title=" English" data-placement="top" data-trigger="focus"  data-content="<?php echo $answer->answer_english ?>"> English Transcription</button>
                            <button type="button" class=" popover btn  btn-primary bigger-120" data-toggle="popover" title="Roman Urdu" data-placement="top" data-trigger="focus"  data-content="<?php echo $answer->answer_roman_urdu ?>">Roman Urdu Transcription</button>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if($answer->approve_status == 1) {
                            echo 'Time since answer was saved until file was uploaded: ' . $answer->time_duration;
                        }
                        else{
                            echo "N/A";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($answer->approve_status == 1) {
                            ?>
                            <audio controls>
                                <source src='<?php echo path_to_answer . 'A' . $answer->answer_id; ?>.wav' type="audio/wav">
                            </audio>
                            <?php
                        } else {
                            ?>
                            <!----Uploading Audio--->
                            <form id="upload" class="input-group" action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="<?php echo "question_id" . $answer->answer_id; ?>" value="<?php echo $answer->question_id; ?>">
                                <label for="audioToUpload">Select audio to upload:</label>
                                <input type="file"  name="audio_path" id="<?php echo "audio_path" . $answer->answer_id; ?>" required />
                                <br>
                                <span class="input-group-btn">
                                    <button type="button" id="<?php echo "btn_upload" . $answer->answer_id; ?>" onclick="uploadAudio(<?php echo $answer->answer_id ?>)" class="btn btn-success">Upload</button>
                                </span>
                            </form>

                            <!-----Progress Bar---->
                            <div style="display:none;" id="<?php echo "progress-bar" . $answer->answer_id; ?>" class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div style="display:none;" class="myProgress" id="<?php echo "myProgress" . $answer->answer_id; ?>">
                                <div class="myBar" id="<?php echo "myBar" . $answer->answer_id; ?>"></div>
                            </div>

                            <?php
                        }
                        ?>
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
    
    
    
    

                $(function () {
                    
                    $(".btn_upload_orignal").on("click", function (event) {
                   var answer_id = $(this).data('btn_upload_orignal');
                    var admin_id = <?php echo $this->session->admin_id?>;
                    var question_id = document.getElementById('question_id' + answer_id).value;
                        $.ajax({
                            method: "POST",
                            
                            url: "<?php echo path_to_api; ?>Answer/uploadAnswerAudioOrignal",
                            data: {question_id:  question_id, admin_id: admin_id, answer_id: answer_id }
                        }).done(function (msg) {
                            $('#alert-msg-' + answer_id).text('Audio Sent Successfully .');
                            $('#row-' + answer_id).hide();

                            setTimeout(function () {
                                $('#alert-msg-' + answer_id).text('');
                            }, 3000);
                        });
                        return false;
                    });
                });
           
    
    
    
    //Uploading Audio
    function uploadAudio(answer_id) {
        var audioSelect = document.getElementById('audio_path' + answer_id);
        var uploadButton = document.getElementById("btn_upload" + answer_id);
        var progress_bar = document.getElementById("progress-bar" + answer_id);
        var audioProgress = document.getElementById("myProgress" + answer_id);
        var bar = document.getElementById("myBar" + answer_id);
        var admin_id = <?php echo $this->session->admin_id?>;



        if (audioSelect.checkValidity() == true)
        {
            var question_id = document.getElementById('question_id' + answer_id).value;
            uploadButton.innerHTML = 'Uploading...';

            var audio = audioSelect.files[0];
            alert(audioSelect);
            var data = new FormData();
            data.append('audio_path', audio);


            var xhr = new XMLHttpRequest();
            xhr.open('POST', "<?php echo path_to_api; ?>Answer/uploadAnswerAudio?answer_id=" + answer_id + "&question_id=" + question_id+ "&admin_id="+admin_id, true);

            //Upload progress
            xhr.upload.addEventListener("progress", function (evt) {
                document.getElementById("myProgress" + answer_id).style.display = "block";
                if (evt.lengthComputable)
                {

                    var percentComplete = parseInt((evt.loaded / evt.total) * 100);
                    bar.innerHTML = percentComplete + "%";
                    bar.style.width = percentComplete + "%";
                }
            }, false);

            // When the request has completed (either in success or failure).
            xhr.upload.addEventListener('loadend', function (e) {
                uploadButton.innerHTML = 'Uploaded...';
                bar.innerHTML = "Processing Audio....";


            });

            // the transfer has completed and the server closed the connection.
            xhr.onreadystatechange = function ()
            {
                //uploadButton.innerHTML = 'Upload';
                document.getElementById("myProgress" + answer_id).style.display = "none";
                audioSelect.value = "";


                if (xhr.status == 200 && xhr.readyState == 4)
                {
                    if (xhr.responseText != "Uploaded")
                    {
                        uploadButton.innerHTML = 'Upload';
                        alert(xhr.responseText);
                    }
                    //document.getElementById("alert-success").style.display = "block";
                }
                /*else
                 {
                 alert("Recording not uploaded");
                 //document.getElementById("alert-warning").style.display = "block";
                 }*/
            };

            //Send the Data.
            xhr.send(data);
        }
    }
    $("#search").keyup(function () {
        var value = this.value;

        $("table").find("tr").each(function (index) {
            if (index === 0)
                return;
            var id = $(this).find("td").first().next().next().next().text();
            $(this).toggle(id.indexOf(value) !== -1);
        });
    });
    $(".popover").popover();

</script>


</div>
</body>

</html>










