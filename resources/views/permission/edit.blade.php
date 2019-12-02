<div class="modal fade in" id="modal-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #337ab7">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="title menu-title modal-title" style="color: white;">编辑权限</h4>
            </div>
            <form id="edit_form" class="menu-form form-horizontal" action="" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">权限名称</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <input type="text" id="permission_name" name="name" class="form-control" placeholder="名称"
                                           value="{{$fields['name']}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">选择权限</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>所有权限</label>
                                            <select multiple id="editSelectL" class="form-control selectL" style="min-height: 300px;font-size: 12px;padding:0">
                                                @foreach($routes as $route)
                                                    <option>{{$route->routeRule}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" style="margin-top:30%">
                                        <div>
                                            <button type="button" class="toeditright btn btn-primary btn-sm btn-block">=></button>
                                            <button type="button" class="toeditleft btn btn-primary btn-sm btn-block"><=</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>已选权限</label>
                                            <select multiple id="editSelectR" name="routes[]" class="form-control" style="min-height: 300px;font-size: 12px;padding:0">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info pull-left" data-dismiss="modal" style="background-color: #337ab7">关闭</button>
                    <button type="submit" class="btn btn-info btn-primary" style="background-color: #337ab7">保存</button>
                </div>
            </form>

        </div>

    </div>

</div>

