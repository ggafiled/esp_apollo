<li class="nav-item">
    <select class="selectpicker" data-width="fit" onchange="changeLang(value);">
        <option data-content='<div><span class="flag-icon flag-icon-us"></span> <span class="d-none d-lg-inline d-md-inline">English</span></div>' value="en" @if(App::isLocale('en'))
            selected="selected" @endif>English</option>
        <option data-content='<div><span class="flag-icon flag-icon-th"></span> <span class="d-none d-lg-inline d-md-inline">Thai</span></div>' value="th" @if(App::isLocale('th'))
            selected="selected" @endif>Thai</option>
    </select>
</li>
