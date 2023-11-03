function addRating() {
const allStars = document.querySelectorAll('.user_star');
allStars.forEach((star, i) => {
    star.onclick = function() {
        let curr_star_lvl = i + 1;

        allStars.forEach((star, j)=> {
            if(curr_star_lvl >= j+1)
            {
                star.innerHTML = '&#9733';
            } else {
                star.innerHTML = '&#9734';
            }

            
        })

    }
})
}

function bookmark() {
                const bookmark = document.getElementsByClassName("bookmark_image")[0];
                if(bookmark.getAttribute("src") == "http://localhost/expt4/bookmark.png"){
                    bookmark.src = "http://localhost/expt4/bookmark_selected.png";
                } else if(bookmark.getAttribute("src") == "http://localhost/expt4/bookmark_selected.png") {
                    bookmark.src = "http://localhost/expt4/bookmark.png";
                }
            }
