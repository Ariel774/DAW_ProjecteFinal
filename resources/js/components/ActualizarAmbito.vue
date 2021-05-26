<template>
    <input 
    type="submit" 
    class="btn btn-primary"
    value="Actualitzar"
    v-on:click="actualizarAmbito" 
    >
</template>
<script>

    export default {
        props: ['ambitoSlug'], /* Si el atributo es "receta-id" el prop deberá de llamarse "RecetaId" */
        methods: {
            actualizarAmbito() {
                // Enviar la petición al servidor
                let url = "/dashboard/ambitos/" + this.ambitoSlug;              
                axios.put(url, this.ambitoSlug).then(response=> {
                    alert(response);
                    console.log(response);
                    //console.log("actualizado todo correctamente");
                })
                .catch(function (error) {
                    console.log(error);
                });
            }              
        }
    }
</script>