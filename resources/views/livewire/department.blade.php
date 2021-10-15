<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <h1>Department Head Line</h1>
    @if(Session::has('success'))
        <h2 style="color:green">{{Session::get('success')}}</h2>
    @endif
    <input type="hidden" wire:mode="hid" value="{{$hid}}">
     <div class="form-group">
        <x-label for="name" :value="__('Name')" />
         <x-input  type="text"  class="form-control"  
                                wire:model="name"  />
                                @error('name')
                                    <span style="color:red">{{$message}}</span>
                                @enderror
    </div>
    <div class="form-group">
        <x-label for="code" :value="__('Code')" />
         <x-input  type="text"  class="form-control"  
                                wire:model="code" />
                                   @error('code')
                                    <span style="color:red">{{$message}}</span>
                                @enderror
    </div>
    <div class="form-group text-right">
         <button wire:click="store()" >Save</button>
    </div>
    <div>
    <table border="2">
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Code</th>
            <th>Action</th>
        </tr>
        @foreach($data as $key => $value)
             <tr>
            <th>{{$key+1}}</th>
            <th>{{$value->name ?? ''}}</th>
            <th>{{$value->code ?? ''}}</th>
            <th> <button wire:click="edit({{$value->id}})" >edit</button><button wire:click="delete({{$value->id}})" >Delete</button></th>

           
        </tr>
        @endforeach
       
    </table>
    </div>
</div>
