<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Facility;
use App\Models\Feature;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Room::latest()->get();
        return view('admin.room.index', compact('room'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facility = Facility::orderBy('name', 'ASC')->get();
        return view('admin.room.create', compact('facility'))->with('i');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = str_replace(' ', '-', strtolower($request->name));
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $image = $img->getClientOriginalName();
            $img->move(public_path('/img'), $image);


        $crud = Room::create([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $image,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'class' => $request->class,
        ]);
        } else {
            $crud = Room::create([
                'name' => $request->name,
                'slug' => $slug,
                'image' => $image,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'type' => $request->type,
                'class' => $request->class,
            ]);
        }


        $room = Room::orderBy('id', 'DESC')->first();
        $r = $room->id;


        $fac = Facility::orderBy('name', 'ASC')->get();
        $count = $fac->count();

        $i = 1;

        foreach ($fac as $f) { 
            if ($request->input('facility_id'.$i) == null) {
                $crud2 = Feature::create([
                    'room_id' => $r,
                    'facility_id' => $f->id,
                    'status' => 0,
                ]);
            } else {
                $crud2 = Feature::create([
                    'room_id' => $r,
                    'facility_id' => $f->id,
                    'status' => 1,
                ]);
            }
            $i++;
        }

        if ($crud2) {
            return redirect()->route('room')->with('status', 'Success');
        } else {
            return redirect()->back()->with('status', 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Feature::with('facility')->where('room_id', $id)->get();
        $room = Room::findOrFail($id);
        return view('admin.room.edit', compact('room', 'feature'))->with('i');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug = str_replace(' ', '-', strtolower($request->name));
        $room = Room::findOrFail($id);
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $image = $img->getClientOriginalName();
            $img->move(public_path('/img'), $image);

        $crud = $room->update([
            'name' => $request->name,
            'image' => $image,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'class' => $request->class,
        ]);
        } else {
            $crud = $room->update([
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'type' => $request->type,
                'class' => $request->class,
            ]);
        }

        $fac = Facility::orderBy('name', 'ASC')->get();
        $count = $fac->count();

        $i = 1;

        foreach ($fac as $f) { 
            $feature = Feature::where('room_id', $id)->where('facility_id', $request->input('facility_id'.$i));
            if ($request->input('facility_id'.$i) == null) {
                $crud2 = $feature->update([
                    'status' => 0,
                ]);
            } else {
                $crud2 = $feature->update([
                    'status' => 1,
                ]);
            }
            $i++;
        }

        if ($crud2) {
            return redirect()->route('room')->with('status', 'Success');
        } else {
            return redirect()->back()->with('status', 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $feature = Feature::where('room_id', $id);
        $crud = $feature->delete();
        $crud2 = $room->delete();
        
        if ($crud2) {
            return redirect()->route('room')->with('status', 'Success');
        }
    }
}
