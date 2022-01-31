function editar(id, txt_tarefa) {
     let form = document.createElement('form')
     form.action = 'home.php?pag=home&acao=atualizar'
     form.method = 'post'
     form.className = 'row'

     let inputTarefa = document.createElement('input')
     inputTarefa.type = 'text'
     inputTarefa.name = 'tarefa'
     inputTarefa.value = txt_tarefa
     inputTarefa.className = ' col-8 form-control'


     let inputId = document.createElement('input')
     inputId.type = 'hidden'
     inputId.name = 'id'
     inputId.value = id

     let button = document.createElement('button')
     button.type = 'submit'
     button.className = 'col-3  ml-1 btn btn-info'
     button.innerHTML = 'Atualizar'

     form.appendChild(inputTarefa)

     form.appendChild(inputId)

     form.appendChild(button)

     let tarefa = document.getElementById('tarefa_' + id)
     tarefa.innerHTML = ''

     tarefa.insertBefore(form, tarefa[0])
}

function remover(id) {
     location.href = 'home.php?pag=home&acao=remover&id=' + id;

}

function marcarRealizada(id){
     location.href = 'home.php?pag=home&acao=marcarRealizada&id=' + id;
}