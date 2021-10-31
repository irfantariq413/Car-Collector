<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Session;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function manage(Request $request){
		
		$title='Manage Cars';
		$car = Car::orderBy('id','desc')->paginate(5);
		return view('dashboard',compact('car','title'));
	}
	
	public function create(){
		$title='Add Car';
		return view('add',compact('title'));
	}

	public function store(Request $request){
		 
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
			'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
		
		$input = $request->all();
		
		$image = $request->file('img');
        $input['img'] = time().'.'.$image->extension();		
		
		resize_image($image,$input['img']);
		
        $destinationPath = 'public/assets/uploads/o';
        $image->move($destinationPath, $input['img']);
		
		Car::create($input);
		return redirect()->route('car.manage')
                        ->with('success','Car has been added successfully');
    }
	
	public function edit($id)
	{
		$title='Edit Car';
		$car = Car::where('id',$id)->first();
		return view('edit',compact('car','title'));
	}
	
	public function update(Request $request, $id)
	{
		$request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
			'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
		
		$car = Car::find($id);
		
		unlink_image($car->img);
		$input = $request->all();
		
        $image = $request->file('img');
        $input['img'] = time().'.'.$image->extension();		
		
		resize_image($image,$input['img']);
		
        $destinationPath = 'public/assets/uploads/o';
        $image->move($destinationPath, $input['img']);
		
        $car->update($input);
    
        return redirect()->route('car.manage')
                        ->with('success','Car has been updated successfully');
    }
	
	public function delete($id)
	{
		$car = Car::where('id',$id)->first();
		unlink_image($car->img);
		$car->delete();
        return redirect()->route('car.manage')
                        ->with('success','Car has been deleted successfully');
    }
}
