<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
    th{
        white-space: nowrap;
    }

    textarea{
        width: 200px;
        min-width:200px;
        max-width:200px;

        height:100px;
        min-height:100px;
        max-height:100px;
    }
   
     .table {
    border-radius: 5px;
    width: 98%;
    margin: 0px auto;
    float: none;
}
</style>

<div style="float: left; width: 80%;">
    <table class="table table-bordered table-hover table-striped auto" style="">
        <thead>
            <tr>
                <th>
                    <i class="ace-icon fa fa-list-ol bigger-120" ></i>
                    Sr. #</th>
                <th>
                    <i class="ace-icon fa fa-envelope-square bigger-120" ></i>
                    Message Type</th>
                <th>
                    <i class="ace-icon fa fa-envelope bigger-120" ></i>
                    Message</th>
                <th>
                    <i class="ace-icon fa fa-clock-o bigger-120" ></i>
                    Message Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            if ($responses) {
                foreach ($responses as $response) {
                    ?>
                    <tr>
                        <td><?php echo $response->response_id; ?></td>
                        <td><?php echo $response->response_type; ?></td>
                        <td><?php echo $response->response; ?></td>
                        <td><?php echo $response->response_time; ?></td>
                    </tr>
                <?php
                }
            } else {
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
            }
            ?>

        </tbody>
    </table>
</div>
<div style="float: left; width: 15%">
<div class="form-group chat-box widget-content" align="" style="float: left;">
    <textarea class="form-control" id = "response_reply"></textarea>
    <br>
    <button type="button" onclick="handleReplySaveButtonClick(this)" value= "<?php echo $doctor_id ?>" class="btn btn-success">Send Reply</button>
</div>

<div style="float: left; "><p class="nav navbar-nav">Click Chat Icon To Answer</p><br>
    <button class="chat btn-minimize"><h2><i class="i_icon green bigger-240 fa fa-comments "></i></h2></button></div><br>
    </div>

<!-- Pagination -->
<div class="row" style="margin-left: -330px;">
    <div class="col-md-12 text-center">
        <?php echo $links ?>
    </div>
</div>

<script>
    //Saving a new reply
    function handleReplySaveButtonClick(button) {
        var doctor_id = button.value;
        var response_reply = $("#response_reply").val();
        if (response_reply == "") {
            alert("please enter some text");
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    $("#response_reply").val('');
                    alert("Answer has been sent");

                }
            };
            xmlhttp.open("GET", "<?php echo path_to_api; ?>Doctor/saveResponseReply?doctor_id=" + doctor_id + "&response_reply=" + response_reply, true);
            xmlhttp.send();

        }
    }
    $('td').each(function () {
        // get table cell value
        var findValue = ($(this).text());
        // if value is equal to "admin" then change its color

        if (findValue == "admin") {
            // get table row
            var adminRow = $(this).parent();
            // change the background color to red
            adminRow.css('background-color', 'lightblue');
        }
    });


    $(document).ready(function () {
        $(".chat-box").hide();

    });
    $("button").click(function () {
        $(this).toggleClass('btn btn-primary');
        $("div.chat-box").slideToggle();

    });
</script>

</div>
</body>

</html>










