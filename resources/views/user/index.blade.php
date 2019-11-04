@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            管理员列表
            {{--            <small>advanced tables</small>--}}
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> 系统</li>
            <li>管理员管理</li>
            <li>管理员</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                {{--                    <div class="box-header">--}}
                {{--                        <h3 class="box-title">Data Table With Full Features</h3>--}}
                {{--                    </div>--}}
                <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <form method="get">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <label>ID/用户名:
                                                <input type="search" class="form-control input-sm" placeholder=""
                                                       name="keyword" value="{{$keyword}}" aria-controls="example1">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable"
                                           role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 165px;">ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 203.667px;">
                                                用户名
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 203.667px;">
                                                角色
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 179.667px;">
                                                创建时间
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 99.3333px;">
                                                操作
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user as $value)
                                            <tr role="row">
                                                <td>{{$value['id']}}</td>
                                                <td>{{$value['name']}}</td>
                                                <td></td>
                                                <td>{{$value['created_at']}}</td>
                                                <td style="vertical-align: middle">
                                                    <div class="text-center">
                                                        <a type="button" class="btn btn-xs btn-warning">编辑</a>
                                                        <a type="button" data-name="{{$value['username']}}"
                                                           class="del float-right btn btn-xs btn-danger"
                                                           data-toggle="modal" >
                                                            删除</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example1_info" role="status"
                                         aria-live="polite">
{{--                                        总共 {{$result->total()}} 条--}}
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
{{--                                        {{$result->appends(['keyword'=>$keyword])->links()}}--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-danger fade in" id="modal-danger" style="padding-top: 100px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">危险</h4>
                    </div>
                    <div class="modal-body">
                        <p>确定要删除<kbd><span id="user">file</span></kbd>这个用户吗?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-outline">删除</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </section>
    <!-- /.box-body -->
@stop
@section('script')
    <script>
        // $('#example1').DataTable({
        //     'paging'      : false,
        //     'lengthChange': true,
        //     'searching'   : false,
        //     'ordering'    : false,
        //     'info'        : false,
        //     'autoWidth'   : true,
        //     'scrollX'     : true,
        // });
        $(".del").click(function (e) {
            $("#modal-danger").modal("show");
            $("#user").text($(e.target).data('name'));
        });
    </script>
@stop

