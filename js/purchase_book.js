document.addEventListener("DOMContentLoaded", function() {
    let popup = document.getElementById("payment-popup");
    let closeBtn = document.querySelector(".close-btn");

    document.querySelectorAll(".purchase-btn").forEach(button => {
        button.addEventListener("click", function() {
            let bookId = this.getAttribute("data-id");

            // Fetch book details
            fetch(`../actions/get_book.php?id=${bookId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        document.getElementById("popup-title").textContent = data.title;
                        document.getElementById("popup-author").textContent = "Author: " + data.author;
                        document.getElementById("popup-price").textContent = "Price: $" + data.price;
                        document.getElementById("popup-book-id").value = bookId;

                        popup.style.display = "block";
                    }
                })
                .catch(error => console.error("Error fetching book details:", error));
        });
    });

    closeBtn.addEventListener("click", function() {
        popup.style.display = "none";
    });
});
