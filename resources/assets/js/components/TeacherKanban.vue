<template>
    <div id="board">
        <list></list>
    </div>
</template>

<script>
    import List from './List'
    export default {
        name: 'TeacherKanban',
        components: {
            List
        }
    }
</script>

<style>
    #board {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
         -webkit-font-smoothing: antialiased;
         -moz-osx-font-smoothing: grayscale;
        color: #2c3e50;
    }
</style>
