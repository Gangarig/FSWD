let array = [1,7,-3,9], max =0;
for ( let i = 0 ; i <= array.length ; i++) {
    if ( max <= array[i]) {
        max = array[i];
    }   else { }
}
document.write("highest value of arrya = ",max);