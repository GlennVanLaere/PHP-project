document.querySelector(".upvote").addEventListener("click", (e) => {
    console.log("click upvote")
    doUpvote()
    e.preventDefault()
})

function doUpvote(){  
    const upvote = document.querySelector(".upvote")
    let id = upvote.dataset.value
    let link = $(this)
    console.log(id)
    
    const formData = new FormData()

    formData.append("id", id)

    fetch('ajax/upvote.php', {
        method: 'POST',
        body: form
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



