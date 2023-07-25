<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MobilController extends Controller
{
    const API_URL = 'http://192.168.2.14/go4-sumbergedang/rest-g4s/public/api/driver';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get(self::API_URL.'/mobil');
        $mobil = $response->json();

        return view('mobil.index', compact('mobil'));
    }

    public function show($id)
    {
        $response = Http::get(self::API_URL . '/' . $id);
        $driver = $response->json();
        return view('mobil.view', compact('driver'));
    }

    public function create()
    {
        return view('mobil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|digits_between:15,16',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'ttl' => 'date|date_format:Y-m-d',
            'jk' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kendaraan' => 'required',
            'plat_no' => 'required',
            'thn_kendaraan' => 'required',
            'tlp' => 'required|numeric|digits_between:10,13',
            'email' => 'required|email',
        ]);

        // dd($request->all());
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $fileContents = file_get_contents($file->getPathname());
        } else {
            // Jika tidak ada foto yang diunggah, set nilai default atau kirimkan null ke server API sesuai kebutuhan
            $fileName = null;
            $fileContents = null;
        }

        $response = Http::attach('foto', $fileContents, $fileName)
            ->post(self::API_URL, [
                'nama' => $request->nama,
                'email' => $request->email,
                'tlp' => $request->tlp,
                'password' => "hasan123",
                'nik' => $request->nik,
                'tempat_lahir' => $request->tempat_lahir,
                'ttl' => $request->ttl,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'kendaraan' => $request->kendaraan,
                'status_driver' => "mobil",
                'plat_no' => $request->plat_no,
                'thn_kendaraan' => $request->thn_kendaraan,
            ]);

        if ($response->successful()) {
            $data = $response->json(); // Mendapatkan data dari respon API
            // Redirect ke halaman selanjutnya atau tampilkan pesan sukses kepada pengguna
            return redirect()->route('mobil.index')->with('success', 'Driver berhasil ditambahkan!');
        } else {
            // Jika permintaan gagal
            $errorResponse = $response->json(); // Jika API mengembalikan pesan kesalahan dalam bentuk JSON
            $errors = [];
            if (isset($errorResponse['message']) && is_array($errorResponse['message'])) {
                foreach ($errorResponse['message'] as $field => $fieldErrors) {
                    $errors[$field] = $fieldErrors[0];
                }
            }

            // Kembali ke halaman "create" dengan membawa pesan error
            return back()->withErrors($errors);
        }

    }

    public function edit($id)
    {
        $response = Http::get(self::API_URL . '/' . $id);
        $driver = $response->json();

        return view('mobil.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'sometimes',
            'tempat_lahir' => 'sometimes',
            'ttl' => 'date|date_format:Y-m-d',
            'jk' => 'sometimes',
            'alamat' => 'sometimes',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
            'kendaraan' => 'sometimes',
            'plat_no' => 'sometimes',
            'thn_kendaraan' => 'digits:4',
            'tlp' => 'numeric|digits_between:10,13',
        ]);

        // dd($request->all());n+ 
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $fileContents = file_get_contents($file->getPathname());
        } else {
            // Jika tidak ada foto yang diunggah, set nilai default atau kirimkan null ke server API sesuai kebutuhan
            $fileName = null;
            $fileContents = null;
        }

        $requestData = [
            'nama' => $request->nama,
            'tlp' => $request->tlp,
            'tempat_lahir' => $request->tempat_lahir,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'kendaraan' => $request->kendaraan,
            'status_driver' => "mobil",
            'plat_no' => $request->plat_no,
            'thn_kendaraan' => $request->thn_kendaraan,
        ];

        if ($fileContents !== null) {
            $response = Http::attach('foto', $fileContents, $fileName)
                ->post(self::API_URL . '/update/' . $id, $requestData);
        } else {
            $response = Http::post(self::API_URL . '/update/' . $id, $requestData);
        }

        if ($response->successful()) {
            $data = $response->json(); // Mendapatkan data dari respon API
            // Redirect ke halaman selanjutnya atau tampilkan pesan sukses kepada pengguna
            return redirect()->route('mobil.index')->with('success', 'Driver berhasil diubah!');
        } else {
            // Jika permintaan gagal
            $errorResponse = $response->json(); // Jika API mengembalikan pesan kesalahan dalam bentuk JSON
            $errors = [];
            if (isset($errorResponse['message']) && is_array($errorResponse['message'])) {
                foreach ($errorResponse['message'] as $field => $fieldErrors) {
                    $errors[$field] = $fieldErrors[0];
                }
            }

            // Kembali ke halaman "create" dengan membawa pesan error
            return back()->withErrors($errors);
        }

    }

    public function destroy($id)
    {
        $response = Http::post(self::API_URL . '/delete/' . $id);
        if ($response->successful()) {
            $data = $response->json(); // Mendapatkan data dari respon API
            // Redirect ke halaman selanjutnya atau tampilkan pesan sukses kepada pengguna
            return redirect()->route('mobil.index')->with('success', 'Driver berhasil ditambahkan!');
        } else {
            // Jika permintaan gagal
            $errorResponse = $response->json(); // Jika API mengembalikan pesan kesalahan dalam bentuk JSON
            $errors = [];
            if (isset($errorResponse['message']) && is_array($errorResponse['message'])) {
                foreach ($errorResponse['message'] as $field => $fieldErrors) {
                    $errors[$field] = $fieldErrors[0];
                }
            }

            // Kembali ke halaman "create" dengan membawa pesan error
            return back()->withErrors($errors);
        }
    }
}