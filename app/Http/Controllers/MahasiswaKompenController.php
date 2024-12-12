<?php

namespace App\Http\Controllers;

use App\Models\KompenDetailModel;
use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use App\Models\ProdiModel;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;

class MahasiswaKompenController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar mahasiswa kompen',
            'list' => ['Home', 'Mahasiswa Kompen']
        ];

        $page = (object)[
            'title' => 'Daftar mahasiswa yang sedang mengerjakan kompen'
        ];

        $activeMenu = 'mahasiswa_kompen'; // set menu yang sedang aktif

        $prodi = ProdiModel::all(); // ambil data prodi

        return view('mahasiswa_kompen.index', ['breadcrumb' => $breadcrumb, 'page' => $page,'prodi' => $prodi, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request){
        $mahasiswas = KompenDetailModel::select('id_mahasiswa' ,'id_kompen')
        ->whereHas('kompen', function($query) {
            $query->where('status', 'progres')->where('is_selesai', 'no');
        })
        ->with('mahasiswa', 'kompen', 'mahasiswa.prodi');

        // $mahasiswas = MahasiswaModel::select('id_mahasiswa', )

        //Filter data mahasiswa berdasarkan id_prodi
        if($request->id_prodi){
            $id_prodi = $request->id_prodi;
            $mahasiswas->whereHas('mahasiswa', function($query) use($id_prodi) {
                $query->where('id_prodi', $id_prodi);
            });
        }

        return DataTables::of($mahasiswas)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($mahasiswa){ //menambahkan kolom aksi

                $btn = '<button onclick="modalAction(\''.url('/mahasiswa_kompen/'. $mahasiswa->id_mahasiswa . '/show_ajax').'\')" class="btn btn-info btn-sm">Detail</button> ';
                // $btn .= '<button onclick="modalAction(\''.url('/mahasiswa_kompen/' . $mahasiswa->id_mahasiswa . '/edit_ajax').'\')" class="btn btn-warning btn-sm">Edit</button> ';
                // $btn .= '<button onclick="modalAction(\''.url('/mahasiswa_kompen/' . $mahasiswa->id_mahasiswa . '/delete_ajax').'\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function show_ajax(string $id){
        $mahasiswa_kompen = KompenDetailModel::select('id_kompen', 'id_mahasiswa', 'progres_1', 'progres_2', 'status')
        ->where('id_mahasiswa', $id)
        ->where('status', 'progres')
        ->with('kompen', 'mahasiswa', 'mahasiswa.prodi')
        ->first();

        return view('mahasiswa_kompen.show_ajax', ['mahasiswa_kompen' => $mahasiswa_kompen]);
    }
}
