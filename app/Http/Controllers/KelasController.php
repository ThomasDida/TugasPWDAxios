<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Validator;

	class KelasController extends Controller{
		public function create(Request $request)
		{
			$validation = Validator::make($request->all(), [
				'nama_kelas'=>'required|string',
				'jurusan'=>'required|string',
			]);

			if ($validation->fails()) {
				$errors = $validation->errors();
				return [
					'status'=>'error',
					'message'=>$errors,
					'result'=>null
				];
			}

			$result = \App\Kelas::create($request->all());
			if ($result) {
				return[
					'status'=>'success',
					'message'=>'Data Behasil ditambahkan',
					'result'=>$result
				];
			} else {
				return [
					'status'=>'error',
					'message'=>'Data Gagal ditambahkan',
					'result'=>null
				];
			}
		}

		public function read(Request $request)
		{
			$result = \App\Kelas::all();
			return [
				'status'=>'success',
				'message'=>'',
				'result'=>$result
			];
		}

		public function update(Request $request, $id)
		{
			$validation = Validator::make($request->all(), [
				'nama_kelas'=>'required|string',
				'jurusan'=>'required|string',
			]);

			if ($validation->fails()) {
				$errors = $validation->errors();
				return [
					'status'=>'error',
					'message'=>$errors,
					'result'=>null
				];
			}

			$kelas = \App\Kelas::find($id);
			if (empty($kelas)) {
				return [
					'status'=>'error',
					'message'=>'Data Tidak ditemukan',
					'result'=>null
				];
			}

			$result = $kelas->update($request->all());
			if ($result) {
				return [
					'status'=>'success',
					'message'=>'Data Berhasil diubah',
					'result'=>$result
				];
			} else {
				return [
					'status'=>'error',
					'message'=>'Data Gagal diubah',
					'result'=>null
				];
			}
		}

		public function delete(Request $request, $id)
		{
			$kelas = \App\Kelas::find($id);
			if (empty($kelas)) {
				return [
					'status'=>'error',
					'message'=>'Data Tidak ditemukan',
					'result'=>null
				];
			}

			$result = $kelas->delete($id);
			if ($result) {
				return [
					'status'=>'success',
					'message'=>'Data Berhasil dihapus',
					'result'=>$result
				];
			} else {
				return [
					'status'=>'error',
					'message'=>'Data Gagal dihapus',
					'result'=>null
				];
			}
		}

		public function detail($id){
			$kelas = \App\Kelas::find($id);

			if (empty($kelas)) {
				return [
					'status' => 'error',
					'message' => 'Data tidak ditemukan',
					'result' => null
				];
			}

			return [
				'status' => 'success',
				'result' => $kelas
			];
		}
	}
 ?>