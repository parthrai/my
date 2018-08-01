<template>
    <section>
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
            Users
        </div>
        <div class="col-lg-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button>
            <button type="button" class="btn btn-danger" onclick="del()" >Delete</button>
        </div>
        </div>
    </div>

    <div class="card-body">

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Email</th>
                <th>Last Update</th>
                <th>Delete</th>
            </tr>
            </thead>


            <tbody>

                <user-row
                    v-for="(user,index) in users"
                    v-bind:userData="user"
                    v-bind:index="task.id"
                    :key="index"

                >


                </user-row>

            </tbody>

        </table>
    </div>

    </section>
</template>

<script>

    export default{
        data(){
            return{
                task:'',
                users:[],
            }
        },
        mounted(){

            //console.log(this.users.data);
            axios.get('/api/users')
                .then(response => {
                    //console.log(response.data);
                    this.users=(response.data);
                    console.log(this.users);
                });

        },

        methods:{
            updateData(){
                axios.get('/users')
                    .then(response => {
                    //console.log(response.data);
                    this.users=(response.data);
                console.log("in update");
            });
            },



            addTask(){
                let task = event.target.value;
                this.tasks.push(task);
                const data = {
                    task:task,
                }
                axios.post('http://vue.test/api/todo',data)
                    .then(response => {
                    console.log(response);
                });
                event.target.value="";
                this.updateData();
            },
            deleteTask(index){
                const data = {
                    id:index,
                }
                axios.delete('http://vue.test/api/todo/'+index,data)
                    .then(response => {
                    console.log(response);
            });
                this.tasks.splice(index,1);
                axios.get('http://vue.test/api/todo')
                    .then(response => {
                    //console.log(response.data);
                    this.tasks=(response.data);
            });
            }
        }
    }
</script>