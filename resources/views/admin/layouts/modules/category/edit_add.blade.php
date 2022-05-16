<div class="row">
    <div class="col-12">
        <div class="mb-2">
            <label for="title">Category Title <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="text" name="title" id="title" class="form-control"
                    value="{{$category->title ?? old('title')}}" placeholder="Category Title">
            </div>
        </div>
    </div>
</div>
<x-adminetic-edit-add-button :model="$category ?? null" name="Category" />