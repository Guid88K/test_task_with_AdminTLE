@extends('lay.main_layout')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" style="background: white">
                <!-- Small boxes (Stat box) -->
                <form action="{{ route('worker.update', $worker->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input type="text" name="full_name" value="{{$worker->full_name}}" class="form-control" placeholder="Full name ...">

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="text" name="position" value="{{$worker->position}}" class="form-control" placeholder="Position ...">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="example-date-input" class="col-2 col-form-label">Date</label>

                                    <input class="form-control" name="employment_date" type="date" value="{{$worker->employment_date}}"
                                        id="example-date-input">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input type="text" name="telephone" class="form-control" value="{{$worker->telephone}}" placeholder="Telephone ...">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$worker->email}}" placeholder="Email ...">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Salary</label>
                                    <input type="text" name="salary" class="form-control" value="{{$worker->salary}}" placeholder="Salary ...">

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" value="{{$worker->image}}" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label"  for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer justify-content-between">
                        <a href="{{ route('worker.index') }}" class="btn btn-default" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-dark">Save</button>
                    </div>
                </form>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
    </div>

@endsection
