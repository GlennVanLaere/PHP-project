document.querySelector("#searchBox").addEventListener("keyup", function() {
    let category = document.querySelector("#category").value;
    let searchTerm = document.querySelector("#searchBox").value;
    let changeIt = document.getElementById('searchResults');
    changeIt.innerHTML = "";
    if (searchTerm != "") {
        $.ajax({
            method: "POST",
            url: "ajax/searchUser.php", 
            data: { 
                category: category,
                searchTerm: searchTerm,
            },
            dataType: "JSON" 
        }).done(function(res) {
            if( (res.lenght != 0) && (category != '') ){
                changeIt.style.visibility = 'visible';
                for(i=0;i<res.length; i++){
                    changeIt.innerHTML += '<a href="public.php?id='+ res[i].id + '" class="searchItem">' + res[i].firstName + ' -> go to profile' + '</a>';
                }
            } else if( (res.lenght != 0) && (category == '') )
            {
                changeIt.style.visibility = 'visible';
                changeIt.innerHTML += '<p>Choose a category!</p>';
            }
        });
    }
});