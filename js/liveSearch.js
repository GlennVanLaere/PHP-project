document.querySelector("#searchBox").addEventListener("keyup", function() {
    let category = document.querySelector("#category").value;
    let searchTerm = document.querySelector("#searchBox").value;
    document.getElementById('searchResults').innerHTML = "";
    if (searchTerm != "") 
    {
        $.ajax({
            method: "POST",
            url: "ajax/searchUser.php", 
            data: { 
                category: category,
                searchTerm: searchTerm,
            },
            dataType: "JSON" 
        }).done(function(res) {
            for(i=0;i<res.length; i++){
                document.getElementById('searchResults').innerHTML += '<a href="public.php?id='+ res[i].id + '">' + res[i].firstName+'</a>';
            }
        });
    }
});