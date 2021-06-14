<template>
    <div>
        <div class="row-center">
            <div class="col">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-search"></i></div>
                </div>
                <input id="search-input" type="search" v-model="keyword" class="form-control" placeholder="Busca el teu objectiu" />
            </div>
            </div>

        </div>
        <div v-for="(objetivo, index) in objetivos" :key="objetivo.id" class="card-ambito card text-white bg-primary ml-3 mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10 h3">Objectiu - {{ index+1 }}
                        <i v-if="objetivo.finalizado == true" class="fas fa-check-square"></i>
                        <i v-else class="spinner fas fa-spinner"></i>
                    </div>
                    <div class="col-md-2"> 
                        <eliminar-objetivo  v-bind:objetivo-id="objetivo.slug"></eliminar-objetivo>
                        <a v-if="objetivo.finalizado == false" 
                        v-bind:href="'ambitos/'+ objetivo.slug_ambito + '/objetivos/' + objetivo.slug + '/edit'" 
                        type="button" class="btn btn-info">Editar</a>
                    </div>
                </div>    
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="button-ambito">
                            <a class="btn-a" 
                            v-bind:href="'ambitos/'+ objetivo.slug_ambito + '/objetivos/' 
                            + objetivo.slug">Sub Objectius</a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h5 class="card-title">{{ objetivo.nombre }}</h5>
                        <p class="card-text">{{ objetivo.descripcion}}</p>
                    </div>
                    <div class="col-lg-2">
                        <img v-bind:src="'/storage/' + objetivo.imagen" class="img-ambito rounded">
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
export default {
    data() {
        return {
            keyword: null,
            objetivos: []
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {
        getResults() {
            axios.get('/dashboard/objetivos/livesearch', { params: { keyword: this.keyword } })
                .then(res => this.objetivos = res.data)
                .catch(error => {});
        }
    },
    mounted: function () {
        axios.get('/dashboard/objetivos/livesearch', { params: { keyword: this.keyword } })
            .then(res => this.objetivos = res.data)
            .catch(error => {});
    }
    
}
</script>