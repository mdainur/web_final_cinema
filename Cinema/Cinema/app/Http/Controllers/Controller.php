<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function updateProfile(Request $request, int $id) {
        $request->validate([
            'name' => 'required',
            'profile_pic' => 'required',
        ]);

        $user = \App\Models\User::where('id', $id)->first();

        $user->name = $request->name;
        $user->profile_pic = $request->profile_pic;

        $user->save();

        return redirect()->route('profile')
                        ->with('success', 'Профиль успешно обновлен.');
    }

    public function updatepass(Request $request, int $id) {
        $request->validate([
            'old' => 'required',
            'confirm' => 'required',
            'new' => 'required',
        ]);

        $user = \App\Models\User::where('id', $id)->first();



        if (\Illuminate\Support\Facades\Hash::check($request->old, $user->password)) {

            if ($request->new == $request->confirm) {
                $user->fill([
                    'password' => \Illuminate\Support\Facades\Hash::make($request->new)
                ])->save();

                $request->session()->flash('success', 'Пароль изменен!');
                return redirect()->route('profile');
            } else {
                $request->session()->flash('error', 'Пароли не совпадают!');
                return redirect()->route('profile');
            }
        } else {
            $request->session()->flash('error', 'Старый пароль неверный!');
            return redirect()->route('profile');
        }

        return redirect()->route('profile')
                        ->with('success', 'Профиль успешно обновлен.');
    }

    public function reserve(Request $request) {

        if (\Illuminate\Support\Facades\Auth::check()) {


            $iterator = 0;

            for ($i = 1; $i <= 108; $i++) {

                if ($request['place' . $i] == 1) {
                    $request->session()->flash($iterator, $i);

                    $iterator++;
                }
            }



            return redirect('/schedule_details/' . $request['sch_id'] . '#tickets');

        } else {
            return redirect('/');
        }
    }

    public function buy_tickets(Request $request) {

        function ryad($iterator) {
            $it = 0;

            for ($i = 0; $i < 9; $i++) {
                for ($j = 0; $j < 12; $j++) {
                    $it++;
                    if ($iterator == $it) {

                        $pl['row'] = $i + 1;
                        $pl['seat'] = $j + 1;

                        return $pl;
                    }
                }
            }
        }

        $places_ordered = [];
        $iterator = 0;

        for ($i = 1; $i <= 108; $i++) {

            if ($request[$i] == 1) {//Child
                \App\Models\Ticket::create(['schedule_id' => $request['sch_id'],
                    'user_id' => auth()->user()->id,
                    'place' => $i,
                    'type' => 'CHILD',
                ]);
                $places_ordered[] = $i;
            }
            if ($request[$i] == 2) {//Student
                \App\Models\Ticket::create(['schedule_id' => $request['sch_id'],
                    'user_id' => auth()->user()->id,
                    'place' => $i,
                    'type' => 'STUDENT',
                ]);
                $places_ordered[] = $i;
            }

            if ($request[$i] == 3) {//Adult
                \App\Models\Ticket::create(['schedule_id' => $request['sch_id'],
                    'user_id' => auth()->user()->id,
                    'place' => $i,
                    'type' => 'ADULT',
                ]);

                $places_ordered[] = $i;
            }
        }


        $schedule = \App\Models\Schedule::find($request['sch_id']);
        $places = json_decode($schedule->places, true);

        for ($k = 0; $k < sizeof($places_ordered); $k++) {
            $pp = ryad($places_ordered[$k]);
            for ($i = 0; $i < 9; $i++) {
                for ($j = 0; $j < 12; $j++) {

                    if ($i == $pp['row'] - 1 && $j == $pp['seat'] - 1)
                        $places[$i][$j] = auth()->user()->id;
                }
            }
        }

        $schedule->places = json_encode($places);
        $schedule->save();
        return redirect()->route('schedule_details', $request['sch_id']);
    }

}
