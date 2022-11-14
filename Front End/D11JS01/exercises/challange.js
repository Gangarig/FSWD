 const text = "Properties,$a$set$of$immutable$values,$are$passed$to$a$components$renderer$as$properties$in$its $HTML$tag.$A$component$cannot$directly$modify$any$properties$passed$to$it,$but$can$be$passed$ callback$functions$that$do$modify$values.$This$mechanism's$promise$is$expressed$as$properties $flow$down;$actions$flow$up";
 let temp = Array();
 temp = text.split('$');
 console.log(temp);
 document.write(`${temp.join(" ")}`);
 
