
$(document).ready(function (event) {
    var formuls = {
      getData: function (typeData) {
          var user = $('.login-user').text();

          $.ajax({
              type:'POST',
              url:"/getFormuls.php",
              data:{
                  type:typeData,
                  user: user
              },
              success:function (data) {
                  $('.table-dark').remove();
                  $('<table>').appendTo('.table-formuls').addClass('table table-dark table-striped tb-formuls');
                  $('<thead>').appendTo('.table-dark');
                  $('<tbody>').appendTo('.table-dark');
                  $('<tfoot>').appendTo('.table-dark');
                  $('<tr>').appendTo('.table-dark thead');
                  $('<th scope="col">ID</th>').appendTo('.table-dark thead tr');
                  $('<th scope="col">Number</th>').appendTo('.table-dark thead tr');
                  $('<th scope="col">Formula</th>').appendTo('.table-dark thead tr');
                  $('<th scope="col">Var one</th>').appendTo('.table-dark thead tr');
                  $('<th scope="col">Var two</th>').appendTo('.table-dark thead tr');
                  $('<th scope="col">Results</th>').appendTo('.table-dark thead tr');
                  $('<tr><td colspan="2">Вывод данных из таблицы</td></tr>').appendTo('.table-dark tfoot');

                  var dataFormul = JSON.parse(data);

                  dataFormul.forEach(function (formula) {
                      $('<tr>' +
                          "<th scope='row' class='formula-id'>" +
                          formula.id + '</th>' +
                          "<td class='number'>" + formula.number + "</td>" +
                          "<td class='formula'>" + formula.formula + "</td>" +
                          "<td><a href='#' class='badge badge-success variable_one'>" + formula.var_one + "</a>" +
                          "</td>" +
                          "<td><a href='#' class='badge badge-success variable_two'>" + formula.var_two + "</a>" +
                          "</td>" +
                          "<td class='result'>" + (formula.var_one + formula.var_two) +"</td>" +
                          '</tr>').appendTo('.table-dark tbody');
                  });

              },
              error:function (error) {
                  console.log(error);
              }
          });
          
      }

    };

    formuls.getData('baseline');

    $('#sell').change(function (e) {
        var selectType = $("#sell option:selected").val();
        formuls.getData(selectType);
    });


    $(".table-formuls").on("click",'.variable_one', function (e) {
        e.stopImmediatePropagation();

        var number = parseInt(this.innerText);

        if(isNaN(number)){
            console.log("введите число");
            return false;
        }

        var login = document.getElementsByClassName('card-title login-user')[0].innerText;

        var parent_container = $(this).parent().parent();

        var number_two = parseInt(parent_container.find(".variable_two")[0].innerText);

        var formula = parent_container.find(".formula").text();
        var numberFormula = parseInt(parent_container.find(".number").text());

        var id = parseInt(parent_container.find(".formula-id").text());

        var numberOneInput = $('.input-one').val();

        if(numberOneInput === ''){
            console.log("введите число");
            return false;
        }else{
            number = numberOneInput;
        }

        var numberTwoInput = $('.input-two').val();

        if(numberTwoInput !== ''){
            number_two = numberOneInput;
        }

        $.ajax({
            type:"POST",
            url:"/Formulaupdate.php",
            data:{
                'id': id,
                'var_one': number,
                'var_two': number_two,
                'number': numberFormula,
                'formula': formula,
                'login': login
            },
            success:function (data) {
                $('.information')
                    .append("<p>" + data.success + "</p>")
                    .css({'color':'green', "font-size":"16px"});
            },
            error:function (data) {
                $('.information')
                    .append("<p>" + data.error + "</p>")
                    .css({'color':'red', "font-size":"16px"});
            }
        });

        return false;
    });

    $(".table-formuls").on("click",'.variable_two', function (e) {
        e.stopImmediatePropagation();

        var number = parseInt(this.innerText);
        if(isNaN(number)){
            $('.information')
                .append("<p>Введите число</p>")
                .css({'color':'red', "font-size":"16px"});
            return false;
        }
        var login = document.getElementsByClassName('card-title login-user')[0].innerText;
        var parent_container = $(this).parent().parent();
        var number_one = parseInt(parent_container.find(".variable_one")[0].innerText);
        var formula = parent_container.find(".formula").text();
        var numberFormula = parseInt(parent_container.find(".number").text());
        var id = parseInt(parent_container.find(".formula-id").text());

        var numberTwoInput = $('.input-two').val();

        if(numberTwoInput === ''){
            console.log("введите число");
            return false;
        }else{
            number = numberTwoInput;
        }

        var numberOneInput = $('.input-one').val();
        if(numberOneInput !== ''){
            number_one = numberOneInput;
        }



        $.ajax({
            type:"POST",
            url:"Formulaupdate.php",
            data:{
                'id': id,
                'var_one': number_one,
                'var_two': number,
                'number': numberFormula,
                'formula': formula,
                'login': login
            },
            success:function (data) {
                $('.information')
                    .append("<p>" + data.success + "</p>")
                    .css({'color':'green', "font-size":"16px"});
            },
            error:function (data) {
                $('.information')
                    .append("<p>" + data.responseJSON.error + "</p>")
                    .css({'color':'red', "font-size":"16px"});
            }
        });

        return false;
    });

});

/*
dataFormul.forEach(function (formula) {
                      $('<tr>' +
                          "<th scope='row' class='formula-id'>" +
                          formula.id + '</th>' +
                          "<td class='number'>" + formula.number + "</td>" +
                          "<td class='formula'>" + formula.formula + "</td>" +
                          "<td><input type='text' class='form-control variable_one' value=" + formula.var_one + ">" +
                          "</td>" +
                          "<td><input type='text' class='form-control variable_two' value=" + formula.var_two + ">" +
                          "</td>" +
                          "<td class='result'>" + (formula.var_one + formula.var_two) +"</td>" +
                          '</tr>').appendTo('.table-dark tbody');
                  });
*/
