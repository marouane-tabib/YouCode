
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

    $('#update').one('click' , function(){
        update(selector);
    });
    // Action
                // Varaibles 
                    let model = document.querySelector('.modal'),
                        title = model.querySelector('#title'),
                        type = model.querySelector('#type'),
                        priority = model.querySelector('#priority'),
                        status = model.querySelector('#status'),
                        date = model.querySelector('#date'),
                        description = model.querySelector('#description');
                        type.innerText == "Bug" ? type = model.querySelector('#Bug') : type = model.querySelector('#Bug');
                // Action
                    title.value = tasks[index].title;
                    type.checked = true;
                    priority.value = tasks[index].priority;
                    status.value = tasks[index].status;
                    date.value = tasks[index].date;
                    description.value = tasks[index].description;
}