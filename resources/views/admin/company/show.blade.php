@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-show-page name="company" route="company" :model="$company">
    <x-slot name="content">
        @isset($company->description)
        {!! $company->description !!}
        @endisset
    </x-slot>
</x-adminetic-show-page>

@endsection

@section('custom_js')
@include('admin.layouts.modules.company.scripts')
@endsection