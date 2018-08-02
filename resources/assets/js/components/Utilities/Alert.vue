<template>

    <div>


            <button type="button" class="close" @click="close">&times;</button>

            <strong>{{data.content}}</strong>
       

    </div>

</template>

<script>
    export default {
        props: ['data'],
        methods:{

            close(){

                this.$emit('close');

            }
        }
    }
</script>


