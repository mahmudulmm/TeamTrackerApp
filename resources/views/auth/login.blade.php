<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('dashboard_asset') }}/assets/" data-template="vertical-menu-template">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>Team Tracker </title>

        <meta name="description" content="" />
        <link rel="icon" type="image/x-icon" href="{{ asset('dashboard_asset') }}/assets/img/favicon/favicon.ico" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
            rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/fonts/tabler-icons.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/fonts/flag-icons.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/css/rtl/core.css"
            class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/css/rtl/theme-default.css"
            class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/css/demo.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/libs/node-waves/node-waves.css" />
        <link rel="stylesheet"
            href="{{ asset('dashboard_asset') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/libs/typeahead-js/typeahead.css" />
        <link rel="stylesheet"
            href="{{ asset('dashboard_asset') }}/assets/vendor/libs/@form-validation/umd/styles/index.min.css" />
        <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/assets/vendor/css/pages/page-auth.css" />
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/js/helpers.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/js/template-customizer.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/js/config.js"></script>
    </head>

    <body>
        <!-- Content -->

        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="app-brand justify-content-center mb-4 mt-2">
                                <a class="app-brand-link gap-2">
                                    <span>
                                        <img src="{{ asset('dashboard_asset') }}/assets/img/branding/brand-logo.png"
                                            width="180" height="130" />
                                    </span>
                                </a>
                            </div>
                            <form method="POST" class="mb-3" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">

                                    <label for="email" class="label" :value="__('Email')">Email or
                                        Username</label>
                                    <input type="email" class="input form-control" id="email" name="email"
                                        :value="old('email')" autocomplete="username" required
                                        placeholder="Enter your email or username" />
                                </div>

                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password"
                                            :value="__('Password')">Password</label>

                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="input form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" required autocomplete="current-password" />
                                        <span class="input-group-text cursor-pointer"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                </div>
                            </form>

                            <div class="divider my-4">
                                <div class="divider-text">*</div>
                            </div>
                            <p class="mb-4 text-center">Please sign-in to your account !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/popper/popper.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/js/bootstrap.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/node-waves/node-waves.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/hammer/hammer.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/i18n/i18n.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/typeahead-js/typeahead.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/js/menu.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js">
        </script>
        <script src="{{ asset('dashboard_asset') }}/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js">
        </script>
        <script src="{{ asset('dashboard_asset') }}/assets/js/main.js"></script>
        <script src="{{ asset('dashboard_asset') }}/assets/js/pages-auth.js"></script>
    </body>

</html>
