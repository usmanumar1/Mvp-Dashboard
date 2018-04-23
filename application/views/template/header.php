<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$voice_artist_restricted_pages = array(
    base_url() . "question",
    base_url() . "question/transcription",
    base_url() . "story",
    base_url() . "story/transcription",
    base_url() . "comment",
    base_url() . "comment/transcription",
    base_url() . "feedback",
    base_url() . "feedback/transcription",
    base_url() . "users",
    base_url() . "doctor_new",
    base_url() . "doctors");
$content_moderator_restricted_pages = array(
    base_url() . "answer",
    base_url() . "story",
    base_url() . "question",
    base_url() . "comment",
    base_url() . "feedback",
    base_url() . "users",
    base_url() . "doctor_new",
    base_url() . "doctors");
$voice_artist = ['base_url' . "answer"];
$current = base_url(uri_string());
//echo("<pre>");
//echo(print_r($_SESSION));
//echo("</pre>");
//die;
if ($_SESSION['admin_role'] === "voice_artist" && in_array($current, $voice_artist_restricted_pages)) {
    echo("Access Denied Click Here to <a href='" . base_url() . "answer'>Go Back</a> ");
    die;
} elseif ($_SESSION['admin_role'] === "content_moderator" && in_array($current, $content_moderator_restricted_pages)) {
    echo("Access Denied Click Here to <a href='" . base_url() . "question/transcription'>Go Back</a> ");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title ?></title>
        <link rel="icon"
              type="image/png"
              href="<?php echo base_url() ?>main_logo.png"/>



        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
        <script src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

        <!-----------------------ace-admin scripts--------------------------------------------------------->


        <script src="<?php echo base_url() . "assets1/"; ?>assets/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url() . "assets1/"; ?>assets/js/ace.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url() . "assets1/"; ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() . "assets1/"; ?>assets/font-awesome/4.2.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="<?php echo base_url() . "assets1/"; ?>assets/css/jquery-ui.custom.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() . "assets1/"; ?>assets/css/chosen.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() . "assets1/"; ?>assets/css/datepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() . "assets1/"; ?>assets/css/bootstrap-timepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() . "assets1/"; ?>assets/css/daterangepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() . "assets1/"; ?>assets/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() . "assets1/"; ?>assets/css/colorpicker.min.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo base_url() . "assets1/"; ?>assets/fonts/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url() . "assets1/"; ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />













        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Rah-e-maa MVP</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />



        <!--------------------------------------------------------------------------------------------------------->

    </head>

    <body>
        <nav class="navbar navbar-inverse ">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Rah-e-maa MVP</a>
                </div>
                <ul class="nav navbar-nav">
                    <?php
                    if ($_SESSION['admin_role'] == "admin") {
                        ?>


                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Questions
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="<?php echo ($title == "Questions" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>question">Questions</a></li>
                                <li class="<?php echo ($title == "Questions New" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>question/question_new">New Questions</a></li>

                            </ul>
                        </li>

                        <li class="<?php echo ($title == "Answer - Voice Artist" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>answer">Answer Upload</a></li>
                        <li class="<?php echo ($title == "Main Feedback" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>feedback">Main Feedback</a></li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Stories
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="<?php echo ($title == "Stories" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>story">Stories</a></li>
                                <li class="<?php echo ($title == "Stories New" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>story/storyNew">Stories New</a></li>

                            </ul>

                        </li>
                        <li class="<?php echo ($title == "Comment on Story" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>comment">Comment on Story</a></li>
                        <ul class="nav navbar-nav navbar-right">


                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transcriptions
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="<?php echo ($title == "Question Transcription" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>question/transcription">Questions Transcription</a></li>
                                    <li class="<?php echo ($title == "Feedback Transcription" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>feedback/transcription">Feedback Transcription</a></li>
                                    <li class="<?php echo ($title == "Story Transcription" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>story/transcription">Story Transcription</a></li>
                                    <li class="<?php echo ($title == "Comment Transcription" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>comment/transcription">Comment Transcription</a></li>
                                </ul>
                            </li>
                        </ul>

                         <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Doctors
                                <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                        <li class="<?php echo ($title == "Doctors" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>doctors">Doctors</a></li>
                                <li class="<?php echo ($title == "Doctors New" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>doctor_new">Approve New Doctors</a></li>

                            </ul>

                        </li>
                        
                        
                        
                        
                        
                        <li class="<?php echo ($title == "Users" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>users">Users</a></li>

                    </ul>
                <?php } elseif ($_SESSION['admin_role'] == "content_moderator") {
                    ?>
                    <li class="<?php echo ($title == "Comment Transcription" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>comment/transcription">Comment Transcription</a></li>
                    <li class="<?php echo ($title == "Story Transcription" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>story/transcription">Story Transcription</a></li>
                    <li class="<?php echo ($title == "Question Transcription" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>question/transcription">Questions Transcription</a></li>
                    <li class="<?php echo ($title == "Feedback Transcription" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>feedback/transcription">Feedback Transcription</a></li>

                    </ul>
                    <?php
                } else {
                    ?>
                    <li class="<?php echo ($title == "Answer Upload" ? "active" : "") ?>"><a href="<?php echo base_url(); ?>answer">Answer Upload</a></li>
                    </ul>

                    <?php
                }
                ?>
                <ul class="nav navbar-nav navbar-right">


                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->admin ?></a></li>
                            <li><a href="<?php echo base_url(); ?>logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="main-container ace-save-state" id="main-container">
            <?php if ($title === "Questions New" || "Questions Ignored" || "Questions Assigned" || "Questions Answered" || "Questions Uploaded" || "Questions Faq") {
                
            } else { ?>

                <h3 class="text-center"><?php echo $title ?></h3><br>
                <!--        <h3>Number of days since launch: --><?php //echo $launch_days;             ?><!--</h3>-->
            <?php
            }

            