

<div>

    <h1>All Users List</h1>
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
        <x-label for="Email" :value="__('Email')" />
         <x-input  type="email"  class="form-control"
                                wire:model="email" />
                                   @error('email')
                                    <span style="color:red">{{$message}}</span>
                                @enderror
    </div>
    <div class="form-group">
        <x-label for="Password" :value="__('Password')" />
         <x-input  type="password"  class="form-control"
                                wire:model="password" />
                                   @error('password')
                                    <span style="color:red">{{$message}}</span>
                                @enderror
    </div>
    <div class="form-group">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-input id="password_confirmation" class=""
        type="password"
        wire:model="password_confirmation" required />
                                   @error('password_confirmation')
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
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach($data as $key => $value)
             <tr>
            <th>{{$key+1}}</th>
            <th>{{$value->name ?? ''}}</th>
            <th>{{$value->email ?? ''}}</th>
            <th> <button wire:click="edit({{$value->id}})" >edit</button><button wire:click="delete({{$value->id}})" >Delete</button></th>


        </tr>
        @endforeach

    </table>
    </div>
</div>
