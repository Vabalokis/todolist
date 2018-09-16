const loadTODOitems = () => {
    
    $("#item_container").html("");

    $.post("./db/db_item_list_get.php", all_data => {

        const data = JSON.parse(all_data);
        let itemlist = "";
        let isChecked = "";
        let checkSymbol;
    
        for (let i = 0; i < data.length; i++) {
            checkSymbol = "<span id='check' onClick='setState(" + data[i]['id'] + " , 1)' class='point'><i class='fas fa-check'></i></span>";
            isChecked = "";

            if (data[i]["is_checked"] == "1") {
                isChecked = " class='checked' " ;
                checkSymbol = "";
            } 

            if (data[i]["is_archived"] == "0") {
                itemlist +=
                "<li " + isChecked + ">" +
                    "<p>" + data[i]["item_text"] + "</p>" +
                    checkSymbol +
                    "<span id='archive' onClick='setState(" + data[i]['id'] + " , 0)' class='point'><i class='fas fa-times'></i></span>" +  
                "</li>";
            }
        }
        
        $("#item_container").html(itemlist);
      });
}

const setState = (id , state) => { // state=1 - mark , state=0 - archive(remove)

     if(state == 1) {
         request = "./db/db_item_mark.php"
         data = {checked_id: id};
     } else {
         request = "./db/db_item_archive.php"
         data = {archived_id: id};
     }

    $.ajax({
        url: request,
        data: data,
        type: "post",
        success: function(response) {
          if (response) {
            loadTODOitems();
            console.log("done");
          } else {
            alert("Failed to change state !");
            return false;
          }
        }
      });
}

const addNewItem = () => {
    $.ajax({
        url: "./db/db_item_add.php",
        data: {text: $("#text").val() },
        type: "post",
        success: function(response) {
          if (response) {
            $("#text").val("");
            loadTODOitems();
          } else {
            alert("Failed to add item !");
            return false;
          }
        }
      });
}
