
$(document).ready(function (event) {
    $(".variable_one").focusout(function (e) {
        e.stopImmediatePropagation();
        var number = parseInt(this.value);
        if(isNaN(number)){
            console.log("введите число");
            return false;
        }

        var parent_container = $(this).parent().parent();
        var number_two = parseInt(parent_container.find(".variable_two").val());
        parent_container.find('.result').text(number + number_two);

        var id = parseInt(parent_container.find(".formula-id").text());
        
        $.ajax({
            type:"POST",
            url:"/Formulaupdate.php",
            data:{
                'id':id,
                'var_one':number
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

    $(".variable_two").focusout(function (e) {
        e.stopImmediatePropagation();
        var number = parseInt(this.value);
        if(isNaN(number)){
            $('.information')
                .append("<p>Введите число</p>")
                .css({'color':'red', "font-size":"16px"});
            return false;
        }

        var parent_container = $(this).parent().parent();
        var number_one = parseInt(parent_container.find(".variable_one").val());
        parent_container.find('.result').text(number + number_one);
        var id = parseInt(parent_container.find(".formula-id").text());

        $.ajax({
            type:"POST",
            url:"Formulaupdate.php",
            data:{
                'id':150,
                'var_two':number
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

    // $('.clear-information').click(function (e) {
    //     e.stopImmediatePropagation();
    //     $('.information').empty();
    // });
    //
    // function getData() {
    //     const d = $.Deferred();
    //     $.ajax({
    //         type:"POST",
    //         url:"/Formuls.php",
    //         success:function (data) {
    //             d.resolve(data)
    //         },
    //         error:function (err) {
    //             d.reject(err);
    //         }
    //     });
    //     return d;
    // }
    //
    // const asyncObject = getData();
    //
    // $.fn.dataTable.ext.order['dom-text'] = function  ( settings, col )
    // {
    //     console.log("11111");
    //     return;
    //     return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
    //         return $('input', td).val();
    //     } );
    // };
    //
    // asyncObject.done(function (data) {
    //     var dataTable = JSON.parse(data);
    //     $('#example').DataTable({
    //         data: dataTable,
    //         columns: [
    //             { title: "ID" },
    //             { title: "Number" },
    //             { title: "Formula" },
    //             { title: "Var one", "defaultContent": '<input type="text" value="0" size="10"/>'},
    //             { title: "Var two" },
    //             { title: "Results" }
    //         ]
    //     } );
    //
    // }).fail(function (err) {
    //    console.log(err);
    // });

});




