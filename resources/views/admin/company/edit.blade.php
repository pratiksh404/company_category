@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-edit-page name="company" route="company" :model="$company">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('admin.layouts.modules.company.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-edit-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.company.scripts')
@endsection