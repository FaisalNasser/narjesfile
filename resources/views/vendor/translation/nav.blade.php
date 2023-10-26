<nav class="header">

    {{--<h1 class="text-lg px-6">{{ config('app.name') }}</h1>--}}
    <a href="{{url('admin')}}"><img style="width: 62%" src="{{asset('uploads/logo.png')}}"></a>

    <ul class="flex-grow justify-end pr-2">
        <li>
            <a href="{{ route('languages.index') }}" class="{{ set_active('') }}{{ set_active('/create') }}">
                @include('translation::icons.globe')

                @lang('site.languages')
            </a>
        </li>
        <li>
            <a href="{{ route('languages.translations.index', config('app.locale')) }}" class="{{ set_active('*/translations') }}">
                @include('translation::icons.translate')

                @lang('site.translations')
            </a>
        </li>
    </ul>

</nav>