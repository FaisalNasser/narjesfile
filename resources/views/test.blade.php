@php
$id = $id ?? 59;
@endphp
<div class="header-bottom hidden-sm hidden-xs cat-header" style="background: #f9f9fa; top: 11px;">
    <div class="container">
        <div class="responsive so-megamenu megamenu-style-dev">
            <nav class="navbar-default">
                <ul class="megamenu category-image text-center" style="width:50%">

                    @foreach ($categoriesMenuData as $key => $datas)
                        <li class="item-vertical vertical-style2 with-sub-menu hover">
                            <p class="close-menu"></p>
                            <a
                                href="{{ route('home-page', ['category_seo_name' => $datas->SeoName($datas->translateOrFirst(app()->getLocale())->title), 'category_id' => $datas->id]) }}">
                                <h2 class="{{ strlen($datas->translateOrFirst(app()->getLocale())->title) <= 15 || $datas->id == 4 || ($loop->last && $turkey_branch) ? '' : 'sentence' }}"
                                    style="{{ strlen($datas->translateOrFirst(app()->getLocale())->title) <= 25 || $datas->id == 4 || ($loop->last && $turkey_branch) ? 'line-height:30px' : '' }}">
                                    <strong id="strong-title">{!! $datas->translateOrFirst(app()->getLocale())->title !!}</strong>
                                    <span class="label"></span>
                                </h2>
                            </a>

                        </li>
                    @endforeach


                    <div class="background-under-drop-down"></div>
                </ul>
                <ul class="megamenu category-image text-center" >
                    @foreach ($categoriesMenuData as $key => $datas)
                        @php
                            $ChildsCategories = $datas->ChildsCategories->sortByDesc(function ($q) {
                                return $q->ChildsCategories->count();
                            });
                        @endphp
                        @if ($datas->id == $id)
                            @foreach ($ChildsCategories->chunk(4) as $index => $chunks)
                                @foreach ($chunks as $sub)
                                @if ($sub->ChildsCategories->isNotEmpty())
                                    <li class="item-vertical vertical-style2 with-sub-menu hover">
                                        <p class="close-menu"></p>
                                        <a
                                            href="{{ route('home-page', ['category_seo_name' => $datas->SeoName($datas->translateOrFirst(app()->getLocale())->title), 'category_id' => $datas->id]) }}">
                                            <h2 class="{{ strlen($datas->translateOrFirst(app()->getLocale())->title) <= 15 || $datas->id == 4 || ($loop->last && $turkey_branch) ? '' : 'sentence' }}"
                                                style="{{ strlen($datas->translateOrFirst(app()->getLocale())->title) <= 25 || $datas->id == 4 || ($loop->last && $turkey_branch) ? 'line-height:30px' : '' }}">
                                                <strong id="strong-title">{!! $sub->translateOrFirst(app()->getLocale())->title !!}</strong>
                                                <span class="label"></span>
                                            </h2>
                                        </a>
                                        <div class="sub-menu col-lg-12 {{ app()->getLocale() == 'ar' ? '.changeside' : '.dontchange' }}"
                                            style="font-size: large !important; font-weight:900; color:#000;top: 35px;"
                                            data-subwidth="100">
                                            <div class="content"
                                                style="padding-top:0px; padding-top: 0px;z-index: 999;border-left-bottom-radius: 18px;border-right-bottom-radius: 18px;">
                                                <div class="row">
                                                    <div class="col-sm-12 v-borders" style="padding: 28px;">
                                                        <div class="html item-1">
                                                                @foreach ($sub->ChildsCategories as $key_d => $sub2)
                                                                    <h5><a
                                                                            href="{{ route('filter', ['category_seo_name' => $sub2->SeoName($sub2->translateOrFirst(app()->getLocale())->title), 'category_id' => $sub2->id]) }}">{!! $sub2->translateOrFirst(app()->getLocale())->title !!}</a>
                                                                        </h4>
                                                                @endforeach
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    @endforeach

                </ul>
            </nav>
        </div>
    </div>
</div>
