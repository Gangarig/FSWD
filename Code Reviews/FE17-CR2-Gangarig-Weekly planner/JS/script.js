let tasks = JSON.parse(tasksJson);
console.log(tasks);
// Outputtin Columns with loop
    for (let i=0,index=0; index < tasks.length;index++) {
        i++;
        document.getElementById("grid").innerHTML += `
                <div class="border m-3 shadow p-3 mb-5 rounded col-xxl-3 col-xl-3 col-lg-5 col-md-5 col-sm-12 col-12">
                    <button type="button" class="m-2 btn btn-info">Task</button>
                    <div>
                    <img class="figure-img img-fluid rounded image" src="../Images/${tasks[index].image}" alt="">
                    </div>
                    <div class="text-center">
                    <p><b>${tasks[index].taskName}</b></p>
                    <p>${tasks[index].description}</p>
                    </div>
                    <hr>
                    <p>Deadline: ${tasks[index].Date}</p>
                    <div class="infline-flex">
                    Priority level:<span class="level_value bg-success"><b>--  ${tasks[index].importance}--</b>   </span><br>
                    <input type="submit" value="add importance" class="fs-6 btn btn btn-outline-secondary priority-btn">
                    </div>
                    <hr>
                    <div class="d-flex flex-row-reverse">
                    <button type="button" class="m-1 btn btn-success">Done</button>
                    <button type="button" class="m-1 btn btn-danger">Delete</button>
                    </div>
                </div>
            <br>`;
            
    }
    // Color change depending on importance level
    function importance(level) {
        if (tasks[level].importance != 5) {
            tasks[level].importance++;
            if(`${tasks[level].importance}` >= 4) {             
                document.getElementsByClassName("level_value")[level].innerHTML = `<span class="bg-danger">--${tasks[level].importance}-- </span>  `;
            } else if(`${tasks[level].importance}` >=2 ) {
                document.getElementsByClassName("level_value")[level].innerHTML = `<span class="bg-warning">--${tasks[level].importance}-- </span> `;
           } else {
                document.getElementsByClassName("level_value")[level].innerHTML = `<span class="bg-success">--${tasks[level].importance}-- </span> `;
           }
            
        }}

    let priority_btns = document.getElementsByClassName("priority-btn");
    for (let i = 0; i < priority_btns.length; i++) {
            priority_btns[i].addEventListener("click", function() {
                importance(i); 
            })
        }



  

    // Btn that calls function to output importance value to the browser

// let priority_btns = document.getElementsByClassName("priority-btn");

// for (let i = 0; i < priority_btns.length; i++) {
//             priority_btns[i].addEventListener("click", function() {
//                 importance(i); 
//             })
//         }


    // Sorting algorithm //doesnt work
    tasks.sort(function(a, b){
        return a.importance - b.importance;
    });
    console.log(tasks);
    document.getElementById("sortbtn").onclick =  tasks.sort(function(a, b){
        return a.importance - b.importance;
    });
