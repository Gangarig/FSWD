// Iterate through the array of books. For each book, create a <p> element with the book title and author and append it to the page.
// Each book should have an image cover.
// Change the style of the book depending on whether you have read it or not.
// let data = `[
//     {   "title":"Animal Farm",
//         "author":"George Orwel",
//         "read":"true",
//         "Img":"animalfarm.jpg"
//     },     
//     {   "title":"Harry Potter",
//         "author":"J.K Rowling",
//         "read":"false",
//         "Img":"Harrypotter.jpg"
//     },    
//     {   "title":"Lord of The Rings",
//         "author":"J.R.R Tolkein",
//         "read":"true",
//         "Img":"LOTR.jpg"
//       }]`;
let books = JSON.parse(data);
for (let book of books) {
    document.getElementById("content").innerHTML += `
    <div class="bookbox">
    <p><u> Title is ${book.title}</u></p><br>
    <p> Author is ${book.author}</p><br>
    <img src="${book.Img}" alt=""><br>
    </div>
    `;
}