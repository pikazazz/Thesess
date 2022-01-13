<div class="modal fade" id="proposal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Proposal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md">
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">

                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">

                                                <form action="{{ route('FileUpload.store') }}" method="POST"
                                                    enctype="multipart/form-data" id="image-upload-preview">
                                                    <div class="card-body">

                                                        @csrf
                                                        @method('POST')
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">

                                                                    <div class="custom-file">
                                                                        <input type="file" name="file"
                                                                            placeholder="Choose File" id="file"
                                                                            onChange='getFileNameWithExt(event)'>
                                                                        <br>
                                                                    </div>

                                                                    <input id='outputfile' type='text' name='outputfile'
                                                                        hidden>
                                                                    <input id='extension' type='text'
                                                                        class="extension" name='extension' hidden>
                                                                    @error('name')
                                                                        <div class="alert alert-danger mt-1 mb-1">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>



                                                            <div class="col-md-12">
                                                                <button type="submit" name="type" id="type"
                                                                    value="proposal"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                            </div>



                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="ch1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">บทที่ 1</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">

                                        <form action="{{ route('FileUpload.store') }}" method="POST"
                                            enctype="multipart/form-data" id="image-upload-preview">
                                            <div class="card-body">

                                                @csrf
                                                @method('POST')
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">

                                                            <div class="custom-file">
                                                                <input type="file" name="file" placeholder="Choose File"
                                                                    id="file" onChange='getFileNameWithExt(event)'>
                                                                <br>
                                                            </div>

                                                            <input id='outputfile' type='text' name='outputfile' hidden>
                                                            <input id='chapter1' type='text' class="chapter1"
                                                                name='chapter1' hidden>
                                                            @error('name')
                                                                <div class="alert alert-danger mt-1 mb-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-md-12">
                                                        <button type="submit" name="type" id="type" value="ch1"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                            </div>



                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="ch2">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">บทที่ 2</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">

                                        <form action="{{ route('FileUpload.store') }}" method="POST"
                                        enctype="multipart/form-data" id="image-upload-preview">
                                        <div class="card-body">

                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <div class="custom-file">
                                                            <input type="file" name="file" placeholder="Choose File"
                                                                id="file" onChange='getFileNameWithExt(event)'>
                                                            <br>
                                                        </div>

                                                        <input id='outputfile' type='text' name='outputfile' hidden>
                                                        <input id='chapter2' type='text' class="chapter2"
                                                            name='chapter2' hidden>
                                                        @error('name')
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-12">
                                                    <button type="submit" name="type" id="type" value="ch2"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                            </div>



                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="ch3">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">บทที่ 3</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">

                                        <form action="{{ route('FileUpload.store') }}" method="POST"
                                        enctype="multipart/form-data" id="image-upload-preview">
                                        <div class="card-body">

                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <div class="custom-file">
                                                            <input type="file" name="file" placeholder="Choose File"
                                                                id="file" onChange='getFileNameWithExt(event)'>
                                                            <br>
                                                        </div>

                                                        <input id='outputfile' type='text' name='outputfile' hidden>
                                                        <input id='chapter3' type='text' class="chapter3"
                                                            name='chapter3' hidden>
                                                        @error('name')
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-12">
                                                    <button type="submit" name="type" id="type" value="ch3"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                            </div>



                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="ch4">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">บทที่ 4</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">

                                        <form action="{{ route('FileUpload.store') }}" method="POST"
                                        enctype="multipart/form-data" id="image-upload-preview">
                                        <div class="card-body">

                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <div class="custom-file">
                                                            <input type="file" name="file" placeholder="Choose File"
                                                                id="file" onChange='getFileNameWithExt(event)'>
                                                            <br>
                                                        </div>

                                                        <input id='outputfile' type='text' name='outputfile' hidden>
                                                        <input id='chapter4' type='text' class="chapter4"
                                                            name='chapter4' hidden>
                                                        @error('name')
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-12">
                                                    <button type="submit" name="type" id="type" value="ch4"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                            </div>



                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="ch5">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">บทที่ 5</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">

                                        <form action="{{ route('FileUpload.store') }}" method="POST"
                                        enctype="multipart/form-data" id="image-upload-preview">
                                        <div class="card-body">

                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <div class="custom-file">
                                                            <input type="file" name="file" placeholder="Choose File"
                                                                id="file" onChange='getFileNameWithExt(event)'>
                                                            <br>
                                                        </div>

                                                        <input id='outputfile' type='text' name='outputfile' hidden>
                                                        <input id='chapter5' type='text' class="chapter5"
                                                            name='chapter5' hidden>
                                                        @error('name')
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-12">
                                                    <button type="submit" name="type" id="type" value="ch5"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                            </div>



                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>





<script>
    function getFileNameWithExt(event) {
        if (!event || !event.target || !event.target.files || event.target.files.length === 0) {
            return;
        }
        const name = event.target.files[0].name;
        const lastDot = name.lastIndexOf('.');

        const fileName = name.substring(0, lastDot);
        const ext = name.substring(lastDot + 1);

        outputfile.value = fileName;
        extension.value = ext;
        chapter1.value = ext;
        chapter2.value = ext;
        chapter3.value = ext;
        chapter4.value = ext;
        chapter5.value = ext;
    }



</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
