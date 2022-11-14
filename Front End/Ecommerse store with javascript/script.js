let courses = JSON.parse(coursesJson);
console.log(courses);

for (let course of courses) {
    document.getElementById("demo").innerHTML += `
        <div class="content">
            <p>${course.id}</p>
            <p>${course.language}</p>
            <p>${course.edition}</p>
            <div><img src="images/${course.img}" width="100%"></div>
            <p class="register-amount">${course.register}</p>
            <input type="submit" value="register" class="register-btn">
        </div>
    `;
}


function register(index) {
    if (courses[index].register != 10) {
        courses[index].register++;
        document.getElementsByClassName("register-amount")[index].innerHTML = courses[index].register;
    }
}


let register_btns = document.getElementsByClassName("register-btn");

for (let i = 0; i < register_btns.length; i++) {
    register_btns[i].addEventListener("click", function() {
        register(i); // register(0);  register(1)
    })
}


document.getElementById("sort").onclick = sortByRegisterValue;


// document.getElementsByClassName("register-btn")[0].onclick = function() {
//     courses[0].register++;  0  => 1 from the first object
//     document.getElementsByClassName("register-amount")[0].innerHTML = courses[0].register; // update new value to HTML
// }


// document.getElementsByClassName("register-btn")[1].onclick = function() {
//     courses[1].register++;
//     document.getElementsByClassName("register-amount")[1].innerHTML = courses[1].register;
// }

// document.getElementsByClassName("register-btn")[2].onclick = function() {
//     courses[2].register++;
//     document.getElementsByClassName("register-amount")[2].innerHTML = courses[2].register;
// }

// document.getElementsByClassName("register-btn")[3].onclick = function() {
//     courses[3].register++;
//     document.getElementsByClassName("register-amount")[3].innerHTML = courses[3].register;
// }

// document.getElementsByClassName("register-btn")[4].onclick = function() {
//     courses[4].register++;
//     document.getElementsByClassName("register-amount")[4].innerHTML = courses[4].register;
// }

// document.getElementsByClassName("register-btn")[5].onclick = function() {
//     courses[5].register++;
//     document.getElementsByClassName("register-amount")[5].innerHTML = courses[5].register;
// }







// let courses = JSON.parse(coursesJson);
// console.log(courses);

// function updateHTML() {
//     for (let course of courses) {
//         document.getElementById("demo").innerHTML += `
//         <div class="content">
//             <p>${course.id}</p>
//             <p>${course.language}</p>
//             <p>${course.edition}</p>
//             <div><img src="images/${course.img}" width="100%"></div>
//             <p class="register-amount">${course.register}</p>
//             <input type="submit" value="register" class="register-btn">
//         </div>
//     `;
//     }
// }
// updateHTML();
// addEvent();

// function register(index) {
//     if (courses[index].register != 10) {
//         courses[index].register++;
//         document.getElementsByClassName("register-amount")[index].innerHTML = courses[index].register;
//     }
// }

// function addEvent() {
//     let register_btns = document.getElementsByClassName("register-btn");

//     for (let i = 0; i < register_btns.length; i++) {
//         register_btns[i].addEventListener("click", function() {
//             register(i); // register(0);  register(1)
//         })
//     }

// }


// document.getElementById("sort").onclick = sortByRegisterValue;

// function sortByRegisterValue() {
//     courses.sort((a, b) => b.register - a.register);

//     document.getElementById("demo").innerHTML = "";
//     updateHTML();
//     addEvent();

// }


// // document.getElementsByClassName("register-btn")[0].onclick = function() {
// //     courses[0].register++;
// //     document.getElementsByClassName("register-amount")[0].innerHTML = courses[0].register;
// // }


// // document.getElementsByClassName("register-btn")[1].onclick = function() {
// //     courses[1].register++;
// //     document.getElementsByClassName("register-amount")[1].innerHTML = courses[1].register;
// // }

// // document.getElementsByClassName("register-btn")[2].onclick = function() {
// //     courses[2].register++;
// //     document.getElementsByClassName("register-amount")[2].innerHTML = courses[2].register;
// // }

// // document.getElementsByClassName("register-btn")[3].onclick = function() {
// //     courses[3].register++;
// //     document.getElementsByClassName("register-amount")[3].innerHTML = courses[3].register;
// // }

// // document.getElementsByClassName("register-btn")[4].onclick = function() {
// //     courses[4].register++;
// //     document.getElementsByClassName("register-amount")[4].innerHTML = courses[4].register;
// // }

// // document.getElementsByClassName("register-btn")[5].onclick = function() {
// //     courses[5].register++;
// //     document.getElementsByClassName("register-amount")[5].innerHTML = courses[5].register;
// // }