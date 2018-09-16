<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" rel="stylesheet" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="./js/ajax_call.js"></script>
    <title>Todo</title>
</head>

<body>
    <div class="container">
        <h2>Todo list</h2>
        <input type="text" id="text" placeholder="Todo item" />
        <input type="button" id="add" value="Add new item" />
        <span>
            <p id="error"></p>
        </span>

        <ul id="item_container">
        </ul>
    </div>

    <script>
        $(document).ready(() => {
            $("#add").on("click", () => {
                if ($("#text").val() == "") {
                    $("#error").html("Todo item cant be empty").slideDown(400);
                    setTimeout(() => { $("#error").slideUp(400) }, 3000);
                } else {
                    addNewItem();
                }
            });

            loadTODOitems();
        });
    </script>

</body>
</html>