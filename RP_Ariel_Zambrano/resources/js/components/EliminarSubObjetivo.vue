<template>
    <input 
    type="submit" 
    class="btn btn-danger" 
    value="Esborrar"
    v-on:click="eliminarSubObjetivo" 
    >
</template>
<script>
    export default {
        props: ['subObjetivoId'],
        methods: {
            eliminarSubObjetivo() {
                this.$swal({
                        title: 'Vols esborrar aquest Sub Objectiu?',
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
                                id: this.subObjetivoId
                            }
                            // Enviar la petición al servidor
                            axios.post(`/dashboard/sub-objetivos/${this.subObjetivoId}`, {params, _method: 'delete'})
                                .then(respuesta => {
                                    //console.log(respuesta) // La respuesta será lo que tengamos en nuestro controlador (el return..)
                                    this.$swal({ // Mensaje de success conforme se ha eliminado
                                    title: 'Sub Objectiu eliminat',
                                    text: 'Se ha esborrar el sub Objectiu',
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