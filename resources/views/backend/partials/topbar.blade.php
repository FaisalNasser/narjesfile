<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            {{-- <form role="search" class="navbar-form-custom" action="javascript:void(0)">
                <div class="form-group">
                    <input type="text" placeholder="@lang('site.search_for_something')" class="form-control" name="top-search" id="top-search">
                </div>
            </form> --}}
        </div>
        <ul class="nav navbar-top-links navbar-right">

            @if (Config::get('app.locale') == 'ar')

                <li>
                    <a href="{{ url('/logout') }}"> <i class="fa fa-sign-out"></i> @lang('site.logout')</a>
                </li>
                <!-- Notifications-->


                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i> <span class="label label-primary noti_number"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts" style="left: 0">
                        <li>
                            <a href="{{ url('orders') }}">
                                <div class="text-center link-block">
                                    @lang('site.you_have') <span class="noti_number"></span> @lang('site.new_orders')

                                    <strong> @lang('site.view') </strong>
                                    <i class="fa fa-angle-right"></i>

                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Notifications-->
                <?php $languages = json_decode(setting_by_key('languages'), true); ?>
                @if (in_array('en', $languages))
                    <li><a href="<?php echo url('localization/en'); ?>">EN</a> </li>
                @endif
                @if (in_array('ar', $languages))
                    <li><a href="<?php echo url('localization/ar'); ?>">AR</a> </li>
                @endif
                @if (in_array('de', $languages))
                    <li><a href="<?php echo url('localization/de'); ?>">De</a> </li>
                @endif
                <li>
                    <a id="btnFullscreen"> <i class="fas fa-expand"></i> </a>
                </li>


                <li>
                    <a href="{{ url('/') }}" target="_blank"> <i class="fa fa-sitemap"></i> @lang('site.visit_site')</a>
                </li>
            @else
                <!-- Notifications-->
                <li>
                    <a href="{{ url('/') }}" target="_blank"> <i class="fa fa-sitemap"></i> @lang('site.visit_site')</a>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i> <span class="label label-primary noti_number"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts" style="left: 0">
                        <li>
                            <a href="{{ url('orders') }}">
                                <div class="text-center link-block">
                                    @lang('site.you_have') <span class="noti_number"></span> @lang('site.new_orders')

                                    <strong> @lang('site.view') </strong>
                                    <i class="fa fa-angle-right"></i>

                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Notifications-->
                <?php $languages = json_decode(setting_by_key('languages'), true); ?>
                @if (in_array('en', $languages))
                    <li><a href="<?php echo url('localization/en'); ?>">EN</a> </li>
                @endif
                @if (in_array('ar', $languages))
                    <li><a href="<?php echo url('localization/ar'); ?>">AR</a> </li>
                @endif
                @if (in_array('tr', $languages))
                    <li><a href="<?php echo url('localization/tr'); ?>">TR</a> </li>
                @endif
                <li>
                    <a id="btnFullscreen"> <i class="fas fa-expand"></i> </a>
                </li>
                <li>
                    <a href="{{ url('/logout') }}"> <i class="fa fa-sign-out"></i> @lang('site.logout')</a>
                </li>
            @endif
        </ul>

    </nav>
</div>
