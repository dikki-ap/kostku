<!-- Start of Sidebar -->
<div class="col-sm-4 col-md-3 col-lg-2">
    <div class="row">
        <div class="col d-flex justify-content-center p-4">
            <img src="/img/logo.png" alt="KostKu Logo" width="75" class="img-fluid" />
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button class="navbar-toggler p-3 d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-filter-left me-2"></i>
            </button>
        </div>
    </div>

    <hr />
    <div class="row" id="sidebarMenu">
        <div class="d-flex flex-column">
            {{-- Home --}}
            <div class="p-2">
                <button class="btn btn-toggle rounded">
                    <a href="/dashboard" class="sideBar-link" id="{{ Request::is('dashboard') ? 'sideBarHome' : '' }}">
                        <span data-feather="monitor"></span>&nbsp; Dashboard
                    </a>
                </button>
            </div>
        
            {{-- Kost --}}
            <ul class="list-unstyled p-2">
                <li>
                    <button id="btnSideBar-Personnel" class="btn btn-toggle mt-3 align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#personnel-collapse" aria-expanded="true">
                        <span data-feather="home"></span>&nbsp; Kost &nbsp;<i class="bi bi-caret-down-fill me-3"></i></span>
                    </button>
                    <div class="{{ Request::is('dashboard/*') ? '' : 'collapse' }}" id="personnel-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal small">
                            <li>
                                <a href="/dashboard/kosts" class="link-dark rounded" id="{{ Request::is('dashboard/kosts*') ? 'sideBar-KList' : '' }}">
                                    <span data-feather="list"></span>&nbsp; Kost List
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/categories" class="link-dark rounded" id="{{ Request::is('dashboard/categories*') ? 'sideBar-KCategory' : '' }}">
                                    <span data-feather="grid"></span>&nbsp; Kost Categories
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/galleries" class="link-dark rounded" id="{{ Request::is('dashboard/galleries*') ? 'sideBar-KGallery' : '' }}">
                                    <span data-feather="image"></span>&nbsp; Kost Galleries
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            {{-- Logout --}}
            <div class="p-2">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="sideBar-link rounded border-0" id="sideBar-Logout" style="background-color: white"><span data-feather="log-out"></span>&nbsp; Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Sidebar -->