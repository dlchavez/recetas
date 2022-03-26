<template>
     <input type="submit" class="btn btn-danger d-block w-100 mb-1" value="Eliminar" v-on:click="eliminarReceta">
</template>
<script>

export default {
    props:['recetaId'],

    methods:{
        eliminarReceta(){
            this.$swal({
            title: 'Estas seguro de eliminar la receta?',
            text: "No se podrá recuperar, una vez eliminada",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar',
            cancelButtonText: "Cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
                const params={
                    id: this.recetaId
                }
                axios.post(`/recetas/${this.recetaId}`,{params,_method: 'delete'})
                .then(respuesta =>{
                    console.log(respuesta);
                    this.$swal({
                        title: 'Receta eliminada',
                        text: 'Your file has been deleted.',
                        icon: 'success'}
                    );
                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);

                })
                .catch(error=>{
                    console.log(error);
                })

            }
        })
        }
    }
}
</script>
