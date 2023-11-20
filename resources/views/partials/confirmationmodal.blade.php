    <!-- modal -->
    <div class="confirmationModal">
        <div class="modal-content">
            <h2>Atención!</h2>
            <p id="confirmationText">¿Estás seguro de querer eliminar el usuario?</p>
            <div class="modal-buttons">
                <button onclick="closeConfirmation()" class="btn">Cancelar</button>
                <form id="deleteForm" method="POST" action="" class="deleteformbtn">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" >Eliminar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function closeConfirmation(){
            document.querySelector('.confirmationModal').classList.remove('active');
        }

        function openConfirmation(){
            document.querySelector('.confirmationModal').classList.add('active');
        }

        let deleteForm = document.querySelector('#deleteForm');

        const deleteButtons = document.querySelectorAll('.delete-user-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                let confirmationText = document.querySelector('#confirmationText');
                let id = button.dataset.id;
                let name = button.dataset.name;
                let type = button.dataset.type;

                if (type == 'usuario'){
                    confirmationText.innerHTML = `¿Estás seguro de querer eliminar el usuario ${name}?`;
                    deleteForm.action = `/admin/users/${id}`;
                } else if (type == 'servicio'){
                    confirmationText.innerHTML = `¿Estás seguro de querer eliminar el servicio ${name}?`;
                    deleteForm.action = `/admin/services/${id}`;
                } 
                openConfirmation();
            });
        });
    </script>