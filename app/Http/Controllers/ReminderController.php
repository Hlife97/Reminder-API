<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function index()
    {
        return Reminder::all();
    }

    public function store(Request $request)
    {
        try{
            $reminder = new Reminder();
            $reminder->title = $request->title;
            $reminder->time = $request->time;
            $reminder->status = $request->status;

            if($reminder->save()){
                return response()->json(['status'=> 'success', 'message' => 'Reminder created successfully!']);
            }
        }catch(\Exception $e){
            return response()->json(['status'=> 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $reminder = Reminder::findOrFail($id);
            $reminder->title = $request->title;
            $reminder->time = $request->time;
            $reminder->status = $request->status;

            if($reminder->save()){
                return response()->json(['status'=> 'success', 'message' => 'Reminder updated successfully!']);
            }
        } catch (\Exception $e) {
            return response()->json(['status'=> 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $reminder = Reminder::findOrFail($id);

            if($reminder->delete()){
                return response()->json(['status'=> 'success', 'message' => 'Reminder deleted successfully!']);
            }
        } catch (\Exception $e) {
            return response()->json(['status'=> 'error', 'message' => $e->getMessage()]);
        }
    }
}
