<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="../index.html" class="brand-link">
            <!--begin::Brand Image--> <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span
                class="brand-text fw-light">LMS</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div>
    <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                {{-- <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Products
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Catogories</p>
                            </a> </li>
                        <li class="nav-item"> <a href="" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>ProductList</p>
                            </a> </li>
                        <li class="nav-item"> <a href="" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Brand</p>
                            </a> </li>
                    </ul>
                </li> --}}
                <li class="nav-item"> <a href="{{route('book.list')}}" class="nav-link"> <i
                            class="nav-icon bi bi-palette"></i>
                        <p>Book List</p>
                    </a> </li>
                {{-- <li class="nav-item"> <a href="{{route('add.book')}}" class="nav-link"> <i
                            class="nav-icon bi bi-palette"></i>
                        <p>Add Book</p>
                    </a> </li> --}}
                <li class="nav-item"> <a href="{{route('member.list')}}" class="nav-link"> <i
                            class="nav-icon bi bi-palette"></i>
                        <p>Member List</p>
                    </a> </li>
                <li class="nav-item"> <a href="" class="nav-link"> <i
                            class="nav-icon bi bi-palette"></i>
                        <p>Membership Type</p>
                    </a> </li>
                <li class="nav-item"> <a href="{{route('transaction.list')}}" class="nav-link"> <i
                            class="nav-icon bi bi-palette"></i>
                        <p>Transaction List</p>
                    </a> </li>
                <li class="nav-item"> <a href="{{route('issue.book')}}" class="nav-link"> <i
                            class="nav-icon bi bi-palette"></i>
                        <p>Issue Book </p>
                    </a>
                </li>
                {{-- <li class="nav-item"> <a href="" class="nav-link"> <i
                    class="nav-icon bi bi-palette"></i>
                <p>Log Out</p>
            </a>
        </li> --}}
            </ul>


        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->
