<!-- Horizontal Menu Start -->
<header class="topnav">
    <nav class="navbar navbar-expand-lg">
        <nav class="page-container">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-dashboards" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="menu-icon"><i data-lucide="airplay"></i></span>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboards">
                            <a href="{{ route ('any', 'index') }}" class="dropdown-item">Dashboard 1</a>
                            <a href="{{ route ('any' ,'dashboard-2' ) }}" class="dropdown-item">Dashboard 2</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="menu-icon"><i data-lucide="briefcase"></i></span>
                            <span class="menu-text">Admin UI</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-apps">
                            <a href="{{ route ('second' , ['apps','calendar']) }}" class="dropdown-item">Calendar</a>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Email
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="{{ route ('second' , ['apps','email-inbox']) }}" class="dropdown-item">Inbox</a>
                                    <a href="{{ route ('second' , ['apps','email-read']) }}" class="dropdown-item">Read Email</a>
                                    <a href="{{ route ('second' , ['apps','email-compose']) }}" class="dropdown-item">Email Compose</a>
                                </div>
                            </div>
                            <a href="{{ route ('second' , ['apps','tickets']) }}" class="dropdown-item">Tickets</a>
                            <a href="{{ route ('second' , ['apps','taskboard']) }}" class="dropdown-item">Taskboard</a>
                            <a href="{{ route ('second' , ['apps','todo']) }}" class="dropdown-item">Todo</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-pages" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="menu-icon"><i data-lucide="file-plus"></i></span>
                            <span class="menu-text">Extra Pages</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-auth" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Authentication <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                    <a href="{{ route ('third' , ['extra-pages','auth','login']) }}" class="dropdown-item">Login</a>
                                    <a href="{{ route ('third' , ['extra-pages','auth','register']) }}" class="dropdown-item">Register</a>
                                    <a href="{{ route ('third' , ['extra-pages','auth','recoverpw']) }}" class="dropdown-item">Recover Password</a>
                                    <a href="auth-{{ route ('third' , ['extra-pages','auth','lock-screen']) }}" class="dropdown-item">Lock Screen</a>
                                    <a href="{{ route ('third' , ['extra-pages','auth','confirm-mail']) }}" class="dropdown-item">Confirm Mail</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-error" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Error <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-error">
                                    <a href="{{ route ('second' , ['error','404']) }}" class="dropdown-item">Error 404</a>
                                    <a href="{{ route ('second' , ['error','404-alt']) }}" class="dropdown-item">Error 404-alt</a>
                                    <a href="{{ route ('second' , ['error','500']) }}" class="dropdown-item">Error 500</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-page" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pages <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg" aria-labelledby="topnav-page">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a href="{{ route ('second' , ['pages','starter']) }}" class="dropdown-item">Starter Page</a>
                                            <a href="{{ route ('second' , ['pages','about']) }}" class="dropdown-item">About Us</a>
                                            <a href="{{ route ('second' , ['pages','contact']) }}" class="dropdown-item">Contact</a>
                                            <a href="{{ route ('second' , ['pages','companies']) }}" class="dropdown-item">Companies</a>
                                            <a href="{{ route ('second' , ['pages','members']) }}" class="dropdown-item">Members</a>
                                            <a href="{{ route ('second' , ['pages','members-2']) }}" class="dropdown-item">Members 2</a>
                                            <a href="{{ route ('second' , ['pages','timeline']) }}" class="dropdown-item">Timeline</a>
                                            <a href="{{ route ('second' , ['pages','invoice']) }}" class="dropdown-item">Invoice</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="{{ route ('second' , ['pages','pricing']) }}" class="dropdown-item">Pricing</a>
                                            <a href="{{ route ('second' , ['pages','faq']) }}" class="dropdown-item">FAQ</a>
                                            <a href="{{ route ('second' , ['pages','profile']) }}" class="dropdown-item">Profile</a>
                                            <a href="{{ route ('second' , ['pages','email-template']) }}" class="dropdown-item">Email Template</a>
                                            <a href="{{ route ('second' , ['pages','search-result']) }}" class="dropdown-item">Search Result</a>
                                            <a href="{{ route ('second' , ['pages','sitemap']) }}" class="dropdown-item">Sitemap</a>
                                            <a href="{{ route ('second' , ['pages','maintenance']) }}" class="dropdown-item">Maintenance</a>
                                            <a href="{{ route ('second' , ['pages','coming-soon']) }}" class="dropdown-item">Coming Soon</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-pages" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="menu-icon"><i data-lucide="box"></i></span>
                            <span class="menu-text">Components</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-ui-kit" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Base UI
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-xl" aria-labelledby="topnav-ui-kit">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <a href="{{ route ('second' , ['base-ui','accordions']) }}" class="dropdown-item">Accordions</a>
                                            <a href="{{ route ('second' , ['base-ui','alerts']) }}" class="dropdown-item">Alerts</a>
                                            <a href="{{ route ('second' , ['base-ui','avatars']) }}" class="dropdown-item">Avatars</a>
                                            <a href="{{ route ('second' , ['base-ui','badges']) }}" class="dropdown-item">Badges</a>
                                            <a href="{{ route ('second' , ['base-ui','breadcrumb']) }}" class="dropdown-item">Breadcrumb</a>
                                            <a href="{{ route ('second' , ['base-ui','buttons']) }}" class="dropdown-item">Buttons</a>
                                            <a href="{{ route ('second' , ['base-ui','cards']) }}" class="dropdown-item">Cards</a>
                                            <a href="{{ route ('second' , ['base-ui','carousel']) }}" class="dropdown-item">Carousel</a>
                                            <a href="{{ route ('second' , ['base-ui','collapse']) }}" class="dropdown-item">Collapse</a>
                                            <a href="{{ route ('second' , ['base-ui','checkbox-radio']) }}" class="dropdown-item">Checkbox Radio</a>
                                            <a href="{{ route ('second' , ['base-ui','dropdowns']) }}" class="dropdown-item">Dropdowns</a>
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="{{ route ('second' , ['base-ui','grid']) }}" class="dropdown-item">Grid</a>
                                            <a href="{{ route ('second' , ['base-ui','links']) }}" class="dropdown-item">Links</a>
                                            <a href="{{ route ('second' , ['base-ui','list-group']) }}" class="dropdown-item">List Group</a>
                                            <a href="{{ route ('second' , ['base-ui','modals']) }}" class="dropdown-item">Modals</a>
                                            <a href="{{ route ('second' , ['base-ui','notifications']) }}" class="dropdown-item">Notifications</a>
                                            <a href="{{ route ('second' , ['base-ui','offcanvas']) }}" class="dropdown-item">Offcanvas</a>
                                            <a href="{{ route ('second' , ['base-ui','placeholders']) }}" class="dropdown-item">Placeholders</a>
                                            <a href="{{ route ('second' , ['base-ui','pagination']) }}" class="dropdown-item">Pagination</a>
                                            <a href="{{ route ('second' , ['base-ui','popovers']) }}" class="dropdown-item">Popovers</a>
                                            <a href="{{ route ('second' , ['base-ui','progress']) }}" class="dropdown-item">Progress</a>
                                            <a href="{{ route ('second' , ['base-ui','portlets']) }}" class="dropdown-item">Portlets</a>

                                        </div>
                                        <div class="col-lg-4">
                                            <a href="{{ route ('second' , ['base-ui','ratios']) }}" class="dropdown-item">Ratios</a>
                                            <a href="{{ route ('second' , ['base-ui','ribbons']) }}" class="dropdown-item">Ribbons</a>
                                            <a href="{{ route ('second' , ['base-ui','scrollspy']) }}" class="dropdown-item">Scrollspy</a>
                                            <a href="{{ route ('second' , ['base-ui','spinners']) }}" class="dropdown-item">Spinners</a>
                                            <a href="{{ route ('second' , ['base-ui','tabs']) }}" class="dropdown-item">Tabs</a>
                                            <a href="{{ route ('second' , ['base-ui','tooltips']) }}" class="dropdown-item">Tooltips</a>
                                            <a href="{{ route ('second' , ['base-ui','typography']) }}" class="dropdown-item">Typography</a>
                                            <a href="{{ route ('second' , ['base-ui','utilities']) }}" class="dropdown-item">Utilities</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-extended-ui" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Extended UI
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-extended-ui">
                                    <a href="{{ route ('second' , ['extended-ui','dragula']) }}" class="dropdown-item">Dragula</a>
                                    <a href="{{ route ('second' , ['extended-ui','sweetalerts']) }}" class="dropdown-item">Sweetalerts</a>
                                    <a href="{{ route ('second' , ['extended-ui','tiles']) }}" class="dropdown-item">Tiles</a>
                                    <a href="{{ route ('second' , ['extended-ui','nestable']) }}" class="dropdown-item">Nestable</a>
                                    <a href="{{ route ('second' , ['extended-ui','filemanager']) }}" class="dropdown-item">Filemanager</a>
                                    <a href="{{ route ('second' , ['extended-ui','range-sliders']) }}" class="dropdown-item">Range Slider</a>
                                    <a href="{{ route ('second' , ['extended-ui','ratings']) }}" class="dropdown-item">Ratings</a>
                                    <a href="{{ route ('second' , ['extended-ui','lightbox']) }}" class="dropdown-item">Lightbox</a>
                                    <a href="{{ route ('second' , ['extended-ui','slider']) }}" class="dropdown-item">Slider</a>
                                    <a href="{{ route ('second' , ['extended-ui','scrollbar']) }}" class="dropdown-item">Scrollbar</a>
                                    <a href="{{ route ('second' , ['extended-ui','tost']) }}" class="dropdown-item">Tosts</a>
                                    <a href="{{ route ('second' , ['extended-ui','tour']) }}" class="dropdown-item">Tour</a>
                                    <a href="{{ route ('second' , ['extended-ui','treeview']) }}" class="dropdown-item">Treeview</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-icons" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Icons
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-icons">
                                    <a href="{{ route ('second' , ['icons','materialdesign']) }}" class="dropdown-item">Material Design</a>
                                    <a href="{{ route ('second' , ['icons','fontawesome']) }}" class="dropdown-item">Font awesome</a>
                                    <a href="{{ route ('second' , ['icons','simple-line']) }}" class="dropdown-item">Simple Line</a>
                                    <a href="{{ route ('second' , ['icons','tabler']) }}" class="dropdown-item">Tabler Icons</a>
                                    <a href="{{ route ('second' , ['icons','lucide']) }}" class="dropdown-item">Lucide</a>
                                    <a href="{{ route ('second' , ['icons','iconify']) }}" class="dropdown-item">Solar Design</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-charts" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Charts
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                    <a href="{{ route ('second' , ['charts','morris']) }}" class="dropdown-item">Morris Chart</a>
                                    <a href="{{ route ('second' , ['charts','google']) }}" class="dropdown-item">Google Chart</a>
                                    <a href="{{ route ('second' , ['charts','echart']) }}" class="dropdown-item">Echart</a>
                                    <a href="{{ route ('second' , ['charts','chartjs']) }}" class="dropdown-item">Chartjs</a>
                                    <a href="{{ route ('second' , ['charts','peity']) }}" class="dropdown-item">Peity Chart</a>
                                    <a href="{{ route ('second' , ['charts','chartist']) }}" class="dropdown-item">Chartist Chart</a>
                                    <a href="{{ route ('second' , ['charts','c3']) }}" class="dropdown-item">C3 Chart</a>
                                    <a href="{{ route ('second' , ['charts','sparkline']) }}" class="dropdown-item">Sparklines Chart</a>
                                    <a href="{{ route ('second' , ['charts','knob']) }}" class="dropdown-item">Jquery Knob</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-forms" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Forms
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-forms">
                                    <a href="{{ route ('second' , ['forms','elements']) }}" class="dropdown-item">Basic Elements</a>
                                    <a href="{{ route ('second' , ['forms','advanced']) }}" class="dropdown-item">Form Advanced</a>
                                    <a href="{{ route ('second' , ['forms','masks']) }}" class="dropdown-item">Form Masks</a>
                                    <a href="{{ route ('second' , ['forms','picker']) }}" class="dropdown-item">Picker</a>
                                    <a href="{{ route ('second' , ['forms','select']) }}" class="dropdown-item">Select</a>
                                    <a href="{{ route ('second' , ['forms','range-slider']) }}" class="dropdown-item">Range Slider</a>
                                    <a href="{{ route ('second' , ['forms','validation']) }}" class="dropdown-item">Validation</a>
                                    <a href="{{ route ('second' , ['forms','wizard']) }}" class="dropdown-item">Wizard</a>
                                    <a href="{{ route ('second' , ['forms','fileuploads']) }}" class="dropdown-item">File Uploads</a>
                                    <a href="{{ route ('second' , ['forms','editors']) }}" class="dropdown-item">Editors</a>
                                    <a href="{{ route ('second' , ['forms','layouts']) }}" class="dropdown-item">Layouts</a>
                                </div>
                            </div>
                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-tables" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tables
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-tables">
                                    <a href="{{ route ('second' , ['tables','basic']) }}" class="dropdown-item">Basic Tables</a>
                                    <a href="{{ route ('second' , ['tables','datatable']) }}" class="dropdown-item">Data Tables</a>
                                    <a href="{{ route ('second' , ['tables','responsive']) }}" class="dropdown-item">Responsive Tables</a>
                                    <a href="{{ route ('second' , ['tables','foo-tables']) }}" class="dropdown-item">Foo Tables</a>
                                    <a href="{{ route ('second' , ['tables','editable']) }}" class="dropdown-item">Editable</a>
                                </div>
                            </div>

                            <div class="dropdown hover-dropdown">
                                <a class="dropdown-item dropdown-toggle drop-arrow-none" href="#" id="topnav-maps" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Maps
                                    <div class="menu-arrow"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-maps">
                                    <a href="{{ route ('second' , ['maps','google']) }}" class="dropdown-item">Google Maps</a>
                                    <a href="{{ route ('second' , ['maps','vector']) }}" class="dropdown-item">Vector Maps</a>
                                    <a href="{{ route ('second' , ['maps','leaflet']) }}" class="dropdown-item">Leaflet Maps</a>
                                </div>
                            </div>
                        </div>

                    </li>

                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-layouts" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="menu-icon"><i data-lucide="sidebar"></i></span>
                            <span class="menu-text">Layouts</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layouts">
                            <a href="{{ route ('any', 'index') }}" class="dropdown-item" target="_blank">Vertical</a>
                            <a href="{{ route ('second' , ['layouts-demo','horizontal']) }}" class="dropdown-item" target="_blank">Horizontal</a>
                            <a href="{{ route ('second' , ['layouts-demo','full']) }}" class="dropdown-item" target="_blank">Full View</a>
                            <a href="{{ route ('second' , ['layouts-demo','fullscreen']) }}" class="dropdown-item" target="_blank">Fullscreen</a>
                            <a href="{{ route ('second' , ['layouts-demo','hover']) }}" class="dropdown-item" target="_blank">Hover Menu</a>
                            <a href="{{ route ('second' , ['layouts-demo','compact']) }}" class="dropdown-item" target="_blank">Compact Menu</a>
                            <a href="{{ route ('second' , ['layouts-demo','icon-view']) }}" class="dropdown-item" target="_blank">Icon View</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </nav>
</header>
<!-- Horizontal Menu End -->