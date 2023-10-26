<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">


<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header-padding">
                <div class="dropdown profile-element"> <span>
                        <a href="#" target="_blank">
                            <img alt="image" width="160" class=""
                                src="{{ asset('uploads/logo.png') }}" /></a> <br>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle side-a" href="#">
                        <span class="clear display-inline-flex"> <span class="block m-t-xs"> <strong
                                    class="font-bold">{{ Auth::user()->name }}</strong>
                            </span> <span class="text-muted text-xs block"><b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('settings/profile') }}">@lang('site.profile')</a></li>

                        <li><a href="{{ url('/logout') }}">@lang('site.logout')</a></li>
                    </ul>
                </div>
                <div class="logo-element">

                </div>
            </li>

            <li @if (Request::segment(1) == 'admin' or Request::segment(1) == 'dashboard') class="active" @endif><a href="{{ url('dashboard') }}"><i
                        class="fa fa-th-large"></i> <span class="nav-label">@lang('site.dashboard')</span></a></li>







            {{-- @if (role_permission(12))
                <li @if (Request::segment(1) == 'expenses') class="active" @endif><a
                        href="{{ url('expenses') }}"><i class="fa fa-shopping-cart"></i> <span
                            class="nav-label">@lang('site.expenses')</span></a></li>
                <li @if (Request::segment(1) == 'online-orders') class="active" @endif><a
                        href="{{ url('online-orders') }}"><i class="fa fa-list"></i> <span
                            class="nav-label">@lang('site.Online_Orders')</span></a></li>
            @endif --}}

            @if (role_permission(1))
                <li @if (
                    (Request::segment(1) == 'orders' or Request::segment(1) == 'sales' or Request::segment(1) == 'debit_orders') and
                        Request::segment(2) == '') class="active" @endif>
                    <a href="#"><i class="fab fa-sellsy"></i> <span class="nav-label">@lang('site.sales')</span>
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        {{-- <li @if (Request::segment(1) == 'sales' and Request::segment(2) == '') class="active" @endif><a
                                href="{{ url('sales') }}">@lang('site.pos_sales')</a></li> --}}
                        <li @if (Request::segment(1) == 'orders') class="active" @endif><a
                                href="{{ url('orders') }}">@lang('site.order_sales')</a></li>

                        <li @if (Request::segment(1) == 'sales' and Request::segment(2) == 'create') class="active" @endif><a
                                href="{{ url('ordersExcelNormalcustomers') }}"><i class=""></i> <span
                                    class="nav-label">@lang('site.excel_customer')</span></a></li>
                        <li @if (Request::segment(1) == 'sales' and Request::segment(2) == 'create') class="active" @endif><a
                                href="{{ url('ordersExcelColoredcustomers') }}"><i class=""></i> <span
                                    class="nav-label">@lang('site.excel_customer2')</span></a></li>

                        {{-- <li @if (Request::segment(1) == 'debit_orders') class="active" @endif><a
                                href="{{ url('debit_orders') }}"> @lang('site.debit_orders') </a></li> --}}

                    </ul>
                </li>



                <!--<li  class="active" ><a href="javascript:void(Tawk_API.toggle())"><i class="fas fa-users"></i>  <span class="nav-label">الدعم التقني</span></a></li>-->
            @endif

            @if (role_permission(8))
                <?php /* <li><a href="{{ url('customers') }}"> <i class="fa fa-users"></i> <span class="nav-label">Customers <span></a></li>
                    <li><a href="{{ url('suppliers') }}"> <i class="fa fa-users"></i> <span class="nav-label">Suppliers <span></a></li> */
                ?>

                <li @if ((Request::segment(1) == 'categories' or Request::segment(1) == 'products') and Request::segment(2) == '') class="active" @endif>
                    <a href="#"><i class="fas fa-poll"></i> <span class="nav-label">@lang('site.products')</span> <span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if (Request::segment(1) == 'categories' and Request::segment(2) == '') class="active" @endif><a
                                href="{{ url('categories') }}">@lang('site.categories')</a></li>
                        <li @if (Request::segment(1) == 'products' and Request::segment(2) == '') class="active" @endif><a
                                href="{{ url('products') }}">@lang('site.products')</a></li>
                        <li @if (Request::segment(1) == 'reviews' and Request::segment(2) == '') class="active" @endif><a
                                href="{{ url('reviews') }}">@lang('site.reviews')</a></li>

                    </ul>
                </li>



                <?php /* <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Inventories</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                       <li><a href="{{ url('inventories/receivings') }}">Receivings</a></li>
                            <li><a href="{{ url('inventories/adjustments') }}">Adjustments</a></li>
                            <li><a href="{{ url('inventories/trackings') }}">Trackings</a></li>

                    </ul>
                </li> */
                ?>
            @endif

            {{-- @if (role_permission(17))


                <li <?php if(Request::segment(1) == "reports") { ?> class="active" ; <?php  } ?>>
                    <a href="#"><i class="fas fa-chart-bar"></i> <span class="nav-label">@lang('site.reporting')</span>
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if (Request::segment(1) == 'reports' and Request::segment(2) == 'staff_sold') class="active"
                            @endif><a
                                href="{{ url('reports/staff_sold') }}">@lang('site.sales_manager_sold')</a>
                        </li>
                        <li @if (Request::segment(1) == 'reports' and Request::segment(2) == 'expensesales')
                            class="active" @endif><a
                                href="{{ url('reports/expensesales') }}">@lang('menu.expense_sales')</a>
                        </li>
                        <li @if (Request::segment(1) == 'reports' and Request::segment(2) == 'daily') class="active"
                            @endif><a
                                href="{{ url('reports/daily') }}">@lang('site.daily')</a>
                        </li>
                        <!--<li @if (Request::segment(1) == 'reports' and Request::segment(2) == 'sales') class="active" @endif><a href="{{ url('reports/sales') }}">@lang('site.sales_report')</a></li>-->
                        <li @if (Request::segment(1) == 'reports' and Request::segment(2) == 'sales_by_products')
                            class="active" @endif><a
                                href="{{ url('reports/sales_by_products') }}">@lang('site.product_by_sales')</a>
                        </li>
                        <!--<li @if (Request::segment(1) == 'reports' and Request::segment(2) == 'expenses') class="active" @endif><a href="{{ url('reports/expenses') }}">@lang('site.expense_report')</a></li>-->
                        <li @if (Request::segment(1) == 'reports' and Request::segment(2) == 'staff_log') class="active"
                            @endif><a
                                href="{{ url('reports/staff_log') }}">@lang('site.staff_logs')</a>
                        </li>




                    </ul>
                </li>

            @endif --}}

            @if (role_permission(15))
                <!--<li @if (Request::segment(2) == 'general') class="active" @endif>-->
                <!--               <a href="{{ url('settings/general') }}"><i class="fa fa-gear"></i> <span class="nav-label"> @lang('site.settings')</span></a>-->
                <!--           </li>-->

                <!--<li @if (Request::segment(1) == 'settings' and (Request::segment(2) == 'general' or Request::segment(2) == 'html')) class="active" @endif>
                    <a href="#"><i class="fa fa-gear"></i> <span class="nav-label"> Settings </span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if (Request::segment(1) == 'settings' and Request::segment(2) == 'general') class="active" @endif><a href="{{ url('settings/general') }}">General Setting</a></li>
                        <li @if (Request::segment(1) == 'editor' and Request::segment(2) == 'html') class="active" @endif><a href="{{ url('editor/html') }}">Code Editor</a></li>

                    </ul>
                </li>-->

                <li @if (Request::segment(2) == 'general' or Request::segment(1) == 'printers') class="active" @endif>
                    <a href="#"><i class="fas fa-gear"></i> <span class="nav-label">@lang('site.settings')</span>
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if (Request::segment(2) == 'homepage') class="active" @endif><a
                                href="{{ url('settings/general') }}">@lang('site.settings')</a></li>
                        {{-- <li @if (Request::segment(1) == 'printers') class="active" @endif><a
                                href="{{ url('printers') }}">@lang('site.printers')</a></li> --}}
                    </ul>
                </li>
            @endif




            @if (role_permission(16))
                <li>
                    <a href="#"><i class="fas fa-toolbox"></i> <span class="nav-label">@lang('site.frontend_website')</span>
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if (Request::segment(2) == 'homepage') class="active" @endif><a
                                href="{{ url('settings/homepage') }}">@lang('site.homepage_setting')</a>
                        </li>
                        <li @if (Request::segment(1) == 'sliders') class="active" @endif><a
                                href="{{ url('sliders') }}">@lang('site.sliders')</a></li>
                        <li @if (Request::segment(1) == 'pages') class="active" @endif><a
                                href="{{ url('pages') }}">@lang('site.pages')</a></li>


                    </ul>
                </li>
            @endif

            @if (role_permission(21))
                <li @if (Request::segment(2) == 'profile') class="active" @endif>
                    <a href="{{ url('settings/profile') }}"><i class="fa fa-user"></i> <span class="nav-label">
                            @lang('site.Profile') </span></a>
                </li>
            @endif
            <li>
                <a href="{{ url('newsletter/index') }}"><i class="fa fa-language"></i> <span class="nav-label">
                @lang('site.Subscribers_Emails')    </span></a>
            </li>
            <li>
                <a href="{{ url('contactmessage') }}"><i class="fa fa-language"></i> <span class="nav-label">
                @lang('site.Customers_Messages')  </span></a>
            </li>
            <li>
                <a href="{{ url('translations/view/site') }}"><i class="fa fa-language"></i> <span class="nav-label">
                        @lang('site.languages') </span></a>
            </li>
            <li>
                <a href="{{ url('clear_cache') }}" target="_blank"><i class="fa fa-eye"></i> <span class="nav-label">
                        @lang('site.clear_cash')</span></a>
            </li>
            <li>
                <a href="{{ url('logout') }}"><i class="fas fa-sign-out-alt"></i> <span class="nav-label">
                        @lang('site.logout') </span></a>
            </li>

        </ul>

    </div>
</nav>
