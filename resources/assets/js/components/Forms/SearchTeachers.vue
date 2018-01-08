<template>
    <div>
        <div class="input-group">
            <!--<div class="input-group-addon" v-if="isSearching">Searching ...</div>-->
            <input type="text" v-model="search_term" class="form-control search input-lg"
                   :placeholder="'Search ' + resource + ' here....'"
                   @keyup="performSearch"
                   @focus="focussed"
                   @blur="blurred">
            <div class="input-group-addon" @click="clearResults">Clear Search</div>
        </div>
        <div class="results">
            <div class="panel panel-default" v-for="teacher in searchResults">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-1">
                            <img :src="teacher.photo_url" alt="Photo" class="img-thumbnail img-responsive">
                        </div>
                        <div class="col-sm-4">
                            <a :href="'/'+resource+'/'+teacher.id">
                                <h4>{{ teacher.first_name }} {{ teacher.middle_name }} {{ teacher.last_name }}</h4>
                            </a>
                            <p>{{ teacher.experience }}, {{ teacher.classgroup.name }}</p>
                        </div>
                        <div class="col-sm-7">
                            {{ teacher.address }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'SearchTeachers',
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
                searchResults: [],
                isSearching: false
            }
        },
        methods: {
            performSearch () {
                if (this.search_term.length > 2) {
                    this.isSearching = true
                    axios.post(this.url, {
                        search: this.search_term,
                    })
                        .then((response) => {
                            console.log(response.data);
                            this.searchResults = response.data
                            this.isSearching = false
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            },
            focussed () {
            },
            blurred () {
            },
            clearResults () {
                this.searchResults = []
                this.search_term = ''
            },
        }
    }
</script>
<style scoped>
    .input-group-addon {
        cursor: pointer;
    }
    .results {
        margin-top: 10px;
    }
</style>