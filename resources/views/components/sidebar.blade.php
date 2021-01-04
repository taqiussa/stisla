@php
$links = [
    // [
    //     "href" => "dashboard",
    //     "header_text" => "Dashboard",
    //     "text" => "Dashboard",
    //     "icon" => "fas fa-fire",
    //     "is_multi" => false,
    // ],
    [
        "list" =>[
            [
                "text" => "Dashboar",
                "icon" => "fas fa-fire",
                "href" => "dashboard",
                "is_dropdown" => false,
            ],
        ],  
        "header_text" => "Dashboard",
        "is_multi" => false,
    ],
    [
        "href" => [
            [
                "section_text" => "User",
                "section_icon" => "fas fa-user",
                "section_list" => [
                    ["href" => "user", "text" => "Data User"],
                    ["href" => "user.new", "text" => "Buat User"]
                ]
            ]
        ],
        "header_text" => "Admin User",
        "is_multi" => true,
    ],
    [
        "list" => [
            [
                "section_list" => [
                    ["href" => "pemasukan", "text" => "Pemasukan"],
                    ["href" => "user.new", "text" => "Pengeluaran"]
                ],
                "text" => "Transaksi",
                "icon" => "fas fa-plus-square",
                "is_dropdown" => true,
            ],
            [
                "text" => "Pegawai",
                "icon" => "fas fa-users",
                "href" => "pegawai",
                "is_dropdown" => false,
            ],
            [
                "text" => "Keterangan",
                "icon" => "fas fa-tags",
                "href" => "keterangan",
                "is_dropdown" => false,
            ]
        ],
        "header_text" => "Fiter Barber",
        "is_multi" => false,
        
    ],
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->header_text }}</li>
            @if (!$link->is_multi)
                @foreach ($link->list as $item)
                    @if (!$item->is_dropdown)
                        <li class="{{ Request::routeIs($item->href) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route($item->href) }}"><i class="{{ $item->icon }}"></i><span>{{ $item->text }}</span></a>
                        </li>
                    @else
                        <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $item->icon }}"></i> <span>{{ $item->text }}</span></a>
                            <ul class="dropdown-menu">
                                @foreach ($item->section_list as $child)
                                    <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $section->section_icon }}"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
