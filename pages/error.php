<!DOCTYPE html>
<html lang="pt-br" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Valor Inválido — Conversor BRL → USD</title>

    <!-- DaisyUI + Tailwind -->
    <link
        href="https://cdn.jsdelivr.net/npm/daisyui@5"
        rel="stylesheet"
        type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4" defer></script>

    <style>
        .avatar-content {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="min-h-screen bg-base-200 flex items-center justify-center p-4">

    <main class="w-full max-w-md">

        <div class="card bg-base-100 shadow-2xl border border-base-300">

            <div class="card-body p-7">

                <!-- Cabeçalho -->
                <header class="text-center">

                    <div class="flex justify-center mb-4">
                        <div class="avatar placeholder">
                            <div class="bg-error text-error-content rounded-full w-14 avatar-content">
                                <span class="text-2xl">!</span>
                            </div>
                        </div>
                    </div>

                    <h1 class="text-3xl font-bold tracking-tight">
                        Valor inválido
                    </h1>

                    <p class="text-base-content/60 mt-2">
                        Não foi possível realizar a conversão
                    </p>

                </header>


                <div class="divider"></div>


                <!-- Mensagem de erro -->
                <div class="alert alert-error">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z" />

                    </svg>

                    <div>

                        <h2 class="font-bold">
                            O valor informado não é válido.
                        </h2>

                        <p class="text-sm mt-1">
                            Informe um valor numérico em reais para realizar a conversão.
                        </p>

                    </div>

                </div>


                <!-- Exemplo -->
                <section class="bg-base-200 rounded-xl p-4 mt-5">

                    <p class="text-sm text-base-content/60">
                        Exemplos de valores válidos:
                    </p>

                    <div class="flex flex-wrap gap-2 mt-3">

                        <span class="badge badge-outline">
                            100
                        </span>

                        <span class="badge badge-outline">
                            250.50
                        </span>

                        <span class="badge badge-outline">
                            1000
                        </span>

                    </div>

                </section>


                <!-- Ação -->
                <div class="mt-6">

                    <a
                        href="/"
                        class="btn btn-primary btn-lg w-full">

                        Voltar para conversão

                        <span class="text-lg">→</span>

                    </a>

                </div>


                <div class="divider"></div>


                <!-- Tema -->
                <footer class="flex items-center justify-between">

                    <span class="text-sm text-base-content/60">
                        Tema
                    </span>

                    <label class="swap swap-rotate">

                        <input
                            type="checkbox"
                            id="themeToggle"
                            onchange="toggleTheme()" />

                        <!-- Sol -->
                        <svg
                            class="swap-on fill-current w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">

                            <path d="M5.64 17l-1.41 1.41L5.64 19.82l1.41-1.41L5.64 17zM12 4V1h-1v3h1zm6.36 13l1.41 1.41-1.41 1.41-1.41-1.41L18.36 17zM20 11v2h3v-2h-3zM4 11H1v2h3v-2zm8 4a3 3 0 100-6 3 3 0 000 6zm7.07-9.07l1.41-1.41L19.07 3.1l-1.41 1.41L19.07 5.93zM4.93 5.93L3.52 4.52 4.93 3.1l1.41 1.41L4.93 5.93z" />

                        </svg>

                        <!-- Lua -->
                        <svg
                            class="swap-off fill-current w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">

                            <path d="M21.64 13a9 9 0 01-10.63 8.58A9 9 0 0110.42 4.36 7 7 0 0021.64 13z" />

                        </svg>

                    </label>

                </footer>

            </div>

        </div>


        <p class="text-center text-xs text-base-content/40 mt-4">
            Conversor BRL → USD
        </p>

    </main>


    <script>
        function toggleTheme() {

            const html = document.documentElement;

            const currentTheme = html.getAttribute("data-theme");

            html.setAttribute(
                "data-theme",
                currentTheme === "dark" ? "light" : "dark"
            );

        }
    </script>

</body>

</html>