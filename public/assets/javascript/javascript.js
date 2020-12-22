$(document).ready(function (){
    //Delete Student
    $(".deleteStudent").on("click", function (event) {
        event.preventDefault();
        let clickedBtn = event.target.parentElement;
        let action = clickedBtn.getAttribute("href");
        $.ajax({
            url: action,
            type: "POST",
            cache: false,
            success: function (response) {
                $("#alertSuccess").css("display","block");
                console.log("Success"+response);
            },
            error: function(errors) {
                $("#alertFail").css("display","block");
                console.log("fail:"+ errors);

            }

        })
        clickedBtn.parentElement.parentElement.remove();
    })

    //Delete Quiz
    $(".deleteQuiz").on("click", function (event) {
        event.preventDefault();
        let clickedBtn = event.target.parentElement;
        let action = clickedBtn.getAttribute("href");
        $.ajax({
            url: action,
            type: "POST",
            cache: false,
            success: function (response) {
                $("#alertSuccess").css("display","block");
                console.log("Success"+response);
            },
            error: function(errors) {
                $("#alertFail").css("display","block");
                console.log("fail:"+ errors);

            }

        })
        clickedBtn.parentElement.parentElement.remove();
    })
    //Delete Question
    $(".deleteQuestion").on("click", function (event) {
        event.preventDefault();
        let clickedBtn = event.target.parentElement;
        let action = clickedBtn.getAttribute("href");
        $.ajax({
            url: action,
            type: "POST",
            cache: false,
            success: function (response) {
                $("#alertSuccess").css("display","block");
                console.log("Success"+response);
            },
            error: function(errors) {
                $("#alertFail").css("display","block");
                console.log("fail:"+ errors);

            }

        })
        clickedBtn.parentElement.parentElement.remove();
    })

    //Fetch Question Answers
    $("#choice1").change(function(event){
        let choice1 = event.target.value ;
        $("#correct_answer").append(`<option value="${choice1}">${choice1}</option>`)
    });
    $("#choice2").change(function(event){
        let choice2 = event.target.value ;
        $("#correct_answer").append(`<option value="${choice2}">${choice2}</option>`)
    });
    $("#choice3").change(function(event){
        let choice3 = event.target.value ;
        $("#correct_answer").append(`<option value="${choice3}">${choice3}</option>`)
    });
    $("#choice4").change(function(event){
        let choice4 = event.target.value ;
        $("#correct_answer").append(`<option value="${choice4}">${choice4}</option>`)
    });

    //Options od Edit Question Answers
    let editchoice1 = $("#editChoice1").val();
    let editchoice2 = $("#editChoice2").val();
    let editchoice3 = $("#editChoice3").val();
    let editchoice4 = $("#editChoice4").val();
    $("#edit_correct_answer").append(`
            <option value="${editchoice1}">${editchoice1}</option>
            <option value="${editchoice2}">${editchoice2}</option>
            <option value="${editchoice3}">${editchoice3}</option>
            <option value="${editchoice4}">${editchoice4}</option>
        `);
    //Fetch Question Answers
    $("#editChoice1").change(function(event){
        let editChoice1 = event.target.value ;
        $("#correct_answer").append(`<option value="${editChoice1}">${editChoice1}</option>`)
    });
    $("#editChoice2").change(function(event){
        let editChoice2 = event.target.value ;
        $("#correct_answer").append(`<option value="${editChoice2}">${editChoice2}</option>`)
    });
    $("#editChoice3").change(function(event){
        let editChoice3 = event.target.value ;
        $("#correct_answer").append(`<option value="${editChoice3}">${editChoice3}</option>`)
    });
    $("#editChoice4").change(function(event){
        let editChoice4 = event.target.value ;
        $("#edit_correct_answer").append(`<option value="${editChoice4}">${editChoice4}</option>`)
    });

    //Select 2
    $('#totalQuestions').select2();
    var last_valid_selection = null;
    $('#totalQuestions').change(function(event) {

        if ($(this).val().length > 30) {

            $(this).val(last_valid_selection);
        } else {
            last_valid_selection = $(this).val();
        }
    });


})