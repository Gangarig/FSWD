let Martin = 76, Thomas = 85, Klaus = 65, Maria = 93, David = 81;
let avg = (Martin+Thomas+Klaus+Maria+David)/5;
if (avg >= 90) {
    document.write(` The average grade is A ${avg} `)
} else {
    if (avg >= 80) {
        document.write(` The average grade is B ${avg} `)
    } else {
        if (avg >= 70) {
            document.write(` The average grade is C ${avg} `)
        } else {
            if (avg >= 60) {
                document.write(` The average grade is D ${avg} `)
            }   else {
                document.write(` The average grade is F ${avg} `)
            }
        }
    }
}