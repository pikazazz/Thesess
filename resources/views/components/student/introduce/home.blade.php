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

                <div class="row">
                    <div class="col-md-12">
                        <!-- The time line -->
                        <div class="timeline">
                            <!-- timeline time label -->
                            @foreach ($category as $Category)

                                <div class="time-label">
                                    <span class="{{ $Category->color }}">{{ $Category->category_name }}</span>
                                </div>
                                @foreach ($news as $News)
                                @if($News->category_id ==  $Category->id )
                                    <div>

                                        <i class="{{$News->icon}}"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                            <h3 class="timeline-header"> {{$News->news_name}}</h3>

                                            <div class="timeline-body">
                                                {!!$News->news_detail!!}
                                               </div>

                                            <div class="timeline-footer">
                                               สร้างเมื่อ {!!$News->created_at!!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                            @endforeach

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
