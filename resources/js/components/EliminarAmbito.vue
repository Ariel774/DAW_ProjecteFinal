<template>
    <input 
    type="submit" 
    class="btn btn-danger m-1" 
    value="Esborrar"
    v-on:click="eliminarAmbito" 
    >
</template>
<script>
    export default {
        props: ['ambitoSlug'], /* Obtenemos el àmbito id desde el blade */
        methods: {
            eliminarAmbito() {

                this.$swal({
                        title: 'Vols esborrar aquest àmbit?',
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
                                id: this.ambitoSlug
                            }
                            // Enviar la petición al servidor
                            axios.post(`/dashboard/ambitos/${this.ambitoSlug}`, {params, _method: 'delete'})
                                .then(respuesta => {
                                    //console.log(respuesta) // La respuesta será lo que tengamos en nuestro controlador (el return..)
                                    this.$swal({ // Mensaje de success conforme se ha eliminado
                                    title: 'Àmbit eliminat',
                                    text: 'Se ha esborrar el àmbit',
                                    icon: 'success'
                                    }).then((result) => {
                                        if (result.isConfirmed) { 
                                            window.location.href = '/dashboard/home';
                                        }
                                    })
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
<style >
    /* Estilos para el bóton */
</style>