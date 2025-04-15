<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Cargar Vue.js -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
<!-- Cargar Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<div class="container">
    <div id="userProfileApp">
        <!-- Mostrar datos del usuario -->
        <div v-if="!editing">
            <h1>Perfil de @{{ user.name }}</h1>
            <p><strong>Email:</strong> @{{ user.email }}</p>
            
            <button @click="startEditing" class="btn btn-primary mt-3">
                Editar Perfil
            </button>
        </div>

        <!-- Formulario de edición -->
        <div v-else>
            <h1>Editar Perfil</h1>
            
            <form @submit.prevent="updateUser">
                <div class="form-group">
                    <label>Nombre</label>
                    <input v-model="editForm.name" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input v-model="editForm.email" type="email" class="form-control" required>
                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button @click="cancelEditing" type="button" class="btn btn-secondary ml-2">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Esperar a que Vue esté cargado
window.onload = function() {
    new Vue({
        el: '#userProfileApp',
        data: {
            editing: false,
            user: @json(auth()->user() ?? []), // Datos del usuario
            editForm: {
                name: '',
                email: ''
            }
        },
        methods: {
            startEditing() {
                this.editForm = {...this.user};
                this.editing = true;
            },
            cancelEditing() {
                this.editing = false;
            },
            updateUser() {
                axios.put('/api/users/' + this.user.id, this.editForm)
                    .then(response => {
                        this.user = response.data;
                        this.editing = false;
                        alert('Perfil actualizado correctamente');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error al actualizar: ' + (error.response.data.message || ''));
                    });
            }
        }
    });
};
</script>

</body>
</html>