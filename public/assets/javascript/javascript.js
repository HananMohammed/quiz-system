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
})