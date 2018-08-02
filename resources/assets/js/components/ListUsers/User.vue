<template>


    <tr>
        <td>{{userData.name}}</td>
        <td>{{userData.type}}</td>
        <td>{{userData.email}}</td>
        <td>{{userData.updated_at}}</td>
        <td><input type="checkbox" class="form-check" :value="userData" v-model="users" v-on:change="check"></td>
        {{this.users}}
    </tr>



</template>

<script>

    export default{
        props: ['userData','index','id'],

        data(){
            return{
                users:[],
            }
        },
        mounted(){

            console.log("hello");
        },

        methods:{

            check(){

              console.log("heee");
            },




        }
    }
</script>