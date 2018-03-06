<template>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Classes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="stream in streams">
                                <td class="text-primary stream-name">
                                    {{ stream.name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>subjects</th>
                        </thead>
                        <tbody>
                            <td>marks</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'ViewResults',
        props: {
            examination: {
                type: Object
            },
            results: {
                type: Array
            },
            streams: {
                type: Array,
                required: true
            }
        },
        data() {
            return {

            }
        },
        methods: {

        }
    };
</script>
<style scoped>

</style>