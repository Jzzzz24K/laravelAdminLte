<div class="modal fade in" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #337ab7">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="menu-title modal-title" style="color: white;">创建角色</h4>
            </div>
            <form class="menu-form form-horizontal" action="/role" method="post">
                <div class="modal-body">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">角色名称</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" placeholder="名称"
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
                                <select id="select2" name="permission_id[]" multiple="multiple" class="form-control" data-placeholder="选择权限" style="width: 100%;height: 34px;">
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info pull-left" data-dismiss="modal" style="background-color: #337ab7">关闭</button>
                    <button type="submit" class="btn btn-info btn-primary" style="background-color: #337ab7">保存</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
