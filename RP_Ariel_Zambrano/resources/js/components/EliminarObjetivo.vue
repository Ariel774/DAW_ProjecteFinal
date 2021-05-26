<template>
    <input 
    type="submit" 
    class="btn btn-danger" 
    value="Esborrar"
    v-on:click="eliminarObjetivo" 
    >
</template>
<script>
    export default {
        props: ['objetivoId'], 
        methods: {
            eliminarObjetivo() {
                this.$swal({
                        title: 'Vols esborrar aquest objectiu?',
                        text: "Un cop s'esborri no es pot tornar a recuperar..",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Cuando borramos con axios es importante tener unos parametros para pasarle.
                            const params = {
                                id: this.objetivoId
                            }
                            // Enviar la petición al servidor
                            axios.post(`/dashboard/objetivos/${this.objetivoId}`, {params, _method: 'delete'})
                                .then(respuesta => {
                                    //console.log(respuesta) // La respuesta será lo que tengamos en nuestro controlador (el return..)
                                    this.$swal({ // Mensaje de success conforme se ha eliminado
                                    title: 'Objectiu eliminat',
                                    text: "Se ha esborrar l'objectiu",
                                    icon: 'success'
                                    });
                                    this.$el.parentElement.parentElement.parentElement.parentElement.remove();
                                })
                                .catch(error => {
                                    console.log(error)
                                })
                        }
                })
            }
        }
    }
</script>