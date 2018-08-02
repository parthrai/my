<template>
    <section>
        <!-- Modal -->


        <div id="myModal" class="modal fade" role="dialog" :class="{ in: modalShown }">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Header</h4>
                        <button type="button" class="close text-right" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form v-on:submit.prevent="submitFormNewUser" >


                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" v-model="newUser.name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" v-model="newUser.email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="type" name="type" v-model="newUser.type">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" v-model="newUser.password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default" @click="submitFormNewUser">Submit</button>
                                    <button type="submit" class="btn btn-default" @click="close">close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- end Modal -->

    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
            Users
        </div>
        <div class="col-lg-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button>
            <button type="button" class="btn btn-danger" @click="deleteUsers" >Delete</button>
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





            <tbody v-for="(user,index) in users">

                    <tr>
                            <td>{{user.name}}</td>
                            <td>{{user.type}}</td>
                            <td>{{user.email}}</td>
                            <td>{{user.updated_at}}</td>
                            <td><input type="checkbox" class="form-check" :value="user.id" v-model="selectedUsers" ></td>

                      </tr>

            </tbody>


           {{selectedUsers }}

        </table>
    </div>

    </section>
</template>

<script>

    export default{
        data(){
            return{

                users:[],

                selectedUsers:[],
                selected:{
                },

                newUser:{
                    name:'',
                    type:'',
                    email:'',
                    password:'',

                },
                modalShown: false,


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
            close() {
                this.$emit('hide');

               // this.$emit('exit', true)
               // this.$emit('close');
            },

            updateData(){
                axios.get('/api/users')
                    .then(response => {
                        //console.log(response.data);
                        this.users=(response.data);
                        console.log(this.users);
                    });
            },

            deleteUsers(){
                this.selected.data=this.selectedUsers;

                axios.delete('http://cms.test/api/users/delete',this.selected)
                    .then(response => {

                        this.updateData();
                        this.selectedUsers=[]
                    });








            },

            submitFormNewUser(){
                this.modalShown = !this.modalShown;

                console.log(this.modalShown);

                axios.post('http://cms.test/api/users',this.newUser)
                    .then(response => {
                        console.log(response);
                    });

                console.log("Done!");
                this.$emit('exit', true)

                this.close();

            },







        }
    }
</script>