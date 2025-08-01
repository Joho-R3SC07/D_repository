<?php
// 納品登録画面（HTML→PHP化）
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>納品登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        nav ul {
            list-style-type: none;
        }

        nav ul li {
            display: inline;
        }

        .container {
            padding: 20px 0;
        }

        .main-nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 15px;
        }

        .main-nav a {
            display: inline-block;
            padding: 10px 24px;
            font-family: "Helvetica", "Arial", sans-serif;
            font-size: 16px;
            color: #333;
            background-color: #f4f4f4;
            text-decoration: none;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .main-nav a:hover {
            background-color: #007bff;
            color: #ffffff;
            border-color: #0069d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        td input,
        textarea {
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- ナビゲーションバー -->
    <header class="container text-center">
        <nav class="main-nav">
            <ul>
                <li><a href="./index.html">ホーム</a></li>
                <li><a href="./注文管理.html">注文管理</a></li>
                <li><a href="./納品管理.html">納品管理</a></li>
                <li><a href="./顧客取込.html">顧客登録</a></li>
            </ul>
        </nav>
    </header>

    <main class="container mt-5">

        <!-- 納品書フォーム -->
        <form>
            <div>
                <div class="d-flex justify-content-between">
                    <span>納品書</span>
                    <input type="date">
                    <span>
                        <label for="customer-delivery-no">No.</label>
                        <input type="text" id="customer-delivery-no" size="4" readonly>
                    </span>
                </div>
                <div>
                    <input type="text" id="customer-name">
                    <label for="customer-name">様</label>
                </div>
                <div>
                    下記のとおり納品いたしました
                </div>
            </div>

            <!-- 下部 -->
            <div>
                <table class="table table-bordered  border-dark  table-striped table-hover table-sm align-middle mb-0"">
                    <colgroup>
                        <col style=" width: 2%;">
                    <col style="width: 42%;">
                    <col style="width: 11%;">
                    <col style="width: 11%;">
                    <col style="width: 33%;">
                    </colgroup>
                    <thead class="table-dark table-bordered  border-light sticky-top">
                        <tr>
                            <th colspan="2">品名</th>
                            <th>数量</th>
                            <th>単価</th>
                            <th>
                                <span>金額(</span>
                                <input type="radio" name="price" id="price-excluded">
                                <label for="price-excluded">税抜</label>
                                <input type="radio" name="price" id="price-included">
                                <label for="price-included">税込)</label>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>日経コンピュータ 11月号</td>
                            <td>1</td>
                            <td>&yen;1300</td>
                            <td>&yen;1300</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>日経ネットワーク 11月号</td>
                            <td>1</td>
                            <td>&yen;1300</td>
                            <td>&yen;1300</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">合計</th>
                            <td>2</td>
                            <td></td>
                            <td>&yen;2600</td>
                        </tr>
                    </tfoot>
                </table>
                <table class="table table-bordered  border-dark  table-striped table-hover table-sm align-middle mt-0">
                    <colgroup>
                        <col style="width: 12%;">
                        <col style="width: 12%;">
                        <col style="width: 12%;">
                        <col style="width: 19%;">
                        <col style="width: 11%;">
                        <col style="width: 33%;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>税率</td>
                            <td>%</td>
                            <td>消費税率等</td>
                            <td></td>
                            <td>税込合計金額</td>
                            <td>&yen;2600</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <div class="mb-3 text-end">
                    <button type="button" id="openModal" class="btn btn-primary" onclick="showForm()">項目追加</button>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" id="delivery-cansel-button" class="btn btn-danger">戻る</button>
                    <button type="button" id="delivery-insert-button" class="btn btn-success">登録</button>
                </div>
            </div>
        </form>

        <!-- 納品登録フォーム -->
        <div class="modal fade" id="delivery-register-form" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">納品登録フォーム</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body d-flex">

                        <!--  検索フォーム  -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">注文書検索</h5>


                                <div class="mt-4">
                                    <div class="mb-3">
                                        <div>注文日</div>
                                        <input type="date" id="order-date-since" class="form-control"
                                            style="display: inline;">
                                        <label for="order-date-since" class="form-label">から</label><br>
                                        <input type="date" id="order-date-until" class="form-control"
                                            style="display: inline;">
                                        <label for="order-date-until" class="form-label">まで</label><br>
                                    </div>

                                    <input type="hidden" name="page" value="1">
                                    <input type="button" value="検索" class="btn btn-primary w-100"></button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <span>注文書</span>
                                    <input type="date">
                                    <span>
                                        <label for="customer-order-no">No.</label>
                                        <input type="text" id="customer-order-no" size="4" readonly>
                                    </span>
                                </div>
                                <div>
                                    <input type="text" id="customer-name">
                                    <label for="customer-name">様</label>
                                </div>
                                <div>
                                    下記のとおり御注文申し上げます
                                </div>
                            </div>
                            <div style="height: 180px; overflow-y: auto;">
                                <table
                                    class="table table-bordered border-dark table-striped table-hover table-sm align-middle">
                                    <colgroup>
                                        <col style="width: 2%;">
                                        <col style="width: 30%;">
                                        <col style="width: 3%;">
                                        <col style="width: 1%;">
                                        <col style="width: 3%;">
                                        <col style="width: 8%;">
                                        <col style="width: 24%;">
                                        <col style="width: 24%;">
                                    </colgroup>
                                    <thead class="table-dark table-bordered  border-light sticky-top">
                                        <tr>
                                            <th colspan="2">品名</th>
                                            <th colspan="3">数量</th>
                                            <th>単価</th>
                                            <th>摘要</th>
                                            <th>備考</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>週刊BCN 10/17</td>
                                            <td><input type="text" value="0"></td>
                                            <td>/</td>
                                            <td>1</td>
                                            <td>&yen;<input type="text" style="width: 80%;" value="363" readonly></td>
                                            <td></td>
                                            <td rowspan="15"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td></td>
                                            <td><input type="text" value="0"></td>
                                            <td>/</td>
                                            <td></td>
                                            <td>&yen;<input type="text" style="width: 80%;" readonly></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td></td>
                                            <td><input type="text" value="0"></td>
                                            <td>/</td>
                                            <td></td>
                                            <td>&yen;<input type="text" style="width: 80%;" readonly></td>
                                            <td></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td></td>
                                            <td><input type="text" value="0"></td>
                                            <td>/</td>
                                            <td></td>
                                            <td>&yen;<input type="text" style="width: 80%;" readonly></td>
                                            <td></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td></td>
                                            <td><input type="text" value="0"></td>
                                            <td>/</td>
                                            <td></td>
                                            <td>&yen;<input type="text" style="width: 80%;" readonly></td>
                                            <td></td>
                                        </tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                <!-- ページング -->
                                <div class="mb-3">
                                    <div class="text-center">
                                        <input type="button" value="←">
                                        <span></span>
                                        <input type="button" value="→">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                        <div class="text-end">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">登録確認</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- モーダル・JSのみ残す -->
    <div class="modal fade" id="delivery-insert" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">納品書を登録します</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div>本当に登録しますか？</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    <div class="text-end">
                        <a href="./納品管理.html"><button type="button" class="btn btn-success"
                                onclick="hideForm()">登録する</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delivery-cansel" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">納品書の作成を中断しますか？</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div>本当に中断して戻りますか？</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    <div class="text-end">
                        <a href="./納品管理.html"><button type="button" class="btn btn-danger"
                                onclick="hideForm()">戻る</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/delivery_register.js"></script>
</body>

</html>