<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeSlotController extends Controller
{
    public function add_new()
    {
        $timeslots = TimeSlot::latest()->paginate(config('default_pagination'));
        return view('admin-views.time-slots.index', compact('timeslots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'available_time_starts' => 'required',
            'available_time_ends' => 'required',
        ]);
        $data  = '';
        if($request->timeslot_type == 'zone_wise')
        {
            $data = $request->zone_ids;
        }
        else if($request->timeslot_type == 'restaurant_wise')
        {
            $data = $request->restaurant_ids;
        }

        DB::table('timeslot')->insert([
            'name' => $request->name,
            'start_date' => $request->available_time_starts,
            'expire_date' => $request->available_time_ends,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Toastr::success(trans('messages.timeslot_added_successfully'));
        return back();
    }

    public function edit($id)
    {
        $timeslot = timeslot::where(['id' => $id])->first();
        // dd(json_decode($timeslot->data));
        return view('admin-views.time-slots.edit', compact('timeslot'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:191',
            'available_time_starts' => 'required',
            'available_time_ends' => 'required',
        ]);
        $data  = '';
        if($request->timeslot_type == 'zone_wise')
        {
            $data = $request->zone_ids;
        }
        else if($request->timeslot_type == 'restaurant_wise')
        {
            $data = $request->restaurant_ids;
        }

        DB::table('timeslot')->where(['id' => $id])->update([
            'name' => $request->name,
            'start_date' => $request->available_time_starts,
            'expire_date' => $request->available_time_ends,
            'updated_at' => now()
        ]);

        Toastr::success(trans('messages.timeslot_updated_successfully'));
        return back();
    }

    public function status(Request $request)
    {
        $timeslot = TimeSlot::find($request->id);
        $timeslot->status = $request->status;
        $timeslot->save();
        Toastr::success(trans('messages.timeslot_status_updated'));
        return back();
    }

    public function delete(Request $request)
    {
        $timeslot = TimeSlot::find($request->id);
        $timeslot->delete();
        Toastr::success(trans('messages.timeslot_deleted_successfully'));
        return back();
    }

    public function search(Request $request){
        $key = explode(' ', $request['search']);
        $timeslots=TimeSlot::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('name', 'like', "%{$value}%");
            }
        })->limit(50)->get();
        return response()->json([
            'view'=>view('admin-views.time-slots.partials._table',compact('timeslots'))->render(),
            'count'=>$timeslots->count()
        ]);
    }
}
