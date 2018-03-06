<template>
    <div class="row">
        <form method="POST" :action="formAction">
            <input type="hidden" name="_token" :value="getToken">
            <input type="hidden" name="_method" value="PUT">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-sm-8 col-xs-12 col-sm-offset-2">
                        <label for="class_group_id">
                            Select the Class that you would like to record results for
                        </label>
                        <select v-model="chooseClassGroup" class="form-control" required>
                            <option disabled value="">--Select a class</option>
                            <option v-for="(classGroup, classGroupIndex) in class_groups" :key="classGroupIndex" :value="classGroup">
                                {{ classGroup.name }}
                            </option>
                        </select>
                    </div>
                    <br>
                    <div v-show="chooseClassGroup" class="col-sm-8 col-xs-12 col-sm-offset-2">
                        <label for="stream_id">
                            Select the Stream
                        </label>
                        <select v-model="chooseStream" class="form-control" required>
                            <option disabled value="">--Select a class</option>
                            <option v-for="stream in chooseClassGroup.streams" :value="stream">
                                {{ stream.name }}
                            </option>
                        </select>
                        <input type="hidden" name="stream_id" :value="selectedStream">
                    </div>
                    <div v-show="chooseClassGroup" class="col-sm-8 col-xs-12 col-sm-offset-2">
                        <label for="subject_id">Subject to enter results</label>
                        <select name="subject_id" v-model="chooseSubject" class="form-control" required>
                            <option disabled value="">--Select a subject</option>
                            <option v-for="subject in chooseClassGroup.subjects" :value="subject.id">
                                {{ subject.name }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div v-if="chooseStream && chooseSubject" class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>STUDENT NAME</th>
                                <th>MARKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="student in chooseStream.students" value="student.id">
                                <td>
                                    {{ student.first_name }} {{ student.middle_name }} {{ student.last_name }}
                                </td>
                                <td>
                                    <input type="number" :name="'student-' + student.id" class="form-control">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-success pull-right">Save Results</button>
                        </div>
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
                chooseSubject: ''
            }
        },
        computed: {
            getToken() {
                return document.getElementsByName('csrf-token')[0].getAttribute('content')
            },
            formAction() {
                return '/examinations/' + this.examination.id
            },
            selectedStream() {
                return this.chooseStream.id
            }
        },
        methods: {
            selectedClass(class_group) {
                this.chooseClassGroup = class_group.id
            }
        }
    };
</script>
<style scoped>

</style>
