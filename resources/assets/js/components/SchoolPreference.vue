<template>
    <div>
      <form-wizard @on-complete="onComplete"
                         title=""
                         subtitle=""
                         shape="tab"
                         color="#2ab27b">
         <tab-content title="School Preference"
                      icon="glyphicon glyphicon-cog" :before-change="beforeTabSwitch">
           School Preference
         </tab-content>
         <tab-content title="Levels & Classes"
                      icon="glyphicon glyphicon-th-list">
           Levels & classes
         </tab-content>
         <tab-content title="Subjects"
                      icon="glyphicon glyphicon-list-alt">
           subjects
         </tab-content>
         </form-wizard>
    </div>
</template>
<script>
    import {FormWizard, TabContent} from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'
    export default {
        name: 'SchoolPreference',
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
