<?php

    require_once "template/header.php";
    require_once "db/CreateDb.php";

    $db = CreateDb::getInstance();
    $formuls = $db->query("SELECT * FROM formuls");

?>

    <main class="wrap">
        <div class="table-formuls">

        </div>

        <div class="row data-container">
            <div class="col-12 data-user">
                <div class="row">
                    <div class="col-4" id="list">
                        <div class="form-group">
                            <label for="sel1">Загрузить данные</label>
                            <select class="form-control" id="sell">
                                <option value="baseline">Исходные данные</option>
                                <option value="custom">Пользовательские данные</option>
                            </select>
                        </div>
                    </div>\
                    <div class="col-4">
                        <div class="form-group input-var-one mb-3">
                            <div class="input-group-prepend span-input-var-one">
                                <span class="input-group-text" id="inputGroup-sizing-default">Введите значение var_one</span>
                            </div>
                            <input type="text" class="form-control input-one" value="" placeholder="Enter var_one">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group input-var-two mb-3">
                            <div class="input-group-prepend span-input-var-two">
                                <span class="input-group-text" id="inputGroup-sizing-default">Введите значение var_two</span>
                            </div>
                            <input type="text" class="form-control input-two" value="" placeholder="Enter var_two">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

<?php
    require_once "template/footer.php";
?>

