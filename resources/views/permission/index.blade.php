@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            权限管理
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> 系统设置</li>
            <li>权限管理</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="example1_length">
                                        <button class="dataTables_filter btn btn-primary"
                                                data-toggle="modal"
                                                data-target="#modal-create" type="button"><i
                                                class="fa fa-fw fa-plus"></i>添加权限
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @include('partials.error')
                            @include('partials.success')
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
                                                权限名
                                            </th>

                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 179.667px;">
                                                路由
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 99.3333px;">
                                                创建时间
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 99.3333px;">
                                                更新时间
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
                                            @foreach($permission as $value)
                                                <tr role="row">
                                                    <td>{{$value->id}}</td>
                                                    <td>{{$value->name}}</td>
                                                    <td>
                                                        @foreach($value->routes as $route)
                                                            <div>
                                                                <span class="label label-success">{{$route}}</span>
                                                            </div>
                                                         @endforeach
                                                    </td>
                                                    <td>{{$value->created_at}}</td>
                                                    <td>{{$value->updated_at}}</td>
                                                    <td style="vertical-align: middle">
                                                        <div class="text-center">
                                                            <a type="button" class="btn btn-xs btn-warning">编辑</a>
                                                            <a type="button" data-name="{{$value->id}}"
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
                @include('permission.create')
                @include('permission.edit')
                @include('permission.delete')
    </section>
    <!-- /.box-body -->
@stop
@section('scripts')
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
        // $('#addRole').click(function () {
        //     $("#modal-create").show();
        // });

        // $(".del").click(function (e) {
        //     $("#modal-danger").modal("show");
        //     $("#user").text($(e.target).data('name'));
        // });

        var leftSel =$('#selectL');
        var rightSel =$('#selectR');
        $('#toright').bind('click',function(){
            leftSel.find("option:selected").each(function(){
                $(this).remove().appendTo(rightSel);
            });
        });
        $('#toleft').bind('click',function(){
            rightSel.find("option:selected").each(function(){
                $(this).remove().appendTo(leftSel);
            });
        })

    </script>
@stop

