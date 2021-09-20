<li @isset($item['id']) id="{{ $item['id'] }}" @endisset class="nav-item">

    <router-link class="nav-link"
       to="{{ $item['url'] }}"
        @isset($item['active_url'])
        v-active-when="{{ $item['active_url'] }}"
        @endisset {{-- v-active-when ทำเพิ่มเอง --}}
       @isset($item['target']) target="{{ $item['target'] }}" @endisset
       {!! $item['data-compiled'] ?? '' !!}>

        <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{
            isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''
        }}"></i>

        <p>
            {{ $item['text'] }}

            @isset($item['label'])
                <span class="badge badge-{{ $item['label_color'] ?? 'primary' }} right">
                    {{ $item['label'] }}
                </span>
            @endisset
        </p>

    </router-link>

</li>
