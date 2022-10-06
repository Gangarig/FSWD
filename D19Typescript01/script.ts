
// let text : string = "Hello world!";
// console.log(text);
// let firstname : string= "30";
// let grade : number = 55;
// let names : string [] = ["John","Mary","David"];
// let arrayMix : any[] = [1,"test","false"];
// let products: Array<{ name:string, price:number, qtty?:number}> =[
//     {
//         name:"Hat",
//         price:50
//     },{
//         name:"glass",
//         price:10,
//         qtty:80
//     }
// ];
// let num : number =30;
// if (num == 30) {
//     num=50;
//     console.log(num); //50
// }
// console.log(num); //30


let names: Array<string> = ["John","David","Johannes","Mary"];



// for(let name of names ){
//     console.log(name);
    
// };

// for (let index in names){
//     console.log(names[index]);
// }
// names.forEach(function(name){
//     console.log(name);
// });
// foreach forof forin need an array
// for( let i:number = 0; i<names.length ; i++){
//     console.log(names[i]);
// }
//  for (let index in names) {
//     console.log(index,names[index]);
//  }
//  names.forEach(function (val:string , index:number){
//     console.log(val,index);
//  });
 

 const greeting: (name? : any) =>void = function(name) {
    if(name){
        console.log("General "+name);
    }  else {
        console.log("Hello there ");
    }
 }
 greeting("Ganaa");
 greeting("");

 setTimeout(()=>{
    greeting();
 },5000);

 setInterval(function(){
    greeting("Ganaa");
 },3000);