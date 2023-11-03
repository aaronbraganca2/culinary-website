function addRating() {
    var url = window.location.pathname;
    var filename = url.substring(url.lastIndexOf('/')+1);


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
    });

    $.post("http://localhost/expt4/register_rating.php",
    {
        filename: filename,
        curr_star_lvl: curr_star_lvl
    })

}
})

}