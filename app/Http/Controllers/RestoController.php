<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RestoController extends Controller
{
    const API_URL = 'http://192.168.2.14/go4-sumbergedang/rest-g4s/public/api/resto';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get(self::API_URL);
        $resto = $response->json();

        return view('resto.index', compact('resto'));
    }

    public function show($id)
    {
        $response = Http::get(self::API_URL . '/' . $id);
        $resto = $response->json();
        return view('resto.view', compact('resto'));
    }
    public function create()
    {
        return view('resto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|digits_between:15,16',
            'nama' => 'required',
            'tlp' => 'required|numeric|digits_between:10,13',
            'tempat_lahir' => 'required',
            'ttl' => 'date|date_format:Y-m-d',
            'alamat' => 'required',
            "jam_buka" => 'date_format:H:i',
            "jam_tutup" => 'date_format:H:i',
            'nama_resto' => 'required',
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
                'nik' => $request->nik,
                'nama' => $request->nama,
                'tlp' => $request->tlp,
                'tempat_lahir' => $request->tempat_lahir,
                'ttl' => $request->ttl,
                'alamat' => $request->alamat,
                "jam_buka" => $request->jam_buka,
                "jam_tutup" => $request->jam_tutup,
                'nama_resto' => $request->nama_resto,
                'email' => $request->email,
                'password' => $request->password,
            ]);

        if ($response->successful()) {
            $data = $response->json(); // Mendapatkan data dari respon API
            // Redirect ke halaman selanjutnya atau tampilkan pesan sukses kepada pengguna
            return redirect()->route('resto.index')->with('success', 'Driver berhasil ditambahkan!');
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $response = Http::get(self::API_URL . '/' . $id);
        $resto = $response->json();

        return view('resto.edit', compact('resto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|numeric|digits_between:15,16',
            'nama' => 'required',
            'tlp' => 'required|numeric|digits_between:10,13',
            'tempat_lahir' => 'required',
            'ttl' => 'date|date_format:Y-m-d',
            'alamat' => 'required',
            "jam_buka" => 'date_format:H:i',
            "jam_tutup" => 'date_format:H:i',
            'nama_resto' => 'required',
            'email' => 'required|email',
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
            'email' => $request->email,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            "jam_buka" => $request->jam_buka,
            "jam_tutup" => $request->jam_tutup,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'nama_resto' => $request->nama_resto,
        ];

        if ($fileContents !== null) {
            $response = Http::attach('foto', $fileContents, $fileName)
                ->post(self::API_URL . '/' . $id, $requestData);
        } else {
            $response = Http::post(self::API_URL . '/' . $id, $requestData);
        }

        if ($response->successful()) {
            $data = $response->json(); // Mendapatkan data dari respon API
            // Redirect ke halaman selanjutnya atau tampilkan pesan sukses kepada pengguna
            return redirect()->route('resto.index')->with('success', 'Driver berhasil diubah!');
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
            return redirect()->route('resto.index')->with('success', 'Resto berhasil ditambahkan!');
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
