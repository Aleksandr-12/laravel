<?php

namespace App\Http\Controllers;
use App\Country;

use Illuminate\Http\Request;

class HomeController extends Controller
{	
	public function HomePage() {
		$country = new Country();
		return view('home',['data'=> $country->all()]);
	}
	
    public function AjaxSubmit(Request $req) {
		
		$validation = $req->validate([
			'name' => 'required|min:3|max:50|string',
			'longitude' => 'required',
			'latitude' => 'required',
			'count_people' => 'required|integer',
		]);
		
		$country = new Country();
		$country->name = $req->input('name');
		$country->longitude = $req->input('longitude');
		$country->latitude = $req->input('latitude');
		$country->count_people = $req->input('count_people');
		
		$country->save();
		$country = new Country();
		if($req->ajax()){
			return $country->all();
		}else{
			return redirect()->route('home')->with('success','Даныые успешно добавлены');
		}		
	}
}
