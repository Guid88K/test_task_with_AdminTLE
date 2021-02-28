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
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable</h3>
                                <button type="button" class="btn btn-dark float-right" data-toggle="modal"
                                    data-target="#modal-secondary">
                                    Add worker
                                </button>
                                <div class="modal fade" id="modal-secondary">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('worker.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add worker</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Full name</label>
                                                                <input type="text" name="full_name" class="form-control"
                                                                    placeholder="Full name ...">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Position</label>
                                                                <input type="text" name="position" class="form-control"
                                                                    placeholder="Position ...">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Employment date</label>
                                                                <input type="text" name="employment_date"
                                                                    class="form-control" placeholder="Employment date ...">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Telephone</label>
                                                                <input type="text" name="telephone" class="form-control"
                                                                    placeholder="Telephone ...">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" name="email" class="form-control"
                                                                    placeholder="Email ...">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Salary</label>
                                                                <input type="text" name="salary" class="form-control"
                                                                    placeholder="Salary ...">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputFile">File input</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="image" class="custom-file-input"
                                                                    id="exampleInputFile">
                                                                <label class="custom-file-label"
                                                                    for="exampleInputFile">Choose file</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="">Upload</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-dark">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Full name</th>
                                            <th>Position</th>
                                            <th>employment_date</th>
                                            <th>telephone</th>
                                            <th>email</th>
                                            <th>salary</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($worker as $w)
                                            <tr>
                                                <td>{{ $w->full_name }}</td>
                                                <td>{{ $w->position }}
                                                </td>
                                                <td>{{ $w->employment_date }}</td>
                                                <td>{{ $w->telephone }}</td>
                                                <td>{{ $w->email }}</td>
                                                <td>{{ $w->salary }}</td>
                                                <td>
                                                    <button type="submit" class="btn btn-secondary btn-sm " id="editCompany"
                                                        data-id="{{ $w->id }}" href="#" data-toggle="modal"
                                                        data-target="#edit" role="button">
                                                        Edit
                                                    </button>

                                                    <div class="modal fade" id="edit">
                                                        <div class="modal-dialog" role="document">
                                                            <form id="companydata">
                                                                <div class="modal-content">
                                                                    <input type="hidden" id="id" name="id" value="">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit worker</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="row">
                                                                            <div class="col-sm">
                                                                                <!-- text input -->
                                                                                <div class="form-group">
                                                                                    <label>Full name</label>
                                                                                    <input type="text" id="full_name"
                                                                                        name="full_name"
                                                                                        class="form-control"
                                                                                        placeholder="Full name ...">
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm">
                                                                                <!-- text input -->
                                                                                <div class="form-group">
                                                                                    <label>Position</label>
                                                                                    <input type="text" id="position"
                                                                                        name="position" class="form-control"
                                                                                        placeholder="Position ...">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm">
                                                                                <!-- text input -->
                                                                                <div class="form-group">
                                                                                    <label>Employment date</label>
                                                                                    <input type="text" id="employment_date"
                                                                                        name="employment_date"
                                                                                        class="form-control"
                                                                                        placeholder="Employment date ...">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm">
                                                                                <!-- text input -->
                                                                                <div class="form-group">
                                                                                    <label>Telephone</label>
                                                                                    <input type="text" id="telephone"
                                                                                        name="telephone"
                                                                                        class="form-control"
                                                                                        placeholder="Telephone ...">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm">
                                                                                <!-- text input -->
                                                                                <div class="form-group">
                                                                                    <label>Email</label>
                                                                                    <input type="email" id="email"
                                                                                        name="email" class="form-control"
                                                                                        placeholder="Email ...">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm">
                                                                                <!-- text input -->
                                                                                <div class="form-group">
                                                                                    <label>Salary</label>
                                                                                    <input type="text" id="salary"
                                                                                        name="salary" class="form-control"
                                                                                        placeholder="Salary ...">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="exampleInputFile">File input</label>
                                                                            <div class="input-group">
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="image"
                                                                                        class="custom-file-input"
                                                                                        id="exampleInputFile">
                                                                                    <label class="custom-file-label"
                                                                                        for="exampleInputFile">Choose
                                                                                        file</label>
                                                                                </div>
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"
                                                                                        id="">Upload</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit" value="Submit" id="submit"
                                                                            class="btn btn-dark">Upload</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                            </div>

                            {{-- delete --}}

                            <form action="{{ route('worker.destroy', $w->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-dark btn-sm " type="submit">
                                    Delete
                                </button>
                            </form>

                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                    <th>CSS grade</th>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#submit', function(event) {
                event.preventDefault()
                var id = $("#id").val();
                var full_name = $("#full_name").val();
                var position = $("#position").val();
                var employment_date = $("#employment_date").val();
                var telephone = $("#telephone").val();
                var email = $("#email").val();
                var salary = $("#salary").val();

                $.ajax({
                    url: 'worker/' + id,
                    type: "POST",
                    data: {
                        id: id,
                        full_name: full_name,
                        position: position,
                        employment_date: employment_date,
                        telephone: telephone,
                        email: email,
                        salary: salary,
                    },

                    dataType: 'json',
                    success: function(data) {

                        $('#companydata').trigger("reset");
                        $('#edit').modal('hide');
                        window.location.reload(true);
                    }
                });
            });

            $('body').on('click', '#editCompany', function(event) {

                event.preventDefault();
                var id = $(this).data('id');

                $.get('worker/' + id + '/edit', function(data) {
                    $('#userCrudModal').html("Edit category");
                    $('#submit').val("Edit category");
                    $('#edit').modal('show');
                    $('#id').val(data.data.id);

                    $('#full_name').val(data.data.full_name);
                    $('#position').val(data.data.position);
                    $('#employment_date').val(data.data.employment_date);
                    $('#telephone').val(data.data.telephone);
                    $('#email').val(data.data.email);
                    $('#salary').val(data.data.salary);
                })
            });

        });

    </script>
@endsection
