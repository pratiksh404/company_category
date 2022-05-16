<div class="row">
    <div class="col-lg-6">
        <div class="mb-2">
            <label for="title">Company Title <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="text" name="title" id="title" class="form-control"
                    value="{{$company->title ?? old('title')}}" placeholder="Company Title">
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-2">
            <label for="category_id">Company Category <span class="text-danger">*</span></label>
            <div class="input-group">
                <select name="category_id" class="form-control" style="width: 100%">
                    <option selected disabled>Select Company Category ..</option>
                    @isset($categories)
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{isset($company->category_id) ? ($company->category_id ==
                        $category->id ? "selected" : "") : ""}}>{{$category->title}}</option>
                    @endforeach
                    @endisset
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <label>Status ?</label> <br>
        <label class="switch">
            <input type="hidden" name="status" value="0">
            <input type="checkbox" value="1" name="status" {{ isset($company->status) ?
            ($company->status ?
            'checked' : '')
            : 'checked' }}><span class="switch-state"></span>
        </label>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-5">
        <label for="image">Company Image</label> <br>
        <input type="file" name="image" id="image" accept="image/*" onchange="readURL(this);">
    </div>
    <div class="col-lg-7 d-flex justify-content-center">
        @if (isset($company->image))
        <br>
        <img src="{{ $company->image }}" alt="{{ $company->name ?? '' }}" class="img-fluid" id="company_image">
        @endif
        <img src="" id="company_image_plcaeholder" class="img-fluid">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="description">Description</label>
        <textarea name="description" id="heavytexteditor" cols="30" rows="10">
            @isset($company->description)
            {!! $company->description !!}   
            @endisset
        </textarea>
    </div>
</div>
<x-adminetic-edit-add-button :model="$company ?? null" name="Company" />