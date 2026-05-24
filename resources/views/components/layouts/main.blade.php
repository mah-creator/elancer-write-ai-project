@props(['mainWrapper' => '', 'bodyWrapper' => '', 'title' => 'Aether - Cinematic Minimalism for the Creative Mind'])

<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link rel="icon" type="image/svg" href="/images/logo.svg" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Geist:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />

    {{ $style ?? '' }}

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-error": "#690005",
                        "inverse-on-surface": "#283044",
                        "surface-dim": "#0b1326",
                        "tertiary-fixed": "#ffdcc6",
                        "tertiary-container": "#df7412",
                        "primary-fixed-dim": "#adc6ff",
                        "on-primary-fixed": "#001a42",
                        "error": "#ffb4ab",
                        "surface": "#0b1326",
                        "tertiary-fixed-dim": "#ffb786",
                        "on-surface": "#dae2fd",
                        "on-tertiary-container": "#461f00",
                        "on-secondary-fixed": "#001f26",
                        "on-primary-container": "#00285d",
                        "surface-container-high": "#222a3d",
                        "secondary-fixed": "#acedff",
                        "outline-variant": "#424754",
                        "outline": "#8c909f",
                        "primary": "#adc6ff",
                        "on-primary-fixed-variant": "#004395",
                        "surface-variant": "#2d3449",
                        "tertiary": "#ffb786",
                        "error-container": "#93000a",
                        "on-secondary-container": "#00424e",
                        "inverse-primary": "#005ac2",
                        "on-surface-variant": "#c2c6d6",
                        "on-tertiary": "#502400",
                        "secondary-fixed-dim": "#4cd7f6",
                        "background": "#0b1326",
                        "secondary": "#4cd7f6",
                        "primary-fixed": "#d8e2ff",
                        "on-tertiary-fixed": "#311400",
                        "on-primary": "#002e6a",
                        "secondary-container": "#03b5d3",
                        "on-secondary": "#003640",
                        "on-tertiary-fixed-variant": "#723600",
                        "primary-container": "#4d8eff",
                        "surface-container-highest": "#2d3449",
                        "surface-container": "#171f33",
                        "surface-container-lowest": "#060e20",
                        "surface-container-low": "#131b2e",
                        "surface-bright": "#31394d",
                        "surface-tint": "#adc6ff",
                        "on-error-container": "#ffdad6",
                        "inverse-surface": "#dae2fd",
                        "on-secondary-fixed-variant": "#004e5c",
                        "on-background": "#dae2fd"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-desktop": "64px",
                        "margin-mobile": "20px",
                        "container-max": "1200px",
                        "base": "8px",
                        "gutter": "24px"
                    },
                    "fontFamily": {
                        "headline-lg-mobile": ["Geist"],
                        "label-sm": ["Geist"],
                        "headline-lg": ["Geist"],
                        "display-lg": ["Geist"],
                        "body-lg": ["Inter"],
                        "body-md": ["Inter"]
                    },
                    "fontSize": {
                        "headline-lg-mobile": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "600"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "500"
                        }],
                        "headline-lg": ["40px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "600"
                        }],
                        "display-lg": ["64px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.04em",
                            "fontWeight": "700"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.8",
                            "letterSpacing": "0.01em",
                            "fontWeight": "400"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }]
                    }
                },
            },
        }
    </script>
</head>

<body class="{{ $bodyWrapper }} ">

    <!-- TopNavBar -->
    @if (isset($navbar))

    {{ $navbar }}
    @else

    <x-layouts.default-navbar />

    @endif

    <main class="{{ $mainWrapper }}">
        {{ $slot }}
    </main>

    <!-- Footer -->
    @if (isset($footer))

    {{ $footer }}

    @else

    <x-layouts.default-footer />

    @endif

</body>

</html>