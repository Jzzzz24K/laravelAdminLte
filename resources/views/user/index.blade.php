@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@stop
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
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <form method="get">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_length" id="example1_length">
                                            <button id="addRole" class="dataTables_filter btn btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#modal-create" type="button"><i
                                                    class="fa fa-fw fa-plus"></i>添加管理员
                                            </button>

                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
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
                                                邮箱
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
                                                <td>{{$value['email']}}</td>
                                                <td class="role">
                                                    @foreach($value['role'] as $item)
                                                        <span class="label label-success" data-id="{{$item['id']}}"
                                                              style="font-size: 14px;margin:.2em">{{$item['name']}}</span>
                                                    @endforeach
                                                </td>
                                                <td>{{$value['created_at']}}</td>
                                                <td style="vertical-align: middle">
                                                    <div class="text-center">
                                                        <a type="button" class="edit btn btn-xs btn-warning"
                                                           data-toggle="modal" data-id="{{$value['id']}}"
                                                           data-target="#modal-edit" data-name="{{$value['name']}}"
                                                           data-email="{{$value['email']}}"
                                                        >编辑</a>
                                                        <a type="button" data-name="{{$value['name']}}"
                                                           class="del float-right btn btn-xs btn-danger"
                                                           data-toggle="modal" data-target="#modal-del" data-id="{{$value['id']}}">
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
        @include('user.create')
        @include('user.edit')
        @include('user.delete')
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
        $(".del").click(function () {
            $("#user-name").text($(this).data('name'));
            $(".delete-menu").attr('action','/adminuser/'+ $(this).data('id'));
        });

        $(".edit").click(function () {
            $("#edit-form").attr('action','/adminuser/' + $(this).data('id'));
            $("#name").val($(this).data('name'));
            let role_id = [];
            $(this).parents('td').prevAll('.role').find('span').each(function(){
                role_id.push($(this).data('id'));
            });
            $('#edit_role').val(role_id).select2();
        });
        $('#select2').select2();
    </script>
@stop

