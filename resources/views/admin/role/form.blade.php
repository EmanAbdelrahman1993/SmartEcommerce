<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $role->name or ''}} " required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('permissions') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Permissions' }}</label>
    {!! Form::select('permissions[]', $permissions , old('permissions')?? isset($role)?$role->permissions->pluck('name','name'): null ,('' == 'required' )?['class'=>'form-control' , 'required' => 'required','multiple']:['class'=>'form-control','multiple']) !!}

    {!! $errors->first('permissions', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
