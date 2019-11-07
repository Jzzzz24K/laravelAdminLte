@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@stop
@section('content')
    <section class="content-header">
        <h1>
            角色管理
            {{--            <small>advanced tables</small>--}}
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> 系统设置</li>
            <li>角色管理</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <form method="get">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_length" id="example1_length">
                                            <button id="addRole" class="dataTables_filter btn btn-primary" data-toggle="modal"
                                                    data-target="#modal-create" type="button"><i class="fa fa-fw fa-plus"></i>添加角色</button>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <label>ID/用户名:
                                                <input type="search" class="form-control input-sm" placeholder=""
                                                       name="keyword" value="{{$keyword}}" aria-controls="example1">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                                style="width: 165px;">角色名称
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 203.667px;">
                                                角色描述
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 203.667px;">
                                                拥有权限
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
                                        @foreach($result as $value)
                                            <tr role="row">
                                                <td>{{$value['name']}}</td>
                                                <td>{{$value['description']}}</td>
                                                <td class="permission">
                                                @foreach($value['permission'] as $permission)
                                                    <span class="label label-success" data-id="{{$permission['id']}}" style="font-size: 14px;margin:.2em">{{$permission['name']}}</span>
                                                @endforeach
                                                </td>
                                                <td>{{$value['created_at']}}</td>
                                                <td style="vertical-align: middle">
                                                    <div class="text-center">
                                                        <a type="button" data-id="{{$value['id']}}"
                                                           data-name="{{$value['name']}}" data-description="{{$value['description']}}"
                                                           class="edit btn btn-xs btn-warning">编辑</a>
                                                        <a type="button" data-name="{{$value['name']}}"
                                                           data-id="{{$value['id']}}"
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
        @include('role.create')
        @include('role.edit')
        @include('role.delete')
    </section>
    <!-- /.box-body -->
@stop
@section('scripts')
    <script src="{{asset('js/select2.full.js')}}"></script>
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
        $(function(){
            $('#addRole').click(function(){
                $("#modal-create").show();
            });

            $(".del").click(function (e) {
                $("#modal-del").modal("show");
                $("#menu-name").text($(e.target).data('name'));
                $('.delete-menu').attr('action','/role/'+ $(e.target).data('id'));
            });

            $(".edit").click(function(){
                $("#modal-edit").modal("show");
                $('#description').val($(this).data('description'));
                $('#name').val($(this).data('name'));
                $('#edit-form').attr('action','/role/'+ $(this).data('id'));
                let permission_id = [];
                $(this).parents('td').prevAll('.permission').find('span').each(function(){
                    permission_id.push($(this).data('id'));
                });
                $("#permission_id").val(permission_id).select2()
            });

            $('#select2').select2();
        })

    </script>
@stop

