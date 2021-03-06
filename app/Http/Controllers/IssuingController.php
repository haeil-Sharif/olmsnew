<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Borrowing;
use App\Models\MaterialCopy;
use App\Models\Penalty;
use App\Models\Material;
use TCPDF;


class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        $this->SetX(350);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        // $image_file = FCPATH.'assets/img/footer-long.png';
        // $this->Image($image_file, 5, 195, '350', '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Page number
    }
}
class IssuingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $controller;
    protected $routeName;

    public function __construct(array $attributes = array())
    {
        /* if controller is not compatible with slug name */
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($this -> controller, $action) = explode('Controller@', $controllerAction);

        $this -> routeName = Route::currentRouteName();

    }

    public function index()
    {
        //check if the user if authenticated
        if(auth::check() == true){
            $user_permission = db::table('user_links as a')
                ->join('user_permission as b', 'a.id', '=' , 'b.link_id')
                ->where('b.user_id', auth::user()->id)
                ->where('b.status' , '=' , 'On')
                ->Where('a.slug_name', 'LIKE' , '%'.$this->controller.'%')
                ->Where('link_id', '!=', 0)
                ->get();

            // $materials = db::table('materials')
            //     ->where('status', 1)
            //     ->where('type', 1)
            //     ->where('is_available', 1)
            //     ->get();
            $materials = db::table('materials_copies')
                ->join('materials','materials.materials_id','=','materials_copies.materials_id')
                ->where('materials.status', 1)
                ->where('materials.type', 1)
                ->where('materials_copies.is_available', 1)
                ->get();
            // $materials_copy = db::table('materials_copies')
            //     ->get();

            $borrower = db::table('users as a')
                ->join('user_details as b', 'a.id', '=', 'b.user_id')
                ->where('status', 1)
                ->where('role_id','!=', 1)
                ->get();

            if($user_permission -> contains('slug_name', $this -> routeName)){
                return view('Issuing.list')
                    ->with('user_perm', $user_permission)
                    ->with('materials', $materials)
                    // ->with('copies', $materials_copy)
                    ->with('borrowers', $borrower);
            }else{
                return redirect()->route('Dashboard');
            }
        }else{
            return redirect()->route('user_login_page');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return response()->json(['status' => 'success' , 'message' => "request passed"]);
        extract($request->all());

        $penalty_settings = db::table('penalty_settings')
            ->get();

        foreach($penalty_settings as $penalty_setting){

        }

        $data_updated = [
            'material_copy_id' => $materials,
            'users_id' => $borrower,
            'type' => 1,
            'updated_at' => Carbon::now()
        ];

        if($id != ''){

            db::table('borrowings')
                ->where('id', $id)
                ->update($data_updated);

            db::table('materials_copies')
                ->where('borrows_id', $id)
                ->update([
                    'borrows_id' => NULL,
                    'is_available' => 1
                ]);

            return response()->json(['status' => 'success' , 'message' => "Issuing Data is successfully updated "]);

        }else{

            $data_inserted = [
                'material_copy_id' => $materials,
                'users_id' => $borrower,
                'date_borrowed' => Carbon::now()->toDateString(),
                'date_returned' => Carbon::now()->addDay(3)->toDateString(),
                'type' => 1,
                'created_at' => Carbon::now()
            ];

            $borrowing_id = db::table('borrowings')
                ->insertGetId($data_inserted);

            // db::table('materials_copies')
            //     ->update([
            //         'material_copy_id' => $materials,
            //         'borrows_id' => $borrowing_id
            //     ]);

            db::table('materials_copies')
                ->where('material_copy_id', $materials)
                ->update([
                    'borrows_id' => $borrowing_id,
                    'is_available' => 0
                ]);


            return response()->json(['status' => 'success' , 'message' => "Issuing Data is successfully inserted"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = db::table('borrowings')
            ->where('id', $id)
            ->get();

        return response()->json($data);
    }

    public function Datatables(){

        $data = DB::table('borrowings as a')
            ->select('a.id as id','c.accession_number as accession_number','d.title as title','a.date_borrowed as date_borrowed','a.date_returned as date_returned', DB::raw("CONCAT(b.lastname,',',b.firstname) as fullname"))
            ->join('user_details as b', 'a.users_id', '=' , 'b.user_id')
            // ->join('materials as c', 'a.materials_id', '=', 'c.materials_id')
            ->join('materials_copies as c', 'a.material_copy_id', '=', 'c.material_copy_id')
            ->join('materials as d', 'c.materials_id', '=', 'd.materials_id')
            ->where('a.type' , 1)
            ->where('a.status', 1);


        $user_permission = db::table('user_links as a')
            ->join('user_permission as b', 'a.id', '=' , 'b.link_id')
            ->where('b.user_id', auth::user()->id)
            ->where('b.status' , '=' , 'On')
            ->where('a.slug_name', 'LIKE' , '%'.$this->controller.'%')
            ->where('b.link_id' , '!=' , 0)
            ->get();

        if($user_permission -> contains('slug_name', 'Issuing.show') && $user_permission -> contains('slug_name', 'IssuingDelete')) {
            return DataTables::query($data)
                ->filterColumn('fullname', function($query, $keyword) {
                    $sql = "CONCAT(b.lastname,',',b.firstname)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<td></d></tr><div class="btn-group-horizontally">
                                <a type="button" title="EDIT" class="btn btn-info data-edit" id="data-edit" data-id=' . $row->id . ' ><span class="fa fa-edit"></span></a>
                                <a type="button" title="RETURN" class="btn btn-warning data-delete" id="data-delete" data-id=' . $row->id . ' ><span class="fa fa-backward">&nbsp;&nbsp;</span>RETURN</a>
                            </div></td>';
                    return $btn;
                })
                ->addColumn('formattedBorroweddates', function ($request) {
                    
                    return Carbon::create($request->date_borrowed)->format('F d, Y'); // human readable format
                  })
                ->addColumn('formattedReturneddates', function ($request) {
                    return Carbon::create($request->date_returned)->format('F d, Y'); // human readable format
                })
                // ->filterColumn('date_borrowed', function ($query, $keyword) {
                // $query->whereRaw("DATE_FORMAT(date_start,'%Y-%m-%d') like ?", ["%$keyword%"]); //date_format when searching using date
                // })
                // ->filterColumn('date_return', function ($query, $keyword) {
                // $query->whereRaw("DATE_FORMAT(date_end,'%Y-%m-%d') like ?", ["%$keyword%"]); //date_format when searching using date
                // })
                ->rawColumns(['action'])
                ->toJson();
        }elseif($user_permission -> contains('slug_name', 'Issuing.show')) {
            return DataTables::query($data)
                ->filterColumn('fullname', function($query, $keyword) {
                    $sql = "CONCAT(b.lastname,',',b.firstname)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->addIndexColumn()
                ->addColumn('action', function ($request) {
                    $btn = '<td></d></tr><div class="btn-group-vertical">
                                <a type="button" class="btn btn-info data-edit" id="data-edit" data-id=' . $row->id . ' ><span class="fa fa-edit">&nbsp;&nbsp;</span>Edit</a>
                            </div></td>';
                    return $btn;
                })
                ->addColumn('formattedBorroweddates', function ($request) {
                    
                    return Carbon::create($request->date_borrowed)->format('F d, Y'); // human readable format
                  })
                ->addColumn('formattedReturneddates', function ($request) {
                    return Carbon::create($request->date_returned)->format('F d, Y'); // human readable format
                })
                // ->filterColumn('date_borrowed', function ($query, $keyword) {
                // $query->whereRaw("DATE_FORMAT(date_start,'%Y-%m-%d') like ?", ["%$keyword%"]); //date_format when searching using date
                // })
                // ->filterColumn('date_return', function ($query, $keyword) {
                // $query->whereRaw("DATE_FORMAT(date_end,'%Y-%m-%d') like ?", ["%$keyword%"]); //date_format when searching using date
                // })
                ->rawColumns(['action'])
                ->toJson();
        }elseif($user_permission -> contains('slug_name', 'IssuingDelete')) {
            return DataTables::query($data)
                ->filterColumn('fullname', function($query, $keyword) {
                    $sql = "CONCAT(b.lastname,',',b.firstname)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<td></d></tr><div class="btn-group-vertical">
                                <a type="button" class="btn btn-warning data-delete" id="data-delete" data-id=' . $row->id . ' ><span class="fa fa-backward">&nbsp;&nbsp;</span>Return</a>
                            </div></td>';
                    return $btn;
                })
                ->addColumn('formattedBorroweddates', function ($request) {
                    
                    return Carbon::create($request->date_borrowed)->format('F d, Y'); // human readable format
                  })
                ->addColumn('formattedReturneddates', function ($request) {
                    return Carbon::create($request->date_returned)->format('F d, Y'); // human readable format
                })
                // ->filterColumn('date_borrowed', function ($query, $keyword) {
                // $query->whereRaw("DATE_FORMAT(date_start,'%Y-%m-%d') like ?", ["%$keyword%"]); //date_format when searching using date
                // })
                // ->filterColumn('date_return', function ($query, $keyword) {
                // $query->whereRaw("DATE_FORMAT(date_end,'%Y-%m-%d') like ?", ["%$keyword%"]); //date_format when searching using date
                // })
                ->rawColumns(['action'])
                ->toJson();
        }
        else{
            return DataTables::query($data)
                ->filterColumn('fullname', function($query, $keyword) {
                    $sql = "CONCAT(b.lastname,',',b.firstname)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }

    public function Deletion(Request $request)
    {
        // Get Borrowing Details
        $borrowing = Borrowing::with('penalty', 'materialCopy')
            ->where('id', $request->id)
            ->firstOrFail();

        try {
            // Update Material Copy as available
            MaterialCopy::where('material_copy_id', $borrowing->materialCopy->material_copy_id)
                ->update([
                    'is_available' => 1,
                    'borrows_id' => NULL,
                ]); 

            // If Borrowing has a Penalty, update the penalty then mark as Done and Deleted
            if ($borrowing->penalty !== NULL) 
            {
                $daysOverdue = $borrowing->days_overdue;
                Penalty::where("users_id", $borrowing->user->id)
                    ->where("borrowings_id", $borrowing->id)
                    ->update([
                        'penalty_days' => $daysOverdue,
                        'updated_at' => now(),
                        'status' => 0,
                        'deleted_at' => now(),
                    ]);
            }

            // Update Borrowing as Done and Deleted
            Borrowing::where('id', $borrowing->id)
                ->update([
                    'status' => 0,
                    'deleted_at' => now(),
                    'date_returned' => now(),
                ]);

            return response()->json([
                'status' => 'success',
                'title' => 'Returning Book',
                'message' => 'Succesfully Returned Book and Settled Penalty associated with it!',
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'status' => 'error',
                'title' => 'Returning Book',
                'message' => 'Error in Returning Book and Settling Penalty',
            ]);
        }
    }

    public function book_extension(Request $request){
        extract($request->all());

        if($type == "extension"){
            $data = [
                'borrowings_id' => $borrowings_id,
                'users_id' => $user_id
            ];

            db::table('book_extension')
                ->insert($data);

            return response()->json([
                'status' => 'success'
            ]);
        }
        
        if($type == "accept"){

            $data = db::table('book_extension')
                ->where('id', $extension_id)
                ->get();

            foreach($data as $ext_data){
                $borrow_id = $ext_data -> borrowings_id;
            }

            db::table('book_extension')
            ->where('id', $extension_id)
            ->update(['status' => 1]);
            
           

            $penalty = db::table('penalty_settings')
            ->get();

            foreach($penalty as $settings){
                $days = $settings -> penalty_days;
            }

            $borrows = db::table('borrowings')
                ->where('id', $borrow_id)
                ->get();

            foreach($borrows as $borrow_data){
                $returned_date = $borrow_data -> date_returned;
            };

            $date  = Carbon::createFromFormat('Y-m-d', $returned_date);
            $date = $date->addDays($days);


            db::table('borrowings')
                ->where('id', $borrow_id)
                ->update([
                    'date_returned' => $date->toDateString()
                ]);
             
            return response()->json([
                'status' => 'success'
            ]);
        }

        if($type == "denied"){
            db::table('book_extension')
            ->where('id', $extension_id)
            ->update(['status' => 2]);

            return response()->json([
                'status' => 'success'
            ]);
        }


    }
    public function generateBorrowReport()
    {
    
        $borrowDet = db::table('borrowings as a')
        ->select('a.id as id','c.accession_number as accession_number','d.title as title','a.date_borrowed as date_borrowed','a.date_returned as date_returned', DB::raw("CONCAT(b.lastname,',',b.firstname) as fullname"))
        ->join('user_details as b', 'a.users_id', '=' , 'b.user_id')
        ->join('materials_copies as c', 'a.material_copy_id', '=', 'c.material_copy_id')
        ->join('materials as d', 'c.materials_id', '=', 'd.materials_id')
        ->get();

        $borrowContent = json_decode(json_encode($borrowDet), true);

        // echo"<pre>";
        // die(print_r($borrowContent)); 

        $data = $_POST;
        
        $data['borrowlist'] = array();
        foreach($borrowContent as $bookbor){   
        $convert_borrowed = date('Y-m-d', strtotime($bookbor['date_borrowed']));
        $convert_returned = date('Y-m-d', strtotime($bookbor['date_returned']));  
        // echo"<pre>";
        // die(print_r($data['borrowlist'])); 
            if($convert_borrowed >= $data['start'] && $convert_returned <= $data['end']){
                $bDet['accession_number'] = ucwords(strtoupper($bookbor['accession_number']));
                $bDet['title'] = $bookbor['title'];
                $bDet['fullname'] = $bookbor['fullname'];
                $date_borrowed = date_format(date_create($bookbor['date_borrowed']), 'F d, Y H:ia');
                $bDet['date_borrowed'] = $date_borrowed;
                $date_returned = date_format(date_create($bookbor['date_returned']), 'F d, Y H:ia');
                $bDet['date_returned'] = $date_returned;
                array_push($data['borrowlist'], $bookbor);
            }
        }  
        // echo"<pre>";
        // die(print_r($data['borrowlist'])); 
        $start = $_POST['start'];
        $end  = $_POST['end'];

        //foreach end
		$pdf = new MYPDF('landscape', PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->AddPage();
        $html = view('Issuing/generateBorrowReport', $data);
        $pdf->writeHTML($html, true, false, true, false, '');
        // $this->response->setContentType('application/pdf');
        $pdf->Output('Report-'.date("Y-m-d").'.pdf', 'I');
    }
}
