<!DOCTYPE html>
<html lang="ja">
  <head>
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
    <header class="header">
        <div class="header_week">
            <li class="header_week_4th">4th week</li>
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
                  <form class="p-4 md:p-5">
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
                                        <li class="hours_title" id="today_title" name="today"></li>
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
                                <div class="canvas_container" id="hours_chart"></div>
                                <script>
                                    var options = {
                                        series: [{
                                            name: 'hour',
                                            data: hoursData      
                                            }],
                                        chart: {
                                            type: 'bar',
                                            height: 420,
                                            toolbar: {
                                                show: false
                                            },
                                        },
                                        plotOptions: {
                                            bar: {
                                                horizontal: false,
                                                columnWidth: '50%',
                                                borderRadius: 5,
                                                endingShape: 'rounded'
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        xaxis: {
                                            axisTicks: {
                                                show: false //x軸の値区切り.-.
                                            },
                                            axisBorder: {
                                                show: false
                                            },

                                            labels: {
                                                formatter: function(value) {
                                                    if (value !== undefined) {
                                                        const categories = value.split(" ")
                                                        const day = categories[0]
                                                        return day % 2 == 1 ? "" : value;
                                                    }
                                                },
                                                style: {
                                                    colors: '#6ba0f0'
                                                },
                                            },
                                        },

                                        grid: {
                                            yaxis: {
                                                lines: {
                                                    show: false
                                                },
                                            },
                                        },

                                        yaxis: {
                                            labels: {
                                                formatter: function(value) {
                                                    return value + "h";
                                                },
                                                style: {
                                                    colors: '#6ba0f0',
                                                }
                                            },
                                            type: 'category',
                                            axisTicks: {
                                                show: false,
                                                width: 1,
                                            }
                                        },

                                        labels: ['1', '02', '3', '04', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],

                                        fill: {
                                            colors: ["#1174BD"],
                                            type: 'gradient',
                                            gradient: {
                                                type: 'vertical', //上垂直にグラデーション 
                                                gradientToColors: ['#3BCFFF'],
                                            }
                                        },

                                        responsive: [{
                                            breakpoint: 480,
                                            options: {
                                                xaxis: {
                                                    labels: {
                                                        offsetY: -7,
                                                        style: {
                                                            fontSize: '7.5px',
                                                        }
                                                    }
                                                },
                                                chart: {
                                                    height: 200,
                                                }
                                            },
                                        }]
                                    };

                                    var chart = new ApexCharts(document.querySelector("#hours_chart"), options);
                                    chart.render();
                                </script>
                            </div>
                            <div class="learning">
                                <div class="learning_character">
                                    <p class="learning_title">学習言語</p>
                                    <div class="character_chart">
                                        <div class="learning_chart" id="chart1">
                                        <script>
                                            console.log(hours);
                                            var options = {
                                                series: hours,
                                                chart: {
                                                width: 300,
                                                type: 'pie',
                                            },
                                            labels: labels,
                                            legend: {
                                                position: 'bottom' // ここでラベルの位置を下に設定
                                            },
                                            responsive: [{
                                                breakpoint: 480,
                                                options: {
                                                    chart: {
                                                        width: 200
                                                    },
                                                    legend: {
                                                        position: 'bottom'
                                                    }
                                                }
                                            }]
                                            };
                                            var chart = new ApexCharts(document.querySelector("#chart1"), options);
                                            chart.render();
                                        </script>
                                        </div>
                                    </div>
                                </div>

                                <div class="learning_content">
                                    <p class="learning_title">学習コンテンツ</p>
                                    <div class="canvas_container" id="content_chart">
                                        <script>
                                        var options = {
                                            series: content_hours,
                                            chart: {
                                            width: 350,
                                            type: 'pie',
                                        },
                                        labels:content_labels,
                                        legend: {
                                                position: 'bottom' // ここでラベルの位置を下に設定
                                            },
                                        responsive: [{
                                            breakpoint: 480,
                                            options: {
                                                chart: {
                                                    width: 200
                                                },
                                                legend: {
                                                    position: 'bottom'
                                                }
                                            }
                                        }]
                                        };
                                        var chart = new ApexCharts(document.querySelector("#content_chart"), options);
                                        chart.render();
                                    </script>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="date">
                            <div class="arrow arrow-left"></div>
                            <div id="date_detail"><?php echo $this_month;?></div>
                            <div class="arrow arrow-right"></div>
                        </div>
                        <div class="footer_record">
                            <button id="footer_record_button">記録・投稿</button>
                        </div>
                        <div class="modal">
                            <form action="" method="post" id="form_record">
                                <div class="modal_content">
                                    <button class="modal_close"><span class="batsu"></span></button>
                                    <div class="modal_detail">
                                        <div class="modal_detail_left">
                                            <div class="modal_learning_day">
                                                <div class="modal_learning_day_detail">
                                                    <p class="learning_day_title" >学習日</p>
                                                    <input type="date" name="learning_day_detail" class="learning_day_text">
                                                <button id="learning_day_detail" placeholder="2022年10月23日"> 
                                                </div>
                                            </div>
                                            <div class="modal_learning_content">
                                                <p class="learning_content_title">学習コンテンツ （複数選択可）</p>
                                                <div class="modal_learning_content_detail">
                                                    <div class="modal_N">
                                                        <input type="checkbox"  name=""><label for="N_cramSchool" class="N_cramSchool">N予備校</label>
                                                    </div>
                                                    <div class="modal_dot">
                                                        <input type="checkbox"  name=""><label for="dotinstall" class="dotinstall">ドットインストール</label>
                                                    </div>
                                                    <div class="modal_Posse">
                                                        <input type="checkbox"  name=""><label for="posse"class="posse">POSSE課題</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal_learning_language">
                                                <p class="learning_language_title">学習言語（複数選択可）</p>
                                                <div class="learning_language_content">
                                                    <div class="modal_html">
                                                        <input type="checkbox"  name=""><label for="html"class="html">HTML</label>
                                                    </div>
                                                    <div class="modal_css">
                                                        <input type="checkbox"  name=""><label for="css"class="css">CSS</label>
                                                    </div>
                                                    <div class="modal_js">
                                                        <input type="checkbox"  name=""><label for="js"class="js">JavaScript</label>
                                                    </div>
                                                    <div class="modal_php">
                                                        <input type="checkbox"  name=""><label for="php"class="php">PHP</label>
                                                    </div>
                                                    <div class="modal_laravel">
                                                        <input type="checkbox" name=""><label for="laravel"class="laravel">Laravel</label>
                                                    </div>
                                                    <div class="modal_sql">
                                                        <input type="checkbox" name=""><label for="sql"class="sql">SQL</label>
                                                    </div>
                                                    <div class="modal_shell">
                    <input type="checkbox"  name=""><label for="shell"class="shell">SHELL</label>
                  </div>
                  <div class="modal_others">
                    <input type="checkbox"  name=""><label for="others"class="others">情報システム基礎情報（その他</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal_detail_right">
              <div class="modal_learning_time">
                <p class="learning_time_title">学習時間</p>
                <input type="text" name="" class="learning_time_title_detail" placeholder="">
              </div>
              <div class="modal_comment">
                <p class="comment_title">Twitter用コメント</p>
                <textarea name="" id="comment_title_detail" cols="30" rows="10"></textarea>
              </div>
              <div class="modal_twitter">
                <input type="checkbox"  name=""><label for="modal_twitter_button" class="modal_twitter_button" id="twitter_share">Twitterにシャアする</label>
              </div>
            </div>
          </div>
          <button class="modal_record" id="modal_record">記録・投稿</button>
        </div>
      </form>
    </div>
    <div class="calender">
      <div class="calender_content">
        <button id="calender_close"><span class="batsu"></span></button>
        <div class="calender_detail">
          <table>
            <thead>
              <tr>
                <th id="prev">&laquo;</th>
                <th id="title" colspan="3">2022/10</th>
                <th id="next">&raquo;</th>
              </tr>
              <tr>
                <th class="weekday">Sun</th>
                <th class="weekday">Mon</th>
                <th class="weekday">Tue</th>
                <th class="weekday">Wed</th>
                <th class="weekday">Thu</th>
                <th class="weekday">Fri</th>
                <th class="weekday">Sat</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <button class="calender_decide">決定</button>
      </div>
    </div>
    <div class="loading">
      <button class="loading_close"><span class="batsu" ></span></button>
      <div class="loading_content">
        <div class="loader"></div>
      </div>

    </div>
    <div class="finish">
      <div class="finish_content">
        <button class="finish_close"><span class="batsu"></span></button>
        <div class="finish_mark">
          <p class="finish_awesome">AWESOME!</p>
          <ul class="finish_checkbox">
            <li class="finish_checkbox_item"></li>
          </ul>
          <p class="finish_anounce">記録・投稿<br>完了しました</p>
        </div>
      </div>
    </div>
    <div class="error">
      <div class="error_content">
        <p class="error_content_error">ERROR</p>
        <i class="gg-danger"></i>
        <p class="error_anounce">一時的にご利用できない状態です。<br>しばらく経ってから<br>再度アクセスしてください</p>
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
ssa