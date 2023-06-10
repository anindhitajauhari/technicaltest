<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\KontrakPegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $dataPegawai = Pegawai::all();
        $dataJabatan = Jabatan::all();
        $dataKontrak = KontrakPegawai::all();
        return view(
            "datapegawai",
            compact("dataPegawai", "dataJabatan", "dataKontrak"),
        );
    }

    public function tambahpegawai()
    {
        $dataPegawai = Pegawai::all();
        $dataJabatan = Jabatan::all();
        $dataKontrak = KontrakPegawai::all();
        return view(
            "tambahdata",
            compact("dataPegawai", "dataJabatan", "dataKontrak"),
        );
    }

    public function insertdata(Request $request)
    {
        $pegawaiData = $request->only(["nama", "jeniskelamin", "notelp"]);
        $pegawai = Pegawai::create($pegawaiData); // Menyimpan data pegawai ke tabel pegawais

        $jabatanData = $request->only(["pegawai_id", "jenis", "gaji"]);
        // Menambahkan kolom pegawai_id ke dalam $jabatanData
        $jabatanData["pegawai_id"] = $pegawai->id;
        $jabatan = Jabatan::create($jabatanData); // Menyimpan data jabatan ke tabel jabatans

        $kontrakData = $request->only(["pegawai_id", "jeniskontrak"]);
        // Menambahkan kolom pegawai_id ke dalam $kontrakData
        $kontrakData["pegawai_id"] = $pegawai->id;
        $kontrak = KontrakPegawai::create($kontrakData); // Menyimpan data kontrak ke tabel kontrak_pegawais

        return redirect()->route("pegawai");
    }

    public function tampilkandata($id)
    {
        $dataPegawai = Pegawai::find($id);
        $dataPegawai->load("jabatan", "kontrakPegawai"); // Eager load the related data

        return view("tampildata", compact("dataPegawai"));
    }

    public function updatedata(Request $request, $id)
    {
        $pegawaiData = $request->only(["nama", "jeniskelamin", "notelp"]);
        $jabatanData = $request->only(["pegawai_id", "jenis", "gaji"]);
        $kontrakData = $request->only(["pegawai_id", "jeniskontrak"]);

        $dataPegawai = Pegawai::find($id);
        $dataPegawai->update($pegawaiData);

        $jabatan = $dataPegawai->jabatan;
        $jabatan->update($jabatanData);

        $kontrak = $dataPegawai->kontrakPegawai;
        $kontrak->update($kontrakData);

        return redirect()->route("pegawai");
    }

    public function delete($id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            // Data pegawai tidak ditemukan
            return redirect()
                ->route("pegawai")
                ->with("error", "Data pegawai tidak ditemukan.");
        }

        // Hapus data jabatan
        $pegawai->jabatan()->delete();

        // Hapus data kontrak pegawai
        $pegawai->kontrakPegawai()->delete();

        // Hapus data pegawai
        $pegawai->delete();

        return redirect()
            ->route("pegawai")
            ->with("success", "Data pegawai berhasil dihapus.");
    }
}
