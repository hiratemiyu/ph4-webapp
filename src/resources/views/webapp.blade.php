<!DOCTYPE html>
<html lang="ja">
  <head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script src="https://unpkg.com/apexcharts/dist/apexcharts.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/web.css') }}">
  </head>

<body>
    <header class="header color=w-1">
        <div class="header_week">
        </div>
        <div class="header_record">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
            記録・投稿
            </button>
        </div>
        <!-- ログアウトボタンを追加 -->
        <div class="header_logout">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        </div>
    </header>

  <main class="main">
    <div class="container">
      <div id="modal-overlay" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden"></div>  
      <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center">
          <div class="relative p-4 w-full max-w-md max-h-full">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg shadow">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                  </div>
                  <!-- Modal body -->
                  <form class="p-4 md:p-5" action="{{ route('webapp.store') }}" method="POST">
                    @csrf
                      <div class="grid gap-3 mb-4 grid-cols-2">
                        <div class="col-span-1">
                        {{-- 学習日 --}}
                          <div class="col-span-2">
                              <label for="name" class="block mb-2 text-sm font-medium text-gray-900">学習日</label>
                              <input type="date" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required="">
                          </div>
                          <div class="col-span-2 sm:col-span-1">
                            <label class="block mb-2 text-sm font-medium text-gray-900">学習コンテンツ（複数選択可能）</label>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="learningContent[]" value="N予備校" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <span class="ml-2 text-sm text-gray-900">N予備校</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="learningContent[]" value="ドットインストール" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <span class="ml-2 text-sm text-gray-900">ドットインストール</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="learningContent[]" value="POSSE課題" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <span class="ml-2 text-sm text-gray-900">POSSE課題</span>
                                </label>
                            </div>
                          </div>

                          {{-- 学習言語 --}}
                          <div class="col-span-2 sm:col-span-1">
                              <label for="category" class="block mb-2 text-sm font-medium text-gray-900">学習言語（複数選択可）</label>
                              <div class="flex flex-col">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="learningContent[]" value="HTML" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <span class="ml-2 text-sm text-gray-900">HTML</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="learningContent[]" value="css" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <span class="ml-2 text-sm text-gray-900">css</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="learningContent[]" value="JavaaScript" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <span class="ml-2 text-sm text-gray-900">JavaaScript</span>
                                </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-span-1 flex flex-col"> 
                          {{-- 学習時間 --}}
                          <div class="col-span-2 sm:col-span-1">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">学習時間</label>
                            <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="時間" required="">
                          </div>                         
                          {{-- Twitter用コメント --}}
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Twitter用コメント</label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            記録する
                    </button>
                                    </form>
                            </div>
                    </div>
                </div> 
            </div>
            <div class="hours_container">
                <div class="hours">
                    <ul id="today_hours">
                        <li class="hours_title" id="today_title" name="today">月</li>
                        <li class="hours_count"><?php echo $today_sum;?></li>
                        <li class="hours_hour">hour</li>
                    </ul>
                    <ul class="month_hours">
                        <li class="hours_title" id="month_title"><?php echo $this_month?>の合計</li>
                        <li class="hours_count"><?php echo $month_sum;?></li>
                        <li class="hours_hour">hour</li>
                    </ul>
                    <ul class="total_hours">
                        <li class="hours_title">総計</li>
                        <li class="hours_count"><?php echo $total_sum;?></li>
                        <li class="hours_hour">hour</li>
                    </ul>
                </div>
                <div class="canvas_container w-full" id="hours_chart">
                <div style="width: 100%;">
                    <canvas id="hours_graph"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var ctx = document.getElementById('hours_graph').getContext('2d');
                        var hours_graph = new Chart(ctx, {
                            type: 'bar', // グラフのタイプ('line','bubble','pie'などに変更可能です)
                            data: {
                                labels: ['2', '4', '6', '8', '10', '12', '14', '16', '18', '20', '22', '24', '26', '28', '30'],
                                datasets: [{
                                    data: [0, 2,4,5,8,],
                                    backgroundColor: [
                                        'RGB(0, 112, 184)',
                                    ],
                                    borderColor: [
                                        'RGB(0, 112, 184)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        max: 10,
                                    }
                                }
                            }
                        });
                    </script>
                </div>
                </div>
            </div>
            <div class="learning">
                <div class="learning_character">
                    <p class="learning_title">学習言語</p>
                    <div class="character_chart">
                        <canvas id="languages_pie"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var ctx = document.getElementById('languages_pie').getContext('2d');
                            var hours_graph = new Chart(ctx, {
                                type: 'pie', // グラフのタイプ
                                data: {
                                    labels: ['html', 'css', 'javascript'],
                                    datasets: [{
                                        label: 'My First Dataset',
                                        data: [300, 50, 100],
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)',
                                            'rgb(255, 205, 86)'
                                        ],
                                        hoverOffset: 4
                                    }]
                                } 
                            });
                        </script>
                    </div>
                </div>
            </div>

                <div class="learning_content">
                    <p class="learning_title">学習コンテンツ</p>
                    <div class="character_chart">
                        <canvas id="contents_pie"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var ctx = document.getElementById('contents_pie').getContext('2d');
                            var hours_graph = new Chart(ctx, {
                                type: 'pie', // グラフのタイプ
                                data: {
                                    labels: ['ドットインストール','N予備校','POSSE課題' ],
                                    datasets: [{
                                        label: 'My First Dataset',
                                        data: [300, 50, 100],
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)',
                                            'rgb(255, 205, 86)'
                                        ],
                                        hoverOffset: 4
                                    }]
                                } 
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('crud-modal');
    const overlay = document.getElementById('modal-overlay');

    // モーダル外のオーバーレイをクリックしたときにモーダルを閉じる
    overlay.addEventListener('click', () => {
        modal.classList.add('hidden');
        overlay.classList.add('hidden');
    });

    // モーダルの内容部分のクリックイベントが親要素へ伝播しないようにする
    modal.addEventListener('click', (event) => {
        event.stopPropagation();
    });

    // モーダルの開閉ボタンの処理（既に実装してあるものと仮定）
    document.querySelectorAll('[data-modal-toggle="crud-modal"]').forEach(button => {
        button.addEventListener('click', () => {
            modal.classList.toggle('hidden');
            overlay.classList.toggle('hidden');
        });
    });
});

</script>
