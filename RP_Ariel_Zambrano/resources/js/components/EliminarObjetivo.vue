<template>
    <input 
    type="submit" 
    class="btn btn-danger m-1" 
    value="Esborrar"
    v-on:click="eliminarObjetivo" 
    >
</template>
<script>
    export default {
        props: ['objetivoId'], /* Si el atributo es "receta-id" el prop deberá de llamarse "RecetaId" */
        methods: {
            eliminarobjetivo() {

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
                                id: this.objetivoId
                            }
                            // Enviar la petición al servidor
                            axios.post(`/dashboard/objetivos/${this.objetivoId}`, {params, _method: 'delete'})
                                .then(respuesta => {
                                    //console.log(respuesta) // La respuesta será lo que tengamos en nuestro controlador (el return..)
                                    this.$swal({ // Mensaje de success conforme se ha eliminado
                                    title: 'Àmbit eliminat',
                                    text: 'Se ha esborrar el àmbit',
                                    icon: 'success'
                                    });

                                    // Eliminar el objetivo del DOM (de la págia)
                                    /* Es parentNode se hace 3 veces porque partimos del input --> (1rpN)td --> (2ndpN)tr --> (3rdpN)tbody con esto estaremos en el TBODY
                                    Se hace esto porque es recomendable eliminar desde el padre hacia el hijo
                                    una vez estemos en el TBODY borraremos el child (removeChild) que será un TR (this.$el=input) --> (1rpN) td --> (2ndpN) tr
                                    y eliminamos del TBODY hacia el hijo TR */
                                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
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