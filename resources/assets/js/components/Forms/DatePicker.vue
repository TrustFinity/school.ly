<template>
    <!-- <datepicker :value="value" :name="name"></datepicker> -->
</template>
<script>
    import Datepicker from 'vuejs-datepicker'
    export default {
        name: 'DatePicker',
        props: {
            name: {
                type: String,
                required: true,
            },
            value: {
                required: true
            }
        },
        components: {
            Datepicker
        }
    }
</script>