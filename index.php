<?php
    require_once "template/header.php";
    require_once "db/CreateDb.php";
    $db = CreateDb::getInstance();
    $formuls = $db->query("SELECT * FROM formuls");

?>

    <main class="wrap">
        <div class="table-formuls">
            <table class="table table-dark table-striped tb-formuls">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Number</th>
                    <th scope="col">Formula</th>
                    <th scope="col">Var one</th>
                    <th scope="col">Var two</th>
                    <th scope="col">Results</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        while ($formula = $formuls->fetchArray(SQLITE3_ASSOC)) {
                            echo "<tr>
                                    <th scope='row' class='formula-id'>" .$formula['id'] . "</th>
                                    <td>" . $formula['number']  . "</td>
                                    <td>" . $formula['formula'] . "</td>
                                    <td>
                                        <input type='text' class='form-control variable_one' value='" . $formula['var_one'] . "'>
                                    </td>
                                    <td>
                                        <input type='text' class='form-control variable_two' value='" . $formula['var_two'] . "'>
                                    </td>                                    
                                    <td class='result'>" . ($formula['var_one'] + $formula['var_two']) . "</td>
                                 </tr>";
                        }
                        ?>

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">Вывод данных из таблицы</td>
                </tr>
                </tfoot>
            </table>
            <div class="navigation">

            </div>
        </div>
    </main>

<?php
    require_once "template/footer.php";
?>







