// // function required(element){
// //     console.log(element);
// // }
// // let element = "Text in title input"
// // let validator = {
// //     'required' : required(element),
// // }
// // let model = document.querySelector('.modal');
// //         title = model.querySelector('#title').value,
// //         type = model.querySelector('#type:checked').value,
// //         priority = model.querySelector('#priority:checked').value,
// //         status = model.querySelector('#status:checked').value,
// //         date = model.querySelector('#date').value,
// //         description = model.querySelector('#description').value;

// // function validate(element, required = null, max = null , min = null, type = null){
// //     if(required){
// //         console.log("this recored is required")
// //     }
// // }

// function validate(element,conditions){
//     if(element){
//         console.log("le element kayen");
//         if(conditions){
//             if(conditions.includes("required")){
//                 console.log("required");
//                 console.log(conditions)
//             }if(conditions.includes("min")){
//                 console.log(conditions.indexOf("min")) 
//             }if(conditions.includes("max")){
//                 console.log(conditions.indexOf("max")) 
//             }if(conditions.includes("type")){
//                 console.log(conditions.indexOf("type")) 
//             }else{ console.log("This condition not fond...") }
//         }else{ console.log("No Conditions") }
//     }else{ console.log("le element ga3e makayn ") }
// }
// function show(){
//     // let elements = [
//     //         title = "title input value",
//     //         description = "decription input value",
//     //         type = "type input value"
//     //         // ... all the inputs to validated
//     //     // ];
//     let elements = {
//             "title" : "title input value",
//             "description" : "decription input value",
//             "type" : "type input value",
//             // ... all the inputs to validated
//     };
//     for(let element in elements){
//         // console.log(elements[element]);
//         validate(elements[element] , ["required","min",30,"max",5,"type","nemeric"]);
//     }
//     // for(let element of elements){
//     //     validate(element , true , 200 , 4 , "string");
//     //     console.log(element);
//     // }
// }
// show();
// console.log(validator.required)
//////////////////////









// function required(element){
//     console.log(element);
// }
// let element = "Text in title input"
// let validator = {
//     'required' : required(element),
// }
// let model = document.querySelector('.modal');
//         title = model.querySelector('#title').value,
//         type = model.querySelector('#type:checked').value,
//         priority = model.querySelector('#priority:checked').value,
//         status = model.querySelector('#status:checked').value,
//         date = model.querySelector('#date').value,
//         description = model.querySelector('#description').value;

// function validate(element, required = null, max = null , min = null, type = null){
//     if(required){
//         console.log("this recored is required")
//     }
// }

function validate(element,conditions){
    if(element){
        console.log("le element kayen");
        let permissions = conditions.split("|");
        console.log(permissions);
        for(let permission of permissions){
            let nanoPermission = permission.split(":");
            if(nanoPermission.includes("min")){ console.log("min kayna") }
            if(nanoPermission.includes("max")){ console.log("max kayna") }
            console.log(nanoPermission)
        }
        // console.log(Per);
        if(conditions){
            if(conditions.includes("required")){
                console.log("required");
                console.log(conditions);
            }if(conditions.includes("min")){
                console.log(conditions.indexOf("min")) 
            }if(conditions.includes("max")){
                console.log(conditions.indexOf("max"));
            }if(conditions.includes("type")){
                console.log(conditions.indexOf("type"));
            }else{ console.log("This condition not fond...") }
        }else{ console.log("No Conditions") }
    }else{ console.log("le element ga3e makayn ") }
}
function show(){
    // let elements = [
    //         title = "title input value",
    //         description = "decription input value",
    //         type = "type input value"
    //         // ... all the inputs to validated
    //     // ];
    let elements = {
            "title" : "title input value",
            "description" : "decription input value",
            "type" : "type input value",
            // ... all the inputs to validated
    };
    for(let element in elements){
        // // console.log(elements[element]);
        // validate(elements[element] , ["required","min",30,"max",5,"type","nemeric"]);
        validate(elements[element] ,"required|min:5|max:50|type:string,nemeric");
    }
    // for(let element of elements){
    //     validate(element , true , 200 , 4 , "string");
    //     console.log(element);
    // }
}
show();
// console.log(validator.required)
