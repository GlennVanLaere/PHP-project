let btns = document.querySelectorAll(".click")

btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        console.log("click upvote")
        upvote()
        e.preventDefault()
    })

    function upvote() {

        let id = btn.dataset.id
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
                if (result.status == "succes") {
                    console.log(result.currentUpvotes)
                    btn.innerHTML = result.currentUpvotes + " upvotes"
                } else if (result.status == "fail") {
                    console.log(result.message)
                    btn.innerHTML = result.currentUpvotes + " upvotes"
                }
            })
            .catch((error) => {
                console.error('Error:', error)
            })
    }

})
