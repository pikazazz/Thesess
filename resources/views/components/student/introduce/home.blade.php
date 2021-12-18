@extends('layouts.app')


@section('header-content')


        <div>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>การทำโครงงานทางด้านวิทยาการคอมพิวเตอร์</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Timeline</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- Timelime example  -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red">โครงงานทางด้านวิทยาการคอมพิวเตอร์</span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                        <h3 class="timeline-header"> โครงงานทางด้านวิทยาการคอมพิวเตอร์ หมายถึง</h3>

                                        <div class="timeline-body">
                                            กิจกรรมการเรียนที่นักเรียนมีอิสระในการเลือกศึกษาปัญหาที่ตนเองสนใจโดยจะต้องวางแผนการดำเนินงาน
                                            ศึกษา พัฒนาโปรแกรม โดยใช้ความรู้ทางกระบวนการวิศวกรรมซอฟต์แวร์
                                            เครื่องคอมพิวเตอร์และอุปกรณ์ที่เกี่ยวข้อง
                                            ตลอดจนทักษะพื้นฐานในการพัฒนาโครงงาน เรื่องที่นักเรียนสนใจและคิดจะทำโครงงาน
                                            ซึ่งอาจมีผู้ศึกษามาก่อน
                                            หรือเป็นเรื่องที่นักพัฒนาโปรแกรมได้เคยค้นคว้าและพัฒนาแล้ว
                                            นักเรียนสามารถทำโครงงานเรื่องดังกล่าวได้
                                            แต่ต้องคิดดัดแปลงแนวทางในการศึกษา การวิเคราะห์ข้อมูล การพัฒนาโปรแกรม
                                            หรือศึกษาเพิ่มเติมจากผลงานเดิมที่มีผู้รายงานไว้
                                            จุดมุ่งหมายสำคัญของการทำโครงงานเป็นการเปิดโอกาสให้นักเรียนได้รับประสบการณ์ตรงในการใช้ระบบคอมพิวเตอร์แก้ปัญหา
                                            ประดิษฐ์คิดค้น หรือค้นคว้าหาความรู้ต่างๆ
                                            ใช้คอมพิวเตอร์ในการพัฒนาสื่อการเรียนรู้เพื่อการศึกษา ประดิษฐ์ฮาร์ดแวร์ ซอฟต์แวร์
                                            รืออุปกรณ์ใช้สอยต่างๆ พัฒนาโปรแกรมประยุกต์ต่างๆ ตลอดจนการพัฒนาเกมคอมพิวเตอร์
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-sm">Read more</a>
                                            <a class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-user bg-green"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                                        <h3 class="timeline-header no-border"><a href="#">รายชื่ออาจารย์</a>
                                            อาจารย์ประจำวิชา และอาจารย์ที่ปรึกษาโครงงาน</h3>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-comments bg-yellow"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-book"></i> 27 mins ago</span>
                                        <h3 class="timeline-header"><a href="#">คู่มือสำหรับการทำโครงงาน</a> commented on
                                            your post</h3>
                                        <div class="timeline-body">
                                            คู่มือการเขียนและการพิมพ์โครงงานวิทยาการคอมพิวเตอร์ สาขาวิชาวิทยาการคอมพิวเตอร์
                                            ภาควิชาคณิตศาสตร์และวิทยาการคอมพิวเตอร์
                                            คณะวิทยาศาสตร์และเทคโนโลยีมหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุร
                                        </div>
                                        <div class="timeline-footer">
                                            <span class="time"><i class="fas fa-download"></i> download
                                                File</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-green">ขั้นตอนการทำโครงงานทางด้านวิทยาการคอมพิวเตอร์</span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fa fa-camera bg-purple"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                                        <div class="timeline-body">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->

                                <!-- END timeline item -->
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.timeline -->

            </section>
            <!-- /.content -->
        </div>

    @endsection

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
