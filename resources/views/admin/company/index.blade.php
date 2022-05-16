@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-index-page name="company" route="company">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td>
                        <img src="{{$company->image}}" alt="{{$company->title}}" width="100">
                    </td>
                    <td>{{$company->title}}</td>
                    <td>{{$company->category->title ?? "N/A"}}</td>
                    <td>{{$company->status}}</td>
                    <td>
                        <x-adminetic-action :model="$company" route="company" />
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-index-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.company.scripts')
@endsection