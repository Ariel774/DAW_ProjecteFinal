<template>
    <a class="btn-a" href="#" v-on:click="eliminarTarea"><i class="fas fa-check-circle"></i></a>
</template>
<script>
    export default {
        props: {
  	        data: {
    	    type: Object
            }
        }, 
        methods: {
            eliminarTarea() {
                this.$swal({
                        title: 'Vols completar la tasca?',
                        text: "Si es completa ja no sortirà avui",
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
                                id: this.data.id
                            }
                            // Enviar la petición al servidor
                            axios.post(`/dashboard/tareas/${this.data.id}`, {params, _method: 'delete'})
                                .then(respuesta => {
                                    //console.log(respuesta) // La respuesta será lo que tengamos en nuestro controlador (el return..)
                                    this.$swal({ // Mensaje de success conforme se ha eliminado
                                    title: 'Tasca completada',
                                    text: "S'ha completat la tasca",
                                    icon: 'success',
                                    confirmButtonText: 'Ok!'
                                    }).then((respuesta) => {
                                        if(respuesta.isConfirmed) {
                                            this.$el.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
                                            axios.get(`/dashboard/objetivo/${this.data.objetivo_id}`)
                                            .then(response => {
                                                if(response.data != "") {
                                                    this.$swal({
                                                    width: 600,
                                                    title: 'Felicitats!! Objectiu aconseguit!',
                                                    text: "S'ha completat l'objectiu " + response.data.nombre,
                                                    confirmButtonText: 'Perfecte!!',
                                                    padding: '3em',
                                                    background: '#fff',
                                                    backdrop: `
                                                        rgba(0,0,123,0.4)
                                                        url("/storage/img/congratulation.gif")
                                                        center top
                                                        no-repeat
                                                        `
                                                    })
                                                } else {
                                                    return;         
                                                }
                                            }).catch(error => {
                                                console.log(error)
                                            })             
                                        }
                                    });
                                })
                                .catch(error => {
                                    console.log(error)
                                })
                        }
                })
            }
        },
          mounted: function () {
  	        console.log(this.data)
        }
    }
</script>