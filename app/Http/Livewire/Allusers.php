<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Allusers extends Component
{
    public $data, $name,$email,$password,$password_confirmation,$hid;
    public function render()
    {
        $this->data = User::all();
        return view('livewire.allusers');
    }
    public function resetForm()
    {
       $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->hid = '';
    }

    public function store()
    {
       $validation = $this->validate([
            'name'=>'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);
     //   $validation = Hash::make($this->password);
        if($this->hid)
        {
            $departs = User::find($this->hid);
            $departs->update([
                'name'=>$this->name,
                'email'=>$this->email,
                'password'=>Hash::make($this->password),

            ]);
            $this->resetForm();
            session()->flash('success',"Updated successfully");
        }else{
         User::create($validation);
        $this->resetForm();
        session()->flash('success',"Insert successfully");
        }


    }
    public function edit($hid)
    {
      $depart=  User::find($hid);
      $this->name = $depart->name;
      $this->email = $depart->email;
      $this->hid = $depart->id;
    }
    public function delete($hid)
    {
        $depart=  User::find($hid);
        $depart->delete();
        session()->flash('success',"Delete successfully");
    }
}
