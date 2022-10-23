/**
 * In this file app.js you will find all CRUD functions name.
 * 
 */
function starter(){
    document.querySelector("form").reset();
    $('#modal-task').modal('hide');
}


//---- Add Tasks ----//
function add(){
    let model = document.querySelector('.modal');
        title = model.querySelector('#title').value,
        type = model.querySelector('#type:checked').value,
        priority = model.querySelector('#priority:checked').value,
        status = model.querySelector('#status:checked').value,
        date = model.querySelector('#date').value,
        description = model.querySelector('#description').value;
    var selector ;
    status == "To Do" ? selector = "to-do-parent" : status == "In Progress" ? selector =  "in-progress-parent" : selector = "done-parent";
    let add = 
            {
                'title'         :   title,
                'type'          :   type,
                'priority'      :   priority,
                'status'        :   status,
                'date'          :   date,
                'description'   :   description
            };
    tasks.push(add);
    starter();
    show(tasks , selector , status); 
}

function saveTask() {
    // Recuperer task attributes a partir les champs input

    // Créez task object

    // Ajoutez object au Array

    // refresh tasks
    
}

function editTask(index) {
    // Initialisez task form

    // Affichez updates

    // Delete Button

    // Définir l’index en entrée cachée pour l’utiliser en Update et Delete

    // Definir FORM INPUTS

    // Ouvrir Modal form
}

function updateTask() {
    // GET TASK ATTRIBUTES FROM INPUTS

    // Créez task object

    // Remplacer ancienne task par nouvelle task

    // Fermer Modal form

    // Refresh tasks
    
}

function deleteTask() {
    // Get index of task in the array

    // Remove task from array by index splice function

    // close modal form

    // refresh tasks
}

function initTaskForm() {
    // Clear task form from data

    // Hide all action buttons
}


//---- Show Tasks ----//
function show(data , selector , status) {
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


//---- Delete Task ----//
function destroy(selector) {
    if(confirm('are you sure to delete')){
        // Variables
            let id = selector.querySelector('.key').innerText;
        // Action
            for (let index = 0 ; index < tasks.length ; index++) {
                if(id == tasks[index].id){
                    tasks.splice(index, 1) ; break;
                }else{ alert("Not find this record ") ; break}
            }
            selector.remove();
    }
}