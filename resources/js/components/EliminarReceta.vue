<template>
    <button
        type="submit"
        class="btn btn-danger ml-3"
        data-bs-toggle="tooltip"
        title="Eliminar"
        @click="eliminarReceta"
    >
        <i class="fa-solid fa-trash"></i>
    </button>
</template>

<script>
export default {
    props: ["recetaId"],
    methods: {
        eliminarReceta() {
            this.$swal({
                title: "¿Deseas eliminar esta receta?",
                text: "Una vez eliminada no se puede recuperar.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí",
                cancelButtonText: "No",
                heightAuto: false,
            }).then((result) => {
                if (result.isConfirmed) {

                    const params = {
                        id: this.recetaId
                    }

                    // Enviar la petición al servidor
                    axios.post(`/receta/${this.recetaId}`, {params, _method: 'delete'})
                    .then(respuesta =>{
                        console.log(respuesta);
                        this.$swal({
                            title: 'Receta eliminada',
                            text: 'Se eliminó la receta correctamente',
                            icon: 'success',
                            confirmButtonColor: "#3085d6",
                            heightAuto: false
                        });

                        // Eliminar Receta del DOM
                        this.$el.parentNode.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode.parentNode);
                    })
                    .catch(error => {
                        console.log(error);
                    })

                    // this.$swal({
                    //     title: 'Receta eliminada',
                    //     text: 'Se eliminó la receta correctamente',
                    //     icon: 'success',
                    //     confirmButtonColor: "#3085d6",
                    //     heightAuto: false
                    // });
                }
            });
        },
    },
};
</script>
