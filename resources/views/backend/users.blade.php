@extends('admin.layouts.master')
@section('css')
 @livewireStyles
@stop
@section('admincontent')
 <div style="margin:20px">
   @livewire('allusers')
 </div>


@endsection
@section('js')
 @livewireScripts
@stop
