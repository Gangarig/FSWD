let temp = Math.floor(Math.random()*40)-5;
let image = document.createElement('img');
let text = document.createElement('phrase');

if (temp < 20) {
    if ( temp < 10) {
    let h1 = document.createElement("h1");
    h1.innerHTML =`The weather is extreme cold: ${temp}`; 
    image.src = '/ext' 
    } else {
    let h1 = document.createElement("h1");
    h1.innerHTML =`The weather is Moderate: ${temp}`   
    }
    } else {
    if (temp < 30) {
    let h1 = document.createElement("h1");
    h1.innerHTML =`The weather is warm: ${temp}`;
    } else {
    let h1 = document.createElement("h1");
    h1.innerHTML =`The weather is extreme hot: ${temp}`;     
    }
}
// let image = document.createElement('img');
// let phrase = document.createElement('phrase');

// let randomNumb = Math.floor(Math.random()*70 -6) ;
//     document.write(randomNumb);
//     if (randomNumb > 10 && randomNumb < 32) {
//         phrase.phrase = ("The weather is moderate")
//         image.src = 'images/wetter.jpg';
//         image.setAttribute("class","img")
//         document.body.append (image);
//     } else if (randomNumb < 10) {
//         document.write("The weather is cold.")
//         image.src = 'images/cold.webp';
//         document.body.append (image);
//         image.setAttribute("class","img")
//     } else {
//        document.write("The weather is hot");
//        image.src = 'images/hot.jpg';
//        document.body.append (image);
//        image.setAttribute("class","img")
//     }   