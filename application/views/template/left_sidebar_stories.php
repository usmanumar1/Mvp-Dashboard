<ul class="nav nav-list">
            <li class="a">
                <a href="#">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Welcome <?php print_r($_SESSION['admin']); ?> </span>
                </a>

                <b class="arrow "></b>
            </li>
                          
            <li class="<?php echo ($title == "Stories New" ? "active" : "") ?> a row">

                <a class="active" href="<?php echo base_url(); ?>story/storyNew">
                    <i class=" menu-icon ace-icon fa fa-signal "></i>

                    <span class="menu-text">
                        New  
                    </span>
                    <div  style="float: right; color: #222; font-size:medium;"><?= $new_total;?></div><br>
                </a>

            </li>
            <li class="<?php echo ($title == "Stories Approved" ? "active" : "") ?> a row">
                <a class="active" href="<?php echo base_url(); ?>story/storyApproved">
                    <i class="menu-icon ace-icon fa fa-pencil "></i>

                    <span class="menu-text">
                        Approved
                    </span>
                    <div style="float: right; color: #222; font-size:medium;"><?= $story_approved_total;?></div><br>
                </a>
            </li>
            <li class="<?php echo ($title == "Stories Rejected" ? "active" : "") ?> a row">
                <a class="active" href="<?php echo base_url(); ?>story/storyRejected">
                    <i class="menu-icon ace-icon fa fa-flag"></i>
                    <span class="menu-text">
                        Rejected,etc.
                    </span>
                    <div style="float: right; color: #222; font-size:medium;"><?= $story_rejected_total;?></div><br>
                </a>
            </li>



        </ul>
<br>