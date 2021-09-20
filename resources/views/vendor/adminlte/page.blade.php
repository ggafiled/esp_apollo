@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if($layoutHelper->isLayoutTopnavEnabled())
@php( $def_container_class = 'container' )
@else
@php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
@stack('css')
@yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
<div class="wrapper" id="app">

    {{-- Top Navbar --}}
    @if($layoutHelper->isLayoutTopnavEnabled())
    @include('adminlte::partials.navbar.navbar-layout-topnav')
    @else
    @include('adminlte::partials.navbar.navbar')
    @endif

    {{-- Left Main Sidebar --}}
    @if(!$layoutHelper->isLayoutTopnavEnabled())
    @include('adminlte::partials.sidebar.left-sidebar')
    @endif

    {{-- Content Wrapper --}}
    <div class="content-wrapper pt-3 {{ config('adminlte.classes_content_wrapper') ?? '' }}">

        {{-- Main Content --}}
        <div class="content">
            <app-view></app-view>
        </div>

    </div>

    {{-- Footer --}}
    @hasSection('footer')
    @include('adminlte::partials.footer.footer')
    @endif

    {{-- Right Control Sidebar --}}
    @if(config('adminlte.right_sidebar'))
    @include('adminlte::partials.sidebar.right-sidebar')
    @endif

</div>
@stop

@section('adminlte_js')
@stack('js')
@yield('js')
<script>
    var options = {
        minimizeIcon: 'fa-compress-arrows-alt',
        maximizeIcon: 'fa-expand-arrows-alt',
        autoCollapseSize: 992,
        enableRemember: false,
        noTransitionAfterReload: true
    };

    function changeLang(value) {
        axios({
            method: 'post',
            url: 'locale/' + value,
            baseURL: window.location.protocol + "//" + window.location.host,
        }).then(async function (error) {
            await window.location.reload();
        });
        // axios.post({ url: 'locale/' + value, baseURL: window.location.host }).then(async function (error) {
        //     await window.location.reload();
        // });
    }

    $(function () {
        $('.selectpicker').selectpicker();
        $('.dropdown-toggle').dropdown();
    });

    function windowed() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
        $('[data-widget="fullscreen"] i').removeClass(options.minimizeIcon).addClass(options.maximizeIcon);
    }

    function fullscreen() {
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen();
        } else if (document.documentElement.msRequestFullscreen) {
            document.documentElement.msRequestFullscreen();
        }

        if ($('body').hasClass('sidebar-collapse')) {
            $('body').removeClass('sidebar-collapse')
            $('body').addClass('sidebar-collapse')
        } else {
            $('body').addClass('sidebar-collapse')
        }
        $('[data-widget="fullscreen"] i').removeClass(options.maximizeIcon).addClass(options.minimizeIcon);
    }

    function searchOpen() {
        $(".navbar-search-block").css('display', 'flex').hide().fadeIn().addClass("navbar-search-open");
        $(".navbar-search-block input").focus();
    }

    function searchClose() {
        $(".navbar-search-block").fadeOut()
        $(".navbar-search-block").removeClass("navbar-search-open");
        $(".navbar-search-block input").val('');
    }

    $("#fullscreen").on("click", function (e) {
        e.preventDefault();
        if (document.fullscreenElement || document.mozFullScreenElement || document
            .webkitFullscreenElement ||
            document
            .msFullscreenElement) {
            windowed();
        } else {
            fullscreen();
        }
    });

    $("#navbar-search").on("click", function (e) {
        e.preventDefault();
        if ($(".navbar-search-block").parent().hasClass("navbar-search-open")) {
            searchClose();
        } else {
            searchOpen();
        }
    });

    $("#navbar-search-close").on("click", function (e) {
        searchClose();
    });

</script>
@stop
