<div id="cl-wrapper">
    <!--Sidebar item function-->
    <!--Sidebar sub-item function-->
    <div class="cl-sidebar">
        <div class="cl-toggle"><i class="fa fa-bars"></i></div>
        <div class="cl-navblock">
            <div class="menu-space">
                <div class="content">
                    <div class="side-user">
                        <!--title-->
                    </div>
                    <ul class="cl-vnavigation">
                        <li><a href="#"><i class="fa fa-futbol-o"></i><span>ข้อมูลนักกีฬา</span></a>
                            <ul class="sub-menu">
                                <!--    AngurlarJS <li> <a href="#/sports">ประเภท กีฬา</a >-->
                                <li onclick="load_Sport('1');"><a href="">ประเภท กีฬา</a> </li>
                               
                                <li onclick="load_list('1');"><a href="">รายชื่อนักกีฬา แต่ละประเภท</a> </li>
                                <!--<li onclick="upload();"><a href="">test</a> </li>-->
<!--                                <li><a href="#/test"><span class="label label-primary pull-right">New</span>Version 2</a>
                                </li>-->
                            </ul>
                        </li>

                    </ul>
                    <ul class="cl-vnavigation">
                        <li><a href="#"><i class="fa fa-users"></i><span>ข้อมูลอาจารย์เจ้าหน้าที่</span></a>
                            <ul class="sub-menu">                               
                                <li onclick="load_Sport('2');"><a href="">เพิ่มข้อมูลอาจารย์/เจ้าหน้าที่</a> </li>  
                                <li onclick="load_list('2');"><a href="">รายชื่อผู้บริหาร/อาจารย์/เจ้าหน้าที่</a> </li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="cl-vnavigation">
                        <li><a href="#"><i class="fa fa-users"></i><span>เอกสาร</span></a>
                            <ul class="sub-menu">                               
                                <li onclick="load_paper();"><a href="">เอกสารต่างๆ</a> </li>                          
                            </ul>
                        </li>

                    </ul>
                    <?php
                    $Lid = $this->session->userdata('Lid');
                   
                    if ($Lid == "1") {
                    ?>
                    <ul class="cl-vnavigation">
                        <li><a href="#"><i class="fa fa-users"></i><span>รายงาน</span></a>
                            <ul class="sub-menu">                               
                                <li onclick="load_detial();"><a href="">ออกรายงานรายชื่อนักกีฬา</a> </li>                          
                            </ul>
                        </li>

                    </ul>
                    <?php
                    }
                    ?>
                    
                </div>
            </div>
            <div class="search-field collapse-button">
                <input type="text" placeholder="Search..." class="form-control search">
                <button id="sidebar-collapse" class="btn btn-default"><i class="fa fa-angle-left"></i>
                </button>
            </div>
        </div>
    </div>
    