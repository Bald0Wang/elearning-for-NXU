<div class="form-group row">
    <label for="name" class="col-md-3 col-form-label">
        名称
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="name" id="name" value="{{ $name }}">
    </div>
</div>



<div class="form-group row">
    <label for="desc" class="col-md-3 col-form-label">
        描述
    </label>
    <div class="col-md-8">
        <textarea class="form-control" id="desc" name="desc" rows="3">
            {{ $desc }}
        </textarea>
    </div>
</div>

<div class="form-group row">
    <label for="location_id" class="col-md-3 col-form-label">
        位置ID
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="location_id" id="location_id" value="{{ $location_id }}">
    </div>
</div>

<div class="form-group row">
    <label for="position" class="col-md-3 col-form-label">
        经/纬度
    </label>
    <div class="col-md-4">
        <input type="text" class="form-control" name="position" id="position" value="{{ $position }}">
    </div>
</div>

<div class="form-group row">
    <label for="status" class="col-md-3 col-form-label">
        状态
    </label>
    <div class="col-md-4">
        <input type="text" class="form-control" name="status" id="status" value="{{ $status }}">
    </div>
</div>
