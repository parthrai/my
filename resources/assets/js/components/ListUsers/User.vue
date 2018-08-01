<template>

    <tr>
        <td>{{userData.name}}</td>
        <td>{{userData.type}}</td>
        <td>{{userData.email}}</td>
        <td>{{userData.updated_at}}</td>
        <td><input type="checkbox" class="form-check"></td>
    </tr>

</template>

<script>

    export default{
        props: ['userData','index','id'],

        data(){
            return{

            }
        },
        mounted(){

            console.log("hello");
        },

        methods:{



        }
    }
</script>