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
                            <option v-for="classGroup in class_groups" :value="classGroup">
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
                            <option v-for="stream in chooseClassGroup.streams" :value="stream">
                                {{ stream.name }}
                            </option>
                        </select>
                    </div>
                    <div v-if="chooseClassGroup" class="col-sm-8 col-xs-12 col-sm-offset-2">
                        <label for="subject_id">Subject to enter results</label>
                        <select name="subject_id" v-model="chooseSubject" class="form-control" required>
                            <option disabled value="">--Select a subject</option>
                            <option v-for="subject in chooseClassGroup.subjects" value="subject.id">
                                {{ subject.name }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div v-if="chooseStream" class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="student in chooseStream.students" value="student.id">
                                <td>
                                    {{ student.first_name }}
                                </td>
                                <td>
                                    <input ype="number" name="mark" class="form-control">
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                this.chooseClassGroup = class_group.stream
            }
        }
    };
</script>
<style scoped>

</style>
