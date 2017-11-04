<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->full_name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- search form (Optional) -->
        {{ Form::open(['route' => 'admin.search.index', 'method' => 'get', 'class' => 'sidebar-form']) }}
        <div class="input-group">
            {{ Form::text('q', Request::get('q'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('strings.backend.general.search_placeholder')]) }}

            <span class="input-group-btn">
                <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span><!--input-group-btn-->
        </div><!--input-group-->
    {{ Form::close() }}
    <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
                </a>
            </li>
{{--================================================================================================================--}}

            <li class="{{ active_class(Active::checkUriPattern('admin/customers')) }}">
                <a href="{{ route('admin.customers.index') }}">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Customers</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/sales')) }}">
                <a href="{{ route('admin.sales.index') }}">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                    <span>Sales</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/products')) }}">
                <a href="{{ route('admin.products.index')}}">
                    <i class="fa fa-cubes" aria-hidden="true"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/suppliers')) }}">
                <a href="{{ route('admin.suppliers.index') }}">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    <span>Suppliers</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/sellings')) }}">
                <a href="{{ route('admin.sellings.index') }}">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                    <span>Order Product</span>
                    <span class="badge pull-right">{{ Cart::count() }}</span>
                </a>
            </li>
{{--================================================================================================================--}}
            <li class="{{ active_class(Active::checkUriPattern('admin/configurations/*')) }} treeview">
                <a href="#">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span>Configuration</span>
                    <i class="fa fa-angle-left pull-right"></i>

                    @if ($pending_approval > 0)
                        <span class="label label-danger pull-right">{{ $pending_approval }}</span>
                    @else
                        <i class="fa fa-angle-left pull-right"></i>
                    @endif
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/configurations/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/configurations/*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/configurations/brands*')) }}">
                        <a href="{{ route('admin.brands.index') }}">
                            <i class="fa fa-star-o"></i>
                            <span>Brand</span>

                            @if ($pending_approval > 0)
                                <span class="label label-danger pull-right">{{ $pending_approval }}</span>
                            @endif
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/configurations/categories*')) }}">
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>Category</span>

                            @if ($pending_approval > 0)
                                <span class="label label-danger pull-right">{{ $pending_approval }}</span>
                            @endif
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/configurations/groups*')) }}">
                        <a href="{{ route('admin.groups.index') }}">
                            <i class="fa fa-tasks"></i>
                            <span>Group</span>
                        </a>
                    </li>

                </ul>
            </li>
{{--================================================================================================================--}}
            <li class="header">{{ trans('menus.backend.sidebar.system') }}</li>
            @role(1)
            <li class="{{ active_class(Active::checkUriPattern('admin/access/*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>{{ trans('menus.backend.access.title') }}</span>

                    @if ($pending_approval > 0)
                        <span class="label label-danger pull-right">{{ $pending_approval }}</span>
                    @else
                        <i class="fa fa-angle-left pull-right"></i>
                    @endif
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/access/*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/access/user*')) }}">
                        <a href="{{ route('admin.access.user.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('labels.backend.access.users.management') }}</span>

                            @if ($pending_approval > 0)
                                <span class="label label-danger pull-right">{{ $pending_approval }}</span>
                            @endif
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/access/role*')) }}">
                        <a href="{{ route('admin.access.role.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('labels.backend.access.roles.management') }}</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endauth

            <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer*')) }} treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer')) }}">
                        <a href="{{ route('log-viewer::dashboard') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer/logs')) }}">
                        <a href="{{ route('log-viewer::logs.list') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.logs') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>