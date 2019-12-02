<div class="modal fade in" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00c0ef">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title" style="color: white;">编辑菜单</h4>
            </div>
            <form class="edit-form menu-form form-horizontal" action="" method="post">
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" class="parentid" name="pid" value="{{$fields['pid']}}">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">父级菜单</label>
                            <div class="col-sm-10">
                                <select id="fname" name="pid" class="form-control select2 edit_select2" style="width: 100%;height: 34px;">
                                    <option value="0" >顶级菜单</option>
                                    @foreach($pmenus as $pmenu)
                                        <option value="{{$pmenu->id}}">{{$pmenu->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">菜单名称</label>
                            <div class="col-sm-10">
                                <input id="name" type="text" name="name" class="form-control" placeholder="名称"
                                       value="{{$fields['name']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">图标</label>
                            <div class="col-sm-10">
                                <small> <a target="_blank" href="/icons">点击查看图标库</a></small>
                                <input id="icon" type="text" name="icon" class="form-control" placeholder="图标"
                                       value="{{$fields['icon']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">链接</label>
                            <div class="col-sm-10">
                                <input id="url" type="text" name="url" class="form-control" placeholder="链接"
                                       value="{{$fields['url']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 text-right" >状态</label>
                            <div class="col-sm-10" id="status">
                                开启:<input type="radio" name="status" class="minimal" value="1" checked>
                                关闭:<input type="radio" name="status" class="minimal" value="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">选择角色</label>
                            <div class="col-sm-10">
                                <select id="edit-select" name="role[]" multiple="multiple" class="form-control"
                                        data-placeholder="选择角色" style="width: 100%;height: 34px;">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-info pull-left" data-dismiss="modal" >关闭</button>
                    <button type="submit" class="btn btn-info btn-primary">保存</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

