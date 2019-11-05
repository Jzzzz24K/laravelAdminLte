<div class="modal-body">
    <!-- /.box-header -->
    <!-- form start -->
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">权限名称</label>
            <div class="col-sm-10">
                <div class="row">
                    <input type="text" name="name" class="permission_name form-control" placeholder="名称"
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
                            <select multiple class="form-control selectL" style="min-height: 300px;font-size: 12px;padding:0">
                                @foreach($routes as $route)
                                <option>{{$route->routeRule}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2" style="margin-top:30%">
                            <div>
                                <button type="button" class="toright btn btn-primary btn-sm btn-block">=></button>
                                <button type="button" class="toleft btn btn-primary btn-sm btn-block"><=</button>
                            </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>已选权限</label>
                            <select multiple name="routes[]" class="form-control selectR" style="min-height: 300px;font-size: 12px;padding:0">

                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.box-body -->
</div>


