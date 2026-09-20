<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Nama wajib diisi
            'nama' => 'required|min:3',

            // Harga wajib diisi dan harus angka
            'harga' => 'required|numeric|min:1000',

            // Deskripsi boleh kosong
            'deskripsi' => 'nullable',

            // Kode produk tidak wajib dikirim
            // Jika dikirim, maksimal 20 karakter
            'kode_produk' => 'sometimes|nullable|max:20',

            // Gambar wajib diupload
            // Harus berupa gambar
            // Format yang diperbolehkan JPG, JPEG, PNG
            // Maksimal 2 MB
            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama produk wajib diisi.',
            'nama.min' => 'Nama produk minimal 3 karakter.',

            'harga.required' => 'Harga produk wajib diisi.',
            'harga.numeric' => 'Harga produk harus berupa angka.',
            'harga.min' => 'Harga produk minimal Rp1.000.',

            'kode_produk.max' => 'Kode produk maksimal 20 karakter.',

            'gambar.required' => 'Gambar produk wajib diupload.',
            'gambar.image' => 'File yang diupload harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, atau PNG.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ];
    }
}