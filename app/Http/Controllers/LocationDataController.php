<?php

namespace App\Http\Controllers;

use App\LocationPicture;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationDataController extends Controller
{
	
	public function location($name)
    {
    	$location_data = DB::table('location_data')->where('location_name',$name)->get();
		$users = DB::table('users')->get();
    	return view('location-single',['location_data' => $location_data, 'users' => $users]);
	}
	
	public function find(Request $request)
	{
		$find = $request->find;
		$location_data = DB::table('location_data')->where('location_name','like',"%".$find."%")->paginate();
		return view('location',['location_data' => $location_data]);
 
	}

	public function view_data()
    {
    	$location_data = DB::table('location_data')->get();
 
    	return view('view_location_data',['location_data' => $location_data]);
	}
    public function add()
    {
		return view('add_location_data');
    }


    public function store(Request $request){
		if ($request->hasFile('location_picture')){

			$file = $request->file('location_picture');
			$file_name = $file->getClientOriginalName();
			$file->move('images',$file_name);
			
			DB::table('location_data')->insert([
				'location_name' => $request->location_name,
				'location_address' => $request->location_address,
				'location_description' => $request->location_description,
				'location_picture' => '/images/'.$file->getClientOriginalName()
			]);

		}

		return redirect('/location_data');
    }

	public function update(Request $request){
		if ($request->hasFile('location_picture')){
			
			$file = $request->file('location_picture');
			$file_name = $file->getClientOriginalName();
			$file->move('images',$file_name);
			
			DB::table('location_data')->where('location_id',$request->id)->update([
				'location_name' => $request->location_name,
				'location_address' => $request->location_address,
				'location_description' => $request->location_description,
				'location_picture' => '/images/'.$file->getClientOriginalName()
			]);
		}

		return redirect('/location_data');
    }

    public function edit($id)
    {
	$location_data = DB::table('location_data')->where('location_id',$id)->get();
	return view('edit_location_data',['location_data' => $location_data]);
    }



    public function delete($id)
    {
	DB::table('location_data')->where('location_id',$id)->delete();
	return redirect('/location_data');
    }


    public function upload(){
        $gambar = LocationPicture::get();
		return view('upload',['location_picture' => $gambar]);
	}

 
	public function proses_upload(Request $request){
		$this->validate($request, [
			'location_picture' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('location_picture');
 
		    // nama file
			echo 'File Name: '.$file->getClientOriginalName();
			echo '<br>';
		 
			// ekstensi file
			echo 'File Extension: '.$file->getClientOriginalExtension();
			echo '<br>';

			// ukuran file
			echo 'File Size: '.$file->getSize();
			echo '<br>';
		 
		 
			// isi dengan nama folder tempat kemana file diupload
			$upload_destination = "C:\xampp\htdocs\TherashiFix\public\images";
		 
			// upload file
			$file->move($upload_destination,$file->getClientOriginalName());
 
		
		
	}
}
