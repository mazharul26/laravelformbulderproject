@extends('admin.layouts.master')
@section('css')
 @livewireStyles
@stop
@section('admincontent')
 <div style="margin:20px">
   @livewire('department')
 </div>


@endsection
@section('js')
 @livewireScripts
@stop