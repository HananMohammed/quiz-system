<?php
$script =  URL_ROOT."/public/assets/javascript/javascript.js" ;

?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src=<?php echo $script ?>></script>
<script>
    $(document).ready(function() {
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
    });
</script>
</body>
</html>