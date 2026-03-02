<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use App\Models\Tanggapan;
use App\Services\TanggapanAspirasiService;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{ 

     public function __construct(
        private TanggapanAspirasiService $service
    ) {}

     public function index()
    { 
        $data =[
            'title'=>'Data Aspirasi',
            'aspirasi' => Aspirasi::with(['siswa.user', 'kategori'])
                        ->latest('id')
                        ->paginate(5),
        ];
        return view('admin.data-aspirasi', $data);

    }
    public function getTanggapanByAspirasi(Request $request)
    {
        $tanggapan = Tanggapan::where([
            'aspirasi_id' => $request->id,
            'user_id'=> $request->userId,
        ])->first();
        $aspirasi = Aspirasi::find($request->id);

        $data =[
            'aspirasi'=> $aspirasi,
            'tanggapan'=> $tanggapan,
        ];
        
        return $data;
    }
    public function addTanggapan(Request $request)
    {
         try {
            $this->service->addTanggapan($request->all());
            return redirect()->route('admin.aspirasi')->with('success', 'Tanggapan berhasil ditambahkan ke dalam database, dan status aspirasi berhasil di-update.');
        } catch (\Throwable $th) {
            return redirect()->route('admin.aspirasi')->with('error', 'Gagal menambahkan tanggapan!');
        }
    }

    public function delete(Aspirasi $aspirasi)
    {
         try {
            $this->service->delete($aspirasi);
            return redirect()->route('admin.aspirasi')->with('success', 'Aspirasi berhasil dihapus dari database.');
        } catch (\Throwable $th) {
            return redirect()->route('admin.aspirasi')->with('error', 'Gagal menghapus aspirasi!');
        }
    }
}
