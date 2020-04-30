document.querySelector(".upvote").addEventListener("click", (e) => {
    console.log("click upvote")
    doUpvote()
    e.preventDefault()
})

function doUpvote(){  
    let id = $(this).data("id")
    let link = $(this)
    console.log(id)
    

    fetch('ajax/upvote.php', {
        method: 'POST',
        body: JSON.stringify({ id: id })
    })
    .then((response) => response.json())
    .then((result) => {
        console.log(result.status);
        if(result.status == "succes"){
            var upvotes = link.next().html()
            console.log(upvotes)
            upvotes++
            link.next().html(upvotes)
        }
    })
    .catch((error) => {
        console.error('Error:', error)
    })
    
   
}



