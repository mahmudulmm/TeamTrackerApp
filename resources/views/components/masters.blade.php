<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('dashboard_asset') }}/assets/"
    data-template="vertical-menu-template">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>{{ Request::segment(2) }}</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('dashboard_asset') }}/assets/img/favicon/logo.png" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
            rel="stylesheet" />

        <!-- Icons -->

        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/fonts/tabler-icons.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/fonts/flag-icons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/css/rtl/core.css"
            class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/css/rtl/theme-default.css"
            class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/css/demo.css" />
        <!---datatables CSS---->
        <link href="{{ asset('dashboard_asset') }}/assets/css/datatables.css" rel="stylesheet">
        <link href="{{ asset('dashboard_asset') }}/assets/css/datatables.min.css" rel="stylesheet">
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/libs/leaflet/leaflet.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/libs/node-waves/node-waves.css" />
        <link rel="stylesheet"
            href="{{ asset('dashboard_asset') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/libs/typeahead-js/typeahead.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/libs/apex-charts/apex-charts.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/libs/swiper/swiper.css" />
        <link rel="stylesheet"
            href="{{ asset('dashboard_asset') }}/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
        <link rel="stylesheet"
            href="{{ asset('dashboard_asset') }}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
        <link rel="stylesheet"
            href="{{ asset('dashboard_asset') }}/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />

        <!-- Page CSS -->
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/css/pages/cards-advance.css" />

        <!-- Helpers -->
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/js/helpers.js"></script>

        <script src="{{ asset('dashboard_asset') }}/assets/vendor/js/template-customizer.js"></script>

        <script src="{{ asset('dashboard_asset') }}/assets/js/config.js"></script>
    </head>

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                <x-partials.menu />
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    <x-partials.fullnav />
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row">
                                <!-- Website Analytics -->

                                <!-- Projects table -->
                                {{ $slot }}
                                <!--/ Projects table -->
                            </div>
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        <x-partials.footer />
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>

            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>
        </div>

        <!-- build:js assets/vendor/js/core.js -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/popper/popper.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/js/bootstrap.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/node-waves/node-waves.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/hammer/hammer.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/i18n/i18n.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/typeahead-js/typeahead.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/js/menu.js"></script>

        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/leaflet/leaflet.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/swiper/swiper.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

        <!-- Main JS -->
        <script src="{{ asset('dashboard_asset') }}/assets/js/main.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/js/datatables.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/js/datatables.min.js"></script>

        <script>
            var table = $('#mydataTable').DataTable();

            table.on('search.dt', function() {
                $('#filterInfo').html('Currently applied global search: ' + table.search());
            });
        </script>
        <!-- Page JS -->
        <script src="{{ asset('dashboard_asset') }}/assets/js/dashboards-analytics.js"></script>
        <script>
            const littleton = L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.'),
                denver = L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.'),
                aurora = L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.'),
                golden = L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.');
            const cities = L.layerGroup([littleton, denver, aurora, golden]);
            const street = L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
                    maxZoom: 18
                }),
                watercolor = L.tileLayer('http://tile.stamen.com/watercolor/{z}/{x}/{y}.jpg', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
                    maxZoom: 18
                });
            const layerControl = L.map('layerControl', {
                center: [39.73, -104.99],
                zoom: 10,
                layers: [street, cities]
            });
            const baseMaps = {
                Street: street,
                Watercolor: watercolor
            };
            const overlayMaps = {
                Cities: cities
            };
            L.control.layers(baseMaps, overlayMaps).addTo(layerControl);
            L.tileLayer('https://c.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
                maxZoom: 18
            }).addTo(layerControl);
        </script>

        <script>
            const userLocation = L.map('userLocation').setView([42.35, -71.08], 10);
            userLocation.locate({
                setView: true,
                maxZoom: 16
            });

            function onLocationFound(e) {
                const radius = e.accuracy;
                L.marker(e.latlng)
                    .addTo(userLocation)
                    .bindPopup('You are somewhere around ' + radius + ' meters from this point')
                    .openPopup();
                L.circle(e.latlng, radius).addTo(userLocation);
            }
            userLocation.on('locationfound', onLocationFound);
            L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
                maxZoom: 18
            }).addTo(userLocation);
        </script>

    </body>

</html>
