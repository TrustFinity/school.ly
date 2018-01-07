<template>
    <div>
        <div class="form-group">
            <input type="text" v-model="search_term" class="form-control text-center search"
                   :placeholder="'Search ' + resource + ' here....'"  v-on:keyup="performSearch">
        </div>
        <div class="results" v-for="student in searchResults">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-1">
                            <img :src="student.photo_url" alt="Photo" class="img-circle img-responsive">
                        </div>
                        <div class="col-sm-4">
                            <a :href="'/'+resource+'/'+student.id">
                                <h4>{{ student.name }}, {{ student.age }}</h4>
                            </a>
                            <p>{{ student.level.name }} {{ student.classroom.name }}</p>
                        </div>
                        <div class="col-sm-7">
                            {{ student.address }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'Search',
        props: {
            url: {
                type: String,
                required: true
            },
            resource: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                search_term: '',
                searchResults: []
            }
        },
        methods: {
            performSearch () {
                console.log(this.search_term)
            }
        }
    }
</script>
<style scoped>
    .search {
        height: 60px;
        margin-bottom: -5px;
        font-size: 3em;
    }
</style>