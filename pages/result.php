<?php

use BcMath\Number;

$brl = $_REQUEST['brl'];

$start_date = date("m/d/Y", strtotime("-7 days"));
$end_date = date("m/d/Y");
$urlAPI_bc = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\'' . $start_date . '\'&@dataFinalCotacao=\'' . $end_date  . '\'&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

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
<html lang="pt-br" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Conversão BRL → USD</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 transition-colors">

    <main class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 space-y-6">

        <!-- Título -->
        <header class="text-center space-y-1">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                Resultado da Conversão
            </h1>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Real (BRL) → Dólar (USD)
            </p>
        </header>

        <!-- Resumo BRL -> USD -->
        <section class="rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40 p-4">
            <div class="grid grid-cols-2 gap-3">
                <div class="rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-3">
                    <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">De</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-100">
                        <?= $newStyle_brl ?>
                    </p>
                </div>

                <div class="rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-3">
                    <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Para</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-100">
                        <?= $resultPriceStyled ?>
                    </p>
                </div>
            </div>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Cotação atualizada em:
                    <span class="font-medium text-gray-800 dark:text-gray-200">
                        <?= $formatedDateLastUpdated ?>
                    </span>
                </p>
            </div>
        </section>

        <!-- Destaque do valor convertido -->
        <article class="text-center space-y-2">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Valor convertido
            </p>

            <h2 class="text-3xl font-bold text-green-600 dark:text-green-400">
                <?= $resultPriceStyled ?>
            </h2>
        </article>

        <!-- Ações -->
        <div class="flex flex-col gap-3">
            <a href="/"
                class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">
                Nova Conversão
            </a>

            <button onclick="document.documentElement.classList.toggle('dark')"
                class="text-sm text-gray-600 dark:text-gray-300 hover:underline">
                Alternar tema 🌙 / ☀️
            </button>
        </div>

    </main>

</body>

</html>