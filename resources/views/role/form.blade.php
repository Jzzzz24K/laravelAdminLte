<div class="modal-body">
    <!-- /.box-header -->
    <!-- form start -->
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-10">
                <input  type="text" name="name" class="form-control" placeholder="名称"
                       value="{{$fields['name']}}">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">角色描述</label>
            <div class="col-sm-10">
                <input  type="text" name="description" class="form-control" placeholder="描述"
                       value="{{$fields['description']}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">选择权限</label>
            <div class="col-sm-10">
{{--                <input id="icon" type="text" name="icon" class="form-control" placeholder="图标"--}}
{{--                       value="{{$fields['icon']}}">--}}
            </div>
        </div>

    </div>
    <!-- /.box-body -->
</div>


