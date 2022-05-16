@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-create-page name="company" route="company">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('admin.layouts.modules.company.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-create-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.company.scripts')
@endsection