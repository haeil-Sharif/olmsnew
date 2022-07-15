@extends('main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <a href="/Materials/r" class="btn btn-primary align-self-end btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-pdf"></i> Generate Inventory Report</a>
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('Dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">List of Materials</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row d-flex justify-content-between">
                                <div class="col"></div>
                                
                                <div class="col text-center">
                                    <h1 class="display-4">List of Materials</h1>
                                </div>
                                
                                @if($user_perm -> contains('slug_name', "Material.store"))
                                    <div class="col d-flex align-items-center justify-content-end">
                                        <button type="button" class="btn  btn-primary btn-add" data-toggle="modal" data-target="#modal">
                                                <span class="fa fa-plus"></span>
                                                Add Materials
                                        </button>
                                    </div>
                                @else
                                    <div class="col"></div>
                                @endif
                            </div>

                         <!--datepicker-->
                         <form action="<?= url('Materials/reports')?>" method="post" target="_blank">
                             @csrf
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Generate Inventory Report</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>

                                    <div class="modal-body">
                                    <div class="form-group ranges" id="ranges">
                                        <label for="formGroupExampleInput">Date range</label>
                                        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                            <i class="fa fa-calendar"></i>&nbsp;
                                            <span></span> <i class="fa fa-caret-down"></i>
                                        </div>
                                        <input type="hidden" name="start" id="start">
                                        <input type="hidden" name="end" id="end">
                                    </div>

                                    </div>

                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-file-pdf"></i>Generate Inventory Report</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </form>
                        <!--end form-->
                        </div>
                        <div class="card-body table-responsive">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead class="text-center">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">ISBN</th>
                                    <th class="text-center" style="width: 40%;">TITLE</th>
                                    <th class="text-center">TYPE</th>
                                    <th class="text-center">COPIES</th>
                                    <th class="text-center">ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">

                                </tbody>
                            </table>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->

            {{-- MATERIALS FORM MODAL --}}
            <div class="modal" id="modal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Materials Form</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="form">
                            <div class="modal-body">
                                {{ csrf_field() }}
                                <input type="hidden" id="id">

                                {{-- Accession Template --}}
                                <div class="row">
                                    <div class="form-group col-md-12 for_edit">
                                        <label for="">Accession No. Template: </label><small style="color:red;">&nbsp&nbsp&nbsp(Required)</small>
                                        <select  class="form-control" name="structure" id="structure" placeholder="Enter Materials Structure">
                                            <option value=""> Choose option </option>
                                            @foreach($category as $category)
                                                <option value="{{ $category->id }}"> {{ $category->cat_structure }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- ISBN, Title --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">ISBN: </label><small style="color:red;">&nbsp&nbsp&nbsp(Required)</small>
                                        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Enter ISBN">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Title:</label><small style="color:red;">&nbsp&nbsp&nbsp(Required)</small>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                                    </div>
                                </div>

                                {{-- Subject Select --}}
                                <div class="row">
                                    <div class="form-group col-md-6 for_edit">
                                    <label for="">Subject: </label><small style="color:red;">&nbsp&nbsp&nbsp(Required)</small>
                                    <select  class="select2" id="subject" name="subject[]" multiple="multiple" required style="width: 100%;">
                                        @foreach($subject as $subject)
                                            <option value="{{ $subject->id }}"> {{ $subject->subject_name }} </option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group col-md-6 add_mask">
                                        <label for="">CALL NO:</label><small style="color:red;">&nbsp&nbsp&nbsp(Required)</small>
                                        <input type="text" class="form-control" name="callno" id="callno" placeholder="Enter Call No.">
                                    </div>
                                </div>

                                {{-- Author, Publisher --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Author:</label><small style="color:red;">&nbsp&nbsp&nbsp(Required)</small>
                                        <input type="text" class="form-control" name="author" id="author" placeholder="Enter Author">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Publisher: </label><small style="color:red;">&nbsp&nbsp&nbsp(Required)</small>
                                        <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Enter Publisher.">
                                    </div>
                                </div>

                                {{-- Edition Select --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Edition: </label><small style="color:red;">&nbsp&nbsp&nbsp(Required)</small>
                                        <select type="text" class="form-control" name="edition" id="edition" placeholder="Enter Edition: ">
                                            <option value="" > Choose Option</option>
                                            <option value="1st Edition">1st Edition</option>
                                            <option value="2nd Edition">2nd Edition</option>
                                            <option value="3rd Edition">3rd Edition</option>
                                            <option value="4th Edition">4th Edition</option>
                                            <option value="5th Edition">5th Edition</option>
                                            <option value="6th Edition">6th Edition</option>
                                            <option value="7th Edition">7th Edition</option>
                                            <option value="8th Edition">8th Edition</option>
                                            <option value="9th Edition">9th Edition</option>
                                            <option value="10th Edition">10th Edition</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Copyright, Type --}}
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Copyright:  </label><small style="color:red;">&nbsp&nbsp&nbsp(Required)</small>
                                        <input type="number" class="form-control" name="copyright" id="copyright" placeholder="Enter Copyright: ">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Type:  </label><small style="color:red;">&nbsp&nbsp&nbsp(Required)</small>
                                        <select type="text" class="form-control" name="type" id="type" placeholder="Enter Type: ">
                                            <option value="" > Choose Option</option>
                                            <option value="1"> Borrowing</option>
                                            <option value="2"> Room Use</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);
    cb(start, end);
    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log(picker.startDate.format('YYYY-MM-DD'));
        document.getElementById('start').value = picker.startDate.format('YYYY-MM-DD');
        console.log(picker.endDate.format('YYYY-MM-DD'));
        document.getElementById('end').value = picker.endDate.format('YYYY-MM-DD');
    });

    document.getElementById('start').value = moment().subtract(29, 'days').format('YYYY-MM-DD');
    document.getElementById('end').value = moment().format('YYYY-MM-DD');
});
</script>
    <script>
        $(document).ready(function(){
            $('.select2').select2({
                theme: "classic",
                width: "resolve"
            });

            $('#modal').on('hidden.bs.modal', function (e) {
                $('.form-control').removeClass('is-invalid');
                $('.modal-body .form-group')
                    .find("input,textarea,select")
                    .val('')
                    .end()
                    .find("input[type=checkbox], input[type=radio]")
                    .prop("checked", "")
                    .end();
            })

            $('.btn-add').on('click', function(){
                $('.for_edit').attr("hidden", false);
                $('.add_mask').addClass("col-md-6").removeClass("col-md-12");
                $('#id').removeAttr('name');
                $('#id').removeAttr('value');
            });

            $('#form').validate({
                rules: {
                    structure: {
                        required: true,
                    },
                    isbn: {
                        required: true,
                    },
                    title: {
                        required: true,
                    },
                    author: {
                        required: true,
                    },
                    publisher: {
                        required: true,
                    },
                    copyright: {
                        required: true,
                    },
                    type: {
                        required: true,
                    },
                    subject: {
                        required: true,
                    },

                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    jQuery.ajax({
                        url:'{{ route('Material.store') }}',
                        type: "POST",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'id' : $('#id').val(),
                        },
                        data: $('#form').serialize(),
                        success: function(response){
                            Swal.fire({
                                icon: response.status,
                                title: response.message
                            }).then(function(){
                                redirectURL = "{{ route('Material.show', ':id') }}";
                                redirectURL = redirectURL.replace(':id', response.materialID);
                                window.location.href = redirectURL;
                            });
                        }
                    });
                }
            });

            // Loads data to Material List Datatable
            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                bjQueryUI: true,
                ajax : {
                    url : "{{ route('MaterialsDatatables') }}",
                    type : "GET",
                    dataType: 'JSON'
                },
                // COLUMNS THAT HAVE SEARCHABLE: TRUE ARE QUERIED IN SEARCH BUTTON
                columns: [
                    {
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex', 
                        orderable: false, 
                        searchable: false,
                    },
                    {
                        data: 'isbn', 
                        name: 'isbn',
                        orderable: true, 
                        searchable: true,
                    },
                    {
                        data: 'title_with_subjects', 
                        name: 'title',
                        orderable: true, 
                        searchable: true,
                    },
                    {
                        data: 'type', 
                        name: 'type',
                        orderable: true, 
                        searchable: false,
                    },
                    {
                        data: 'copies', 
                        name: 'copies',
                        orderable: true, 
                        searchable: false,
                    },
                    @if($user_perm -> contains('slug_name', "Material.show") || $user_perm->contains('slug_name', 'MaterialsDelete'))
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false, 
                        searchable: false,
                    },
                    @endif
                ],
                dom: 'Bfrtip',
                responsive: true,  "autoWidth": false,
                buttons: ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $(document).on('click', '.data-edit', function(){
                $('#modal').modal('show');
                var id = $(this).attr("data-id");
                var url = '{{ route('Materials.ShowEditValues', ":id") }}';
                url = url.replace(':id', id);
                $.ajax({
                    type:"POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: url,
                    // get all form field value in serialize form
                    success: function(response){
                        /*swal.fire("Sorry this function currently not working");*/
                        if(response[0]){
                            $('.for_edit').attr("hidden", true);
                            $('.add_mask').removeClass("col-md-6").addClass("col-md-12");
                            $('#id').val(response[0].materials_id);
                            $('#id').attr('name', 'id');
                            $('#isbn').val(response[0].isbn);
                            $('#title').val(response[0].title);
                            $('#callno').val(response[0].callno);
                            $('#author').val(response[0].author);
                            $('#publisher').val(response[0].publisher);
                            $('#edition').val(response[0].edition);
                            $('#copyright').val(response[0].copyright);
                            $('#type').val(response[0].type);
                        }else{
                            swal.fire("Something is error please contact developer", "","error");
                        }
                    }
                });
            });


            $(document).on('click' , '.data-delete' , function(){
                var id = $(this).attr("data-id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"POST",
                            url: '{{ route('MaterialsDelete') }}' ,
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'id' : id,
                            }, // get all form field value in serialize form
                            success: function(response){
                                /*swal.fire("Sorry this function currently not working");*/
                                if(response.status == "success"){
                                    Swal.fire(
                                        'Deleted!',
                                        'Your Data has been deleted.',
                                        'success'
                                    ).then(function(){
                                        location.reload();
                                    });
                                }else{
                                    swal.fire("Something is error please contact developer", "","error");
                                }
                            }
                        });

                    }else{
                        Swal.fire(
                            'Data is not deleted!',
                            '',
                            'info'
                        )
                    }
                })
            });

        })
    </script>
@endsection
