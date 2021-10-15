<?php

namespace App\Http\Livewire;

use App\Models\Departments;
use Livewire\Component;

class Department extends Component
{
    public $data, $name,$code,$hid;
    public function render()
    {
        $this->data = Departments::all();
        return view('livewire.department');
    }
    public function resetForm()
    {
       $this->name = '';
        $this->code = '';
        $this->hid = '';
    }
    public function store()
    {
       $validation = $this->validate([
            'name'=>'required',
            'code'=>'required',
        ]);
        if($this->hid)
        {
            $departs = Departments::find($this->hid);
            $departs->update([
                'name'=>$this->name,
                'code'=>$this->code,
            ]);
            $this->resetForm();
            session()->flash('success',"Updated successfully");
        }else{
         Departments::create($validation);
        $this->resetForm();
        session()->flash('success',"Insert successfully");  
        }
      
      
    }
    public function edit($hid)
    {
      $depart=  Departments::find($hid);
      $this->name = $depart->name;
      $this->code = $depart->code;
      $this->hid = $depart->id;
    }
    public function delete($hid)
    {
        $depart=  Departments::find($hid);
        $depart->delete();
        session()->flash('success',"Delete successfully");
    }
}
