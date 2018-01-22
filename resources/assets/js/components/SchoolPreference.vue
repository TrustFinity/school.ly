<template>
    <div>
        <form-wizard @on-complete="onComplete"
                         title=""
                         subtitle=""
                         shape="tab"
                         color="#2ab27b">
            <tab-content title="School Preference" icon="glyphicon glyphicon-cog" :before-change="beforeTabSwitch">
                <form action="/settings/create" method="post">
                    <!-- {{ csrf_field() }} -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-xs-6 col-xs-offset-3">
                                <div class="form-group">
                                    <label for="name">School Name</label><span class="text-danger"> (Required)</span>
                                    <p class="">The name of your school/institution.</p>
                                    <input type="text" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Institutions' Type</label><span class="text-danger"> (Required)</span>
                                    <p class="">Your school institutions' type.</p>
                                    <select name="institution_type" id="institutions_type" class="form-control">
                                        <option v-for="level in ['Secondary', 'University', 'Primary', 'Pre-School']">
                                            {{ level }}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Instructors' Type</label><span class="text-danger"> (Required)</span>
                                    <p class="">Your institution instructors type.</p>
                                    <select name="instructors_type" id="instructors_type" class="form-control">
                                        <option v-for="instructor in ['Teachers', 'Lecturers']">
                                            {{ instructor }}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Attendants' Type</label><span class="text-danger"> (Required)</span>
                                    <p class="">Your institutions' attendants' type.</p>
                                    <select name="attendants_type" id="attendants_type" class="form-control">
                                        <option v-for="attendant in ['Students', 'Pupils']">
                                            {{ attendant }}
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <!-- <div class="panel-footer">
                                <div class="row">
                                    <div class="row col-xs-6 col-xs-offset-3">
                                        <button class="btn btn-success" type="submit">Update Preferences</button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </form>
            </tab-content>
            <tab-content title="Levels & Classes" icon="glyphicon glyphicon-th-list">
                Levels & classes
            </tab-content>
            <tab-content title="Subjects" icon="glyphicon glyphicon-list-alt">
                subjects
            </tab-content>

            <el-button class="btn btn-success" type="submit" slot="prev">Back</el-button>
            <el-button class="btn btn-success" type="submit" slot="next">Next</el-button>
            <el-button class="btn btn-success" type="submit" slot="finish">Finish</el-button>
        </form-wizard>
    </div>
</template>
<script>
    import {FormWizard, TabContent} from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'
    export default {
        name: 'SchoolPreference',
        props: {
            levels: {
                type: String,
                required: true
            }
        },
        components: {
            FormWizard,
            TabContent
        },
        methods: {
            onComplete: function(){
                alert('Yay. Done!');
            },
            beforeTabSwitch: function(){
                alert("This is called before switching tabs")
                return true;
            }
        }
    }
</script>

<style scoped>

</style>
