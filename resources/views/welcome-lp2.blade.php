<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>サークルなう - 入室管理アプリ</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* TailwindCSSのスタイルはここに含まれます */
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <!-- ヒーローセクション -->
            <section class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-b from-transparent via-white to-white">
                <h1 class="mb-4 text-5xl font-bold">サークルなう</h1>
                <p class="mb-8 text-xl">部室の状況をリアルタイムで把握できる入室管理アプリ</p>
                <a href="#features" class="px-6 py-3 bg-[#FF2D20] text-white rounded-lg hover:bg-[#e63928]">機能を見る</a>
            </section>

            <!-- 特徴セクション -->
            <section id="features" class="max-w-4xl px-6 py-16 mx-auto">
                <h2 class="mb-12 text-3xl font-semibold text-center">主な特徴</h2>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <div class="flex flex-col items-center">
                        <svg class="w-16 h-16 text-[#FF2D20] mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <!-- アイコン -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 9 4-18 3 9h4" />
                        </svg>
                        <h3 class="mb-2 text-xl font-semibold">リアルタイム状況確認</h3>
                        <p class="text-center">部室の現在の入退室状況を即座に確認できます。</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <svg class="w-16 h-16 text-[#FF2D20] mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <!-- アイコン -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <h3 class="mb-2 text-xl font-semibold">入退室管理</h3>
                        <p class="text-center">メンバーの入退室を効率的に管理します。</p>
                    </div>
                    <!-- 追加の特徴をここに追加 -->
                </div>
            </section>

            <!-- コールトゥアクション -->
            <section class="py-16 bg-[#FF2D20] text-white text-center">
                <h2 class="mb-4 text-3xl font-semibold">今すぐ始めよう！</h2>
                <a href="/register" class="px-6 py-3 bg-white text-[#FF2D20] rounded-lg hover:bg-gray-200">登録する</a>
            </section>

            <!-- フッター -->
            <footer class="py-8 text-center text-white bg-gray-800">
                <p>© 2023 サークルなう. All rights reserved.</p>
                <div class="mt-4">
                    <a href="#" class="mx-2 hover:text-[#FF2D20]">Twitter</a>
                    <a href="#" class="mx-2 hover:text-[#FF2D20]">Facebook</a>
                </div>
            </footer>
        </div>
    </body>
</html>
