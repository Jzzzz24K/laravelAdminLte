<div class="modal modal-danger fade" id="modal-del">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">删除</h4>
            </div>
            <form class="delete-menu" action= "" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="DELETE">
                <div class="modal-body">
                    <p>确定要删除<kbd><span id="menu-name">测试</span></kbd>这个菜单吗?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-outline">删除</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

