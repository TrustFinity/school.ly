<template>
    <div class="row">
        <form action="/examinations" method="POST">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-sm-8 col-xs-12 col-sm-offset-2">
                        <label for="class_group_id">
                            Select the Class that you would like to record results for
                        </label>
                        <select name="class_group_id" v-model="chooseClassGroup" class="form-control" required>
                            <option disabled value="">--Select a class</option>
                            <option v-for="classGroup in class_groups" v-bind:value="classGroup.id">
                                {{ classGroup.name }}
                            </option>
                        </select>
                    </div>
                    <br>
                    <div v-if="chooseClassGroup" class="col-sm-8 col-xs-12 col-sm-offset-2">
                        <label for="stream_id">
                            Select the Stream
                        </label>
                        <select name="stream_id" v-model="chooseStream" class="form-control" required>
                            <option disabled value="">--Select a class</option>
                            <option v-for="stream in chooseClassGroup.streams" value="stream.id">
                                {{ stream.name }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        name: 'EnterResults',
        props: {
            examination: {
                type: Object
            },
            class_groups: {
                type: Array
            }
        },
        data() {
            return {
                chooseClassGroup: '',
                chooseStream: '',
                chooseSubject: '',
                selectedClassGroup: new Object,
                marks: []
            }
        },
        methods: {
            selectedClass(class_group) {
                this.selectedClassGroup = class_group
            }
        }
    };
</script>
<style scoped>

</style>
