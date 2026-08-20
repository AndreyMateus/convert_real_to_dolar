<?php

$brl = $_REQUEST['brl'] ?? '';

$dateTime = new Datetime();
$start_date = $dateTime->modify("-7 days")->format('m-d-Y');
$end_date = $dateTime->format('m-d-Y');

$urlAPI_bc = "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial='" . $start_date . "'&@dataFinalCotacao='" . $end_date . "'&\$top=100&\$format=json&\$select=cotacaoCompra,cotacaoVenda,dataHoraCotacao";

$response = file_get_contents($urlAPI_bc);

$responseToJson = json_decode($response, true);
extract($responseToJson);

$objectPrice = $value[0];

$priceBuyDolar = $objectPrice['cotacaoCompra'];

$dateLastUpdateOfPriceToBuyDolar = $objectPrice['dataHoraCotacao'];

$result = $brl / $priceBuyDolar;

$patternToEcho = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

$resultPriceStyled = numfmt_format_currency($patternToEcho, $result, "USD");

$dateLastUpdateToDateTimeObj = new DateTime($dateLastUpdateOfPriceToBuyDolar);
$formatedDateLastUpdated = date_format($dateLastUpdateToDateTimeObj, "d/m/Y");

$fmt_brl = numfmt_create("pt_br", NumberFormatter::CURRENCY);
$newStyle_brl =  numfmt_format_currency($fmt_brl, $brl, "BRL");
?>

<!DOCTYPE html>
<html lang="pt-br" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resultado Conversão BRL → USD</title>

    <!-- DaisyUI + Tailwind -->
    <link
        href="https://cdn.jsdelivr.net/npm/daisyui@5"
        rel="stylesheet"
        type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen bg-base-200 flex items-center justify-center p-4">

    <main class="w-full max-w-md">

        <div class="card bg-base-100 shadow-2xl border border-base-300">

            <div class="card-body p-7">

                <!-- Cabeçalho -->
                <header class="text-center">

                    <div class="flex justify-center mb-4">
                        <div class="avatar placeholder">
                            <div class="bg-primary text-primary-content rounded-full w-14">
                                <span class="text-2xl">✓</span>
                            </div>
                        </div>
                    </div>

                    <h1 class="text-3xl font-bold tracking-tight">
                        Resultado da Conversão
                    </h1>

                    <p class="text-base-content/60 mt-2">
                        Real (BRL) → Dólar (USD)
                    </p>

                </header>


                <div class="divider"></div>


                <!-- Resumo da conversão -->
                <section class="bg-base-200 rounded-2xl p-4">

                    <div class="grid grid-cols-2 gap-3">

                        <!-- Valor de origem -->
                        <div class="card bg-base-100 border border-base-300">

                            <div class="card-body p-4">

                                <div class="flex items-center justify-between">

                                    <span class="text-xs uppercase tracking-wider
                                        text-base-content/50 font-medium">
                                        De
                                    </span>

                                    <span class="badge badge-ghost badge-sm">
                                        BRL
                                    </span>

                                </div>

                                <p class="text-lg font-semibold mt-2">
                                    <?= $newStyle_brl ?>
                                </p>

                            </div>

                        </div>


                        <!-- Valor de destino -->
                        <div class="card bg-base-100 border border-base-300">

                            <div class="card-body p-4">

                                <div class="flex items-center justify-between">

                                    <span class="text-xs uppercase tracking-wider
                                        text-base-content/50 font-medium">
                                        Para
                                    </span>

                                    <span class="badge badge-primary badge-sm">
                                        USD
                                    </span>

                                </div>

                                <p class="text-lg font-semibold mt-2">
                                    <?= $resultPriceStyled ?>
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- Data da cotação -->
                    <div class="text-center mt-4">

                        <p class="text-xs text-base-content/50">
                            Cotação atualizada em
                        </p>

                        <p class="text-sm font-medium mt-1">
                            <?= $formatedDateLastUpdated ?>
                        </p>

                    </div>

                </section>


                <!-- Resultado principal -->
                <section class="text-center py-5">

                    <p class="text-sm text-base-content/60">
                        Valor convertido
                    </p>

                    <h2 class="text-4xl font-bold text-success mt-2">
                        <?= $resultPriceStyled ?>
                    </h2>

                    <div class="badge badge-success badge-outline mt-3">
                        Conversão realizada
                    </div>

                </section>


                <!-- Ações -->
                <div class="flex flex-col gap-3">

                    <a
                        href="/"
                        class="btn btn-primary btn-lg w-full">

                        Nova conversão

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


        <!-- Rodapé externo -->
        <p class="text-center text-xs text-base-content/40 mt-4">
            Conversão baseada na cotação PTAX
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