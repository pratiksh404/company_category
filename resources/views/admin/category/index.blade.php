@extends('adminetic::admin.layouts.app')

@section('content')
<x-adminetic-index-page name="category" route="category">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <div class="row">
            <div class="col-lg-4">
                <form action="{{adminStoreRoute('category')}}" method="post">
                    @csrf
                    @include('admin.layouts.modules.category.edit_add')
                </form>
            </div>
            <div class="col-lg-8">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category_index)
                        <tr>
                            <td>{{$category_index->title ?? "N/A"}}</td>
                            <td>
                                <x-adminetic-action :model="$category_index" route="category" show="0" />
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-index-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.category.scripts')
@endsection