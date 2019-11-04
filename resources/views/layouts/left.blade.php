<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            @foreach($menus as $menu)
            <li class="treeview">
                <a href="{{$menu->url}}">
                    <i class="fa {{$menu->icon}}"></i> <span>{{$menu->name}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                @if($menu->children)
                    <ul class="treeview-menu">
                        @foreach($menu->children as $children)
                        <li><a href="{{$children->url}}" target="mainiframe"><i class="fa {{$children->icon}}"></i>{{$children->name}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
            @endforeach

            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
