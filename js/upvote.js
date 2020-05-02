document.querySelector(".upvote").addEventListener("click", (e) => {
    console.log("click upvote")
    upvote()
    e.preventDefault()
})

function upvote(){ 
    let upvote = document.querySelector(".upvote") 
    let upvotes = document.querySelector(".upvotes")
    let id = upvote.dataset.id
    console.log(id)
    
    const formData = new FormData()

    formData.append("id", id)

    fetch('ajax/upvote.php', {
        method: 'POST',
        body: formData
    })
    .then((response) => response.json())
    .then((result) => {
        console.log(result);
        if(result.status == "succes"){
            console.log(upvotes)
            upvotes.innerHTML = result.upvotes
        }
    })
    .catch((error) => {
        console.error('Error:', error)
    })
}