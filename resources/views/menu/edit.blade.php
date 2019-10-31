<div class="modal fade in" id="modal-edit" style="padding-top: 100px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00c0ef">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title" style="color: white;">编辑菜单</h4>
            </div>
            <form class="menu-form form-horizontal" action="" method="post">
                <input type="hidden" name="_method" value="PUT">
                @include('menu.form')
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

