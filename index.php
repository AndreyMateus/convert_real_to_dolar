<!DOCTYPE html>
<html lang="pt-br" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Real para Dólar</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Configuração do dark mode -->
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>

    <!-- Remoção das setinhas do input number -->
    <style>
        /* Chrome, Edge, Safari */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 transition-colors">

    <main class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 space-y-6">

        <!-- Cabeçalho -->
        <header class="space-y-2 text-center">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                Conversor BRL → USD
            </h1>

            <a
                href="https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/aplicacao#!/recursos/CotacaoDolarPeriodo#eyJmb3JtdWxhcmlvIjp7IiRmb3JtYXQiOiJqc29uIiwiJHRvcCI6MTAwfX0="
                target="_blank"
                class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                Utilizando dados do Banco Central
            </a>
        </header>

        <!-- Formulário -->
        <form action="/pages/result.php" method="GET" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Valor em Reais (BRL)
                </label>

                <input
                    type="number"
                    step="0.5"
                    name="brl"
                    required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600
                           bg-gray-50 dark:bg-gray-700
                           text-gray-900 dark:text-gray-100
                           focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Exemplo: 120">
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold
                       py-2 rounded-lg transition">
                Calcular
            </button>
        </form>

        <!-- Dark mode toggle -->
        <div class="flex justify-center">
            <button
                onclick="document.documentElement.classList.toggle('dark')"
                class="text-sm text-gray-600 dark:text-gray-300 hover:underline">
                Alternar tema 🌙 / ☀️
            </button>
        </div>

    </main>

</body>

</html>