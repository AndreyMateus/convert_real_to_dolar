<!DOCTYPE html>
<html lang="pt-br" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Conversor BRL → USD</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5"
        rel="stylesheet"
        type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="min-h-screen bg-base-200 flex items-center justify-center p-4">

    <main class="w-full max-w-md">

        <div class="card bg-base-100 shadow-2xl border border-base-300">

            <div class="card-body p-7">

                <!-- Cabeçalho -->
                <header class="text-center mb-5">

                    <div class="flex justify-center mb-4">
                        <div class="avatar placeholder">
                            <div class="bg-primary text-primary-content rounded-full w-14">
                                <span class="text-2xl">$</span>
                            </div>
                        </div>
                    </div>

                    <h1 class="text-3xl font-bold tracking-tight">
                        Conversor BRL → USD
                    </h1>

                    <p class="text-base-content/60 mt-2">
                        Converta valores de reais para dólares
                    </p>

                    <a
                        href="https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/aplicacao#!/recursos/CotacaoDolarPeriodo#eyJmb3JtdWxhcmlvIjp7IiRmb3JtYXQiOiJqc29uIiwiJHRvcCI6MTAwfX0="
                        target="_blank"
                        class="link link-primary text-sm inline-block mt-3">
                        Cotação baseada no Banco Central
                    </a>

                </header>


                <!-- Divisor -->
                <div class="divider"></div>


                <!-- Formulário -->
                <form action="/pages/result.php" method="GET">

                    <fieldset class="fieldset">

                        <legend class="fieldset-legend text-base">
                            Valor em Reais
                        </legend>

                        <label class="input input-lg input-bordered w-full">

                            <span class="text-base-content/50 font-medium">
                                R$
                            </span>

                            <input
                                type="number"
                                name="brl"
                                step="0.5"
                                min="0"
                                required
                                placeholder="120,00"
                                class="grow" />

                        </label>

                        <p class="label text-base-content/50">
                            Informe o valor que deseja converter.
                        </p>

                    </fieldset>


                    <button
                        type="submit"
                        class="btn btn-primary btn-lg w-full mt-4">

                        Calcular conversão

                        <span class="text-lg">→</span>

                    </button>

                </form>


                <!-- Rodapé -->
                <div class="divider"></div>

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
            Conversão utilizando a cotação PTAX
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