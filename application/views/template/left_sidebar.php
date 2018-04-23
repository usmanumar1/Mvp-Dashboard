<ul class="nav nav-list">
            <li class="a">
                <a href="#">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Welcome <?php print_r($_SESSION['admin']); ?> </span>
                </a>

                <b class="arrow "></b>
            </li>
                          
            <li class="<?php echo ($title == "Questions New" ? "active" : "") ?> a row">

                <a class="active" href="<?php echo base_url(); ?>question/question_new">
                    <i class=" menu-icon ace-icon fa fa-signal "></i>

                    <span class="menu-text">
                        New  
                    </span><div  style="float: right; color: #222; font-size:medium;"><?= $new_total;?></div><br>
                </a>

            </li>
            <li class="<?php echo ($title == "Questions Assigned" ? "active" : "") ?> a row">
                <a class="active" href="<?php echo base_url(); ?>question/question_assigned">
                    <i class="menu-icon ace-icon fa fa-pencil "></i>

                    <span class="menu-text">
                        Assigned
                    </span><div style="float: right; color: #222; font-size:medium;"><?= $assigned_total;?></div><br>
                </a>
            </li>
            <li class="<?php echo ($title == "Questions Answered" ? "active" : "") ?> a row">
                <a class="active" href="<?php echo base_url(); ?>question/question_answered">
                    <i class="menu-icon ace-icon fa fa-bullhorn"></i>
                    <span class="menu-text">
                        Answered
                    </span><div style="float: right; color: #222; font-size:medium;"><?= $answered_total;?></div><br>
                </a>
            </li>

            <li class="<?php echo ($title == "Questions Uploaded" ? "active" : "") ?> a row">
                <a class="active" href="<?php echo base_url(); ?>question/question_uploaded">
                    <i class="menu-icon ace-icon fa fa-upload"></i>
                    <span class="menu-text">
                        Uploaded
                    </span><div style="float: right; color: #222; font-size:medium;"><?= $uploaded_total;?></div>
                </a>
            </li>
            <li class="<?php echo ($title == "Questions Faq" ? "active" : "") ?> a row">
                <a class="active" href="<?php echo base_url(); ?>question/question_faq">
                    <i class="menu-icon ace-icon fa fa-users"></i>
                    <span class="menu-text">
                        FAQs
                    </span><div style="float: right; color: #222; font-size:medium;"><?= $faq_total;?></div>
                </a>
            </li>
            <li class="<?php echo ($title == "Questions Ignored" ? "active" : "") ?> a row">
                <a class="active" href="<?php echo base_url(); ?>question/question_ignored_etc">
                    <i class="menu-icon ace-icon fa fa-flag"></i>
                    <span class="menu-text">
                        Ignored, etc.
                    </span><div style="float: right; color: #222; font-size:medium;"><?= $ignoredEtc_total;?></div>


                </a>

            </li><br>


        </ul>