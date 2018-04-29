<?php

namespace App\Http\Controllers;
use App\Reservation;
use Illuminate\Http\Request;
class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAllReservations()
    {
        $reservations = Reservation::latest()->take(10)->get();
        return response()->json($reservations, 200);
    }

    public function showNewReservations()
    {
        $new_reservations = Reservation::where('retrieved', 0)->get();
        
        foreach( $new_reservations as $reserve){
            $reserve->update([
                'retrieved' =>1,
            ]);
        }
        return response()->json($new_reservations, 200);
        
         exit();
    }

    public function showOneReservation(Request $request, $id)
    {
            $reservation = Reservation::findOrFail($id);
            
            if ($reservation) {
                return response()->json($reservation, 200);
            }else{
                return response()->json('Not Found', 400);            
            }
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update($request->all());

        return response()->json($reservation,200);
    }

    public function create(Request $request)
    {
        $res = Reservation::create($request->all());

        return response()->json($res, 201);
    }

    public function delete(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        if ($reservation) {
            $reservation->delete();

            return response()->json('Deleted successfully', 200);
        }
        else{
            return response()->json('Reservation does not exist', 400);
        }
    }   
}
