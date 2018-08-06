<template>

    <div>
        <h1>THis is home</h1>

        <h2>{{namee}}</h2>

    </div>


</template>

<script>

    export default{
        computed:{
            namee(){

                return this.$store.getters.getName;
            }
        }

    }


</script>