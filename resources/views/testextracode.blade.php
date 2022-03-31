


$date = Carbon::parse('January 2022')->format('F Y');
$firstDateOfMonth = Carbon::parse($date)->firstOfMonth()->format('d.m.Y');
$lastDateOfMonth = Carbon::parse($date)->endOfMonth()->format('d.m.Y');




<?php

public function index(Request $request) {

            $lat = YOUR_CURRENT_LATTITUDE;
            $lon = YOUR_CURRENT_LONGITUDE;

            $data = DB::table("users")
            ->select("users.id"
            ,DB::raw("6371 * acos(cos(radians(" . $lat . "))
            * cos(radians(users.lat))
            * cos(radians(users.lon) - radians(" . $lon . "))
            + sin(radians(" .$lat. "))
            * sin(radians(users.lat))) AS distance"))
            ->groupBy("users.id")
            ->get();

            dd($data);
            }

public function update(Request $request, $id)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);

        $hashedPassword = Auth::user()->password;
        if (\Hash::check($request->oldpassword , $hashedPassword)) {
            if (\Hash::check($request->newpassword , $hashedPassword)) {

                $users = admin::find(Auth::user()->id);
                $users->password = bcrypt($request->newpassword);
                $users->save();
                session()->flash('message','password updated successfully');
                return redirect()->back();
            }
            else{
                session()->flash('message','new password can not be the old password!');
                return redirect()->back();
            }
        }
        else{
            session()->flash('message','old password doesnt matched');
            return redirect()->back();
        }
    }
