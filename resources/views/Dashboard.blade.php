@extends('main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('Dashboard') }}">Dashboard</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user" ></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">No. of Users</span>
                            <span class="info-box-number">{{ $users_count }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-clock"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Currently Time-in</span>
                            <span class="info-box-number">{{ $timein_count }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">No. of Books in Room Use</span>
                            <span class="info-box-number">{{ $borrowed_books }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1" style="color:white !important;"><i class="fas fa-book"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">No. of Books Issued</span>
                            <span class="info-box-number">{{ $issued_books }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                  <!-- ./col -->
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="">
                                <span>Monitoring TimeIn/TimeOut</span>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead class="text-center">
                                <tr>
                                    <th class="text-center">USER IMAGES</th>
                                    <th class="text-center">USER FULLNAME</th>
                                    <th class="text-center">USER ROLE</th>
                                    <th class="text-center">TIME IN</th>
                                    <th class="text-center">ACTIONS</th>

                                </tr>
                                </thead>
                                <tbody class="text-center">

                                </tbody>
                            </table>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('DTR.view') }}" class="btn btn-secondary">View All Daily Time Record</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-3">
                    <div class="info-box mb-3 bg-warning" style="color:white !important;">
                        <span class="info-box-icon"><i class="fas fa-book"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Books</span>
                            <span class="info-box-number">{{ $books }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-success">
                        <span class="info-box-icon"><i class="fa fa-book-reader"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Ebooks</span>
                            <span class="info-box-number">{{ $ebook }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-danger">
                        <span class="info-box-icon"><i class="fa fa-user-graduate"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Students</span>
                            <span class="info-box-number">{{ $students }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-info">
                        <span class="info-box-icon"><i class="fa fa-user-tie"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Professor</span>
                            <span class="info-box-number">{{ $professor }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                        <div id="canvas-holder">
                        <canvas id="chart-borrowed"></canvas>
                    </div>
                  </div>
                  <!-- /.chart-responsive -->
                        <div class="col-md-4">
                            <div id="canvas-holder">
                                <canvas id="chart-timein"></canvas>
                            </div>
                        </div>
                  <!-- /.chart-responsive -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="">
                                <span> Issued Materials </span>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="issued_books" class="table table-bordered table-striped">
                                <thead class="text-center">
                                <tr>
                                    <th class="text-center">ID NO</th>
                                    <th class="text-center">MATERIALS ACC NUM</th>
                                    <th class="text-center">TITLE</th>
                                    <th class="text-center">TYPE</th>
                                    <th class="text-center">BORROWER NAME</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">

                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="{{ route('Issuing.index') }}" class="btn btn-secondary">View All Borrowed Books</a>
                            <a href="{{ route('Borrowing.index') }}" class="btn btn-secondary">View All Room Used Books</a>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="">
                                <span> List Of Extension Made </span>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="datatable3" class="table table-bordered table-striped">
                                <thead class="text-center">
                                <tr>
                                    <th class="text-center">ID NO</th>
                                    <th class="text-center">MATERIALS ACC NUM</th>
                                    <th class="text-center">BORROWER NAME</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">

                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@push('custom-scripts')
    {{-- Chart JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" 
        integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
@endpush

@section('scripts') {{-- Edit below for the javascript--}}
    <script>
        $(document).ready(function(){
            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                bjQueryUI: true,
                searching: false,
                ajax : {
                    url : "{{ route('TableController-DTR') }}",
                    type : "GET",
                    dataType: 'JSON'
                },
                columns: [
                    {data: 'images', name: 'images'},
                    {data: 'fullname', name: 'fullname'},
                    {data: 'role_name', name: 'role_name'},
                    {data: 'timein', name: 'timein'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ],
                responsive: true,  "autoWidth": false,
            });

            setInterval( function () {
                table.ajax.reload( null, false ); // user paging is not reset on reload
            }, 5000 );

            var table2 = $('#datatable3').DataTable({
                processing: true,
                serverSide: true,
                bjQueryUI: true,
                searching: false,
                ajax : {
                    url : "{{ route('Table-issue-extensions_list') }}",
                    type : "GET",
                    dataType: 'JSON'
                },
                columns: [
                    {data: 'id', name: 'extension_id'},
                    {data: 'accession_number', name: 'c.accession_number'},
                    {data: 'fullname', name: 'fullname'},
                    {data: 'extension_status', name: 'extension_status'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ],
                responsive: true,  "autoWidth": false,
                buttons: ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            var table2 = $('#issued_books').DataTable({
                processing: true,
                serverSide: true,
                bjQueryUI: true,
                searching: false,
                ajax : {
                    url : "{{ route('Table-issued-list') }}",
                    type : "GET",
                    dataType: 'JSON'
                },
                columns: [
                    {data: 'id', name: 'a.id'},
                    {data: 'accession_number', name: 'c.accession_number'},
                    {data: 'title', name:'title'},
                    {data: 'material_type', name: 'material_type'},
                    {data: 'fullname', name: 'fullname'},
                ],
                responsive: true,  "autoWidth": false,
                buttons: ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $(document).on('click' , '.extension' , function(){
                var id = $(this).attr("data-id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to accept this request extension?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Accept!',
                    cancelButtonText: 'Deny',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"GET",
                            url: '{{ route('book_extension') }}' ,
                            data: {
                                'extension_id' : id,
                                // 'user_id': user_id,
                                // 'borrowing_id' : borrowing_id,
                                'type' : "accept"
                            }, // get all form field value in serialize form
                            success: function(response){
                                /*swal.fire("Sorry this function currently not working");*/
                                if(response.status == "success"){
                                    Swal.fire(
                                        'Extension is Accepted!',
                                        '',
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
                        $.ajax({
                            type:"GET",
                            url: '{{ route('book_extension') }}' ,
                            data: {
                                'extension_id' : id,
                                'type' : "denied"
                            }, // get all form field value in serialize form
                            success: function(response){
                                /*swal.fire("Sorry this function currently not working");*/
                                if(response.status == "success"){
                                    Swal.fire(
                                        'Extension is Denied!',
                                        '',
                                        'success'
                                    ).then(function(){
                                        location.reload();
                                    });
                                }else{
                                    swal.fire("Something is error please contact developer", "","error");
                                }
                            }
                        });
                    }
                })
            });

            $(document).on('click' , '.timeout' , function(){
                var id = $(this).attr("data-id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to logout this student!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"GET",
                            url: '{{ route('force_logout') }}' ,
                            data: {
                                'id' : id
                            }, // get all form field value in serialize form
                            success: function(response){
                                /*swal.fire("Sorry this function currently not working");*/
                                if(response.status == "success"){
                                    Swal.fire(
                                        'Logout is Success!',
                                        'Student is forcefully logout.',
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
                            'Student is not forcefully logout.',
                            '',
                            'info'
                        )
                    }
                })
            });
        })
    </script>
    {{-- Chart --}}
 <script>
    //Most borrowed Books
    const borrowed_data = {
    labels: [
        <?php foreach ($Borrowctr as $data) : ?> 
            '<?= strtoupper($data -> title) ?>',
        <?php endforeach; ?>
    ],
    datasets: [{
      label: 'Title',
      data: [ <?php $ctr=0; foreach ($Borrowctr as $data) { $ctr++; echo $data -> borrowcount . ',';} ?>],
      backgroundColor: [
        <?php for($counter = 0; $counter <= $ctr; $counter++):?>
            '#212F3D','#F4D03F','#52BE80','#3498DB','#D2B4DE',
        <?php endfor;?>
      ],
      hoverOffset: 4
    }]
  };
  const borrowed_config = 
  {
    type: 'pie',
    data:  borrowed_data,   
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Most Borrowed Books',
                fullSize: true,
                font: {weight: 'bold'}
            },
        }
    }
};
//Most Time in Users
const Dailytimein_data = {
    labels: [
        <?php foreach ($Dailyctr as $data) : ?> 
            '<?= strtoupper($data -> firstname) ?>',
        <?php endforeach; ?>
    ],
    datasets: [{
      label: 'firstname',
      data: [ <?php $ctr=0; foreach ($Dailyctr as $data) { $ctr++; echo $data -> timectr. ',';} ?>],
      backgroundColor: [
        <?php for($counter = 0; $counter <= $ctr; $counter++):?>
          '#B39DDB','#795548','#81D4FA','#80CBC4','#FF8A65',
        <?php endfor;?>
      ],
      hoverOffset: 4
    }]
  };
  const  dailytime_config = 
  {
    type: 'pie',
    data:  Dailytimein_data,   
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Most Time in users',
                fullSize: true,
                font: {weight: 'bold'}
            },
        }
    }
}
var chart_borrowed = new Chart(
      document.getElementById('chart-borrowed'),
      borrowed_config
    );
var chart_daily = new Chart(
      document.getElementById('chart-timein'),
      dailytime_config
    );
</script>
@endsection
