function myFunction(x){
    let y = x.nextElementSibling;
    if(y.style.display === "none"){
        y.style.display = "block";
    }else{
        y.style.display = "none";

        }
    }
    function myFunction2(x){
        x.style.cursor="pointer";
    }
    function myFunction3(x){
        x.style.cursor="auto";
    }
    function showSelected(x) {
        x.style.cursor="pointer";
        x.style.color="grey";
        x.style.textDecoration="underline";
    }
    function showOriginal(x) {
        x.style.cursor="auto";
        x.style.color="black";
        x.style.textDecoration="none";
    }
