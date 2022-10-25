/**
 * In this file app.js you will find all CRUD functions name.
 * 
 */
function starter(){
    document.querySelector("form").reset();
    $('#modal-task').modal('hide');
}

$('#add-task').on('click' , function(){
    document.querySelector("form").reset();
    $('#update-btn').hide(function(){
        $("#delete").hide("slow");
        $("#save").show("slow");
    });
});

//---- Add Tasks ----//
function add(){
    let model = document.querySelector('.modal');
        title = model.querySelector('#title').value,
        type = model.querySelector('#type:checked').value,
        priority = model.querySelector('#priority').value,
        status = model.querySelector('#status').value,
        date = model.querySelector('#date').value,
        description = model.querySelector('#description').value;
    var selector ;
    status == "To Do" ? selector = "to-do-parent" : status == "In Progress" ? selector =  "in-progress-parent" : selector = "done-parent";
    let add = {
                'id'            :   tasks.length - 1,
                'title'         :   title,
                'type'          :   type,
                'priority'      :   priority,
                'status'        :   status,
                'date'          :   date,
                'description'   :   description
            };
    tasks.push(add);
    starter();
    // show(tasks , selector , status);
    
    // Not A Good Solition
        let Elparent = document.querySelector("#" + selector),
            Elchild = Elparent.querySelector("#tasks"),
            Elpointer = Elparent.querySelector('#key'),
            Eltitle = Elchild.querySelector('#title'),
            Eldate = Elchild.querySelector('#date'),
            Eldescription = Elchild.querySelector('#description'),
            Elpriority = Elchild.querySelector('#priority'),
            Eltype = Elchild.querySelector('#type'),
            ElstatusEl = Elchild.querySelector('#status');
            
            Elpointer.innerText = add.id;
            Eltitle.innerText = title ;
            Eldate.innerText = date ;
            Eldescription.innerText = description;
            Elpriority.innerText = priority;
            Eltype.innerText = type;
            ElstatusEl.innerText = status;
            Elparent.innerHTML += Elchild.innerHTML;
        
}

//---- Show Tasks ----//
function show(data , selector , status , reload = false) {
    // Varaibles 
        let parent = document.querySelector("#" + selector),
            child = parent.querySelector("#tasks"),
            pointer = parent.querySelector('#key'),
            title = child.querySelector('#title'),
            date = child.querySelector('#date'),
            description = child.querySelector('#description'),
            priority = child.querySelector('#priority'),
            type = child.querySelector('#type'),
            statusEl = child.querySelector('#status');
        var i=1;
    // Actions
        for(let row of data){
            if(row.status == status){
                pointer.innerText = row.id;
                title.innerText = row.title;
                date.innerText = row.date;
                description.innerText = row.description;
                priority.innerText = row.priority;
                type.innerText = row.type;
                statusEl.innerText = row.status;
                parent.innerHTML += child.innerHTML;
            }
        }

}


//---- Edit Task Form ----//
function edit(selector) {

        $('#modal-task').modal('show');
        $('#save').hide(function(){
            $('#update-btn').show('slow');
            $('#delete').show('slow');
        });
        $('#delete').on('click' , function(){
            destroy(selector);
        });

        $('#update-btn').one('click' , function(){
            update(selector);
        });

        // Variables
            let id = selector.querySelector('.key').innerText;
        // Action
            for (let index = 0 ; index < tasks.length ; index++) {
                if(id == tasks[index].id){
                    // Varaibles 
                        let model = document.querySelector('.modal'),
                            title = model.querySelector('#title'),
                            type = model.querySelector('.' + tasks[index].type),
                            priority = model.querySelector('#priority'),
                            status = model.querySelector('#status'),
                            date = model.querySelector('#date'),
                            description = model.querySelector('#description');
                    // Action
                        title.value = tasks[index].title;
                        type.checked = true;
                        priority.value = tasks[index].priority;
                        status.value = tasks[index].status;
                        date.value = tasks[index].date;
                        description.value = tasks[index].description;
                }
            }
}


//---- Update Task ----//
function update(selector){
    // Variables
        let id = selector.querySelector('.key').innerText;
    // Action
        for (let index = 0 ; index < tasks.length ; index++) {
            if(id == tasks[index].id){
                // Varaibles 
                    let model = document.querySelector('.modal'),
                        title = model.querySelector('#title'),
                        type = model.querySelector('.' + tasks[index].type),
                        priority = model.querySelector('#priority'),
                        status = model.querySelector('#status'),
                        date = model.querySelector('#date'),
                        description = model.querySelector('#description');
                // Action
                    tasks[index].title = title.value;
                    tasks[index].type = type.value;
                    tasks[index].priority = priority.value;
                    tasks[index].status = status.value;
                    tasks[index].date = date.value;
                    tasks[index].description = description.value;
                // Not A good solution
                let Eltitle = selector.querySelector('#title'),  
                    Eldate = selector.querySelector('#date'),
                    Eldescription = selector.querySelector('#description'),
                    Elpriority = selector.querySelector('#priority'),
                    Eltype = selector.querySelector('#type'),
                    Elstatus = selector.querySelector('#status');

                    Eltitle.innerText = tasks[index].title;
                    Eltype.innerText = tasks[index].type;
                    Elpriority.innerText = tasks[index].priority;
                    Elstatus.innerText = tasks[index].status;
                    Eldate.innerText = tasks[index].date;
                    Eldescription.innerText = tasks[index].description;
            }
        }
        starter();
}

//---- Delete Task ----//
function destroy(selector) {
        starter();
        // Variables
            let id = selector.querySelector('.key').innerText;
        // Action
            for (let index = 0 ; index < tasks.length ; index++) {
                if(id == tasks[index].id){
                    tasks.splice(index, 1) ;
                    selector.remove(); break;
                }
            }
}