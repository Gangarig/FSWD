let data = JSON.parse(employee);
for (let list of data) {
    document.getElementById("test").innerHTML +=`
    <tr>
        <td id="id">${list.uniqueId}</td>
        <td id="fname">${list.first_Name}</td>
        <td id="lname">${list.lastName}</td>
        <td id="eaddress">${list.emailAdress}</td>
        <td id="jtitle">${list.jobTitle}</td>
        <td id="salary">${list.salary}</td>   
    </tr>`
    
}


// "uniqueId": "00001",
// "first_Name":"Ganaa",
// "lastName":"Nyamsuren",
// "emailAdress":"ganaa@email.com",
// "jobTitle":"student",
// "salary":"100000$"