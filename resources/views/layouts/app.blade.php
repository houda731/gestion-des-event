<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion des Événements')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body>
    @yield('body')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            try {
                var stored = localStorage.getItem('theme');
                var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                var theme = stored || (prefersDark ? 'dark' : 'light');
                document.documentElement.setAttribute('data-theme', theme);

                window.__toggleTheme = function () {
                    var current = document.documentElement.getAttribute('data-theme') || 'light';
                    var next = current === 'dark' ? 'light' : 'dark';
                    document.documentElement.setAttribute('data-theme', next);
                    localStorage.setItem('theme', next);
                };

                document.addEventListener('click', function (e) {
                    var btn = e.target.closest && e.target.closest('#themeToggle');
                    if (btn) {
                        window.__toggleTheme();
                    }
                });

                document.querySelectorAll('[data-search-input]').forEach(function (input) {
                    input.addEventListener('input', function () {
                        var selector = input.getAttribute('data-search-input');
                        var table = selector ? document.querySelector(selector) : null;
                        if (!table) return;

                        var q = (input.value || '').toLowerCase().trim();
                        var rows = table.querySelectorAll('tbody tr');
                        rows.forEach(function (tr) {
                            var text = (tr.textContent || '').toLowerCase();
                            tr.style.display = text.indexOf(q) !== -1 ? '' : 'none';
                        });
                    });
                });
            } catch (e) {}
        })();
    </script>
</body>
</html>
