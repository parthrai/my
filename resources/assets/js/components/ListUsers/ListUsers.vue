<template>
    <section>
        <!-- Modal -->




        <!-- end Modal -->


        <transition name="fade">
        <div v-if="alert.show">
                <alert-box
                        v-bind:class="alert.class"
                    v-bind:data="alert"
                        @close="closeAlert"
                ></alert-box>
        </div>
        </transition>

        <br><br>

    <div class="card-header">
        <div class="row">
        <div class="col-lg-3">
            Users
        </div>


        <div class="col-lg-9 text-right">


            <button type="button" class="btn btn-danger" @click="deleteUsers" >Delete</button>


            <v-btn fab dark color="blue">
                <v-icon dark>list</v-icon>
            </v-btn>



                <v-dialog v-model="dialog" persistent max-width="500px">
                    <v-btn fab slot="activator" color="primary" dark> <v-icon dark>add</v-icon></v-btn>
                    <v-card>
                        <v-card-title>
                            <span class="headline">New user</span>
                        </v-card-title>
                        <v-card-text>
                            <v-container grid-list-md>
                                <v-layout wrap>
                                    <v-flex xs12>
                                        <v-text-field label="Name" hint="User's full name" v-model="newUser.name" required></v-text-field>

                                    </v-flex>

                                    <v-flex xs12>
                                        <v-select v-model="newUser.type"
                                                :items="['User', 'Admin']"
                                                label="Type"
                                                required
                                        ></v-select>


                                    </v-flex>

                                    <v-flex xs12>
                                        <v-text-field label="Email" :rules="[rules.required, rules.email]" v-model="newUser.email"></v-text-field>
                                    </v-flex>
                                    <v-flex xs12>
                                        <v-text-field label="Password" type="password" required v-model="newUser.password"></v-text-field>
                                    </v-flex>


                                </v-layout>
                            </v-container>
                            <small>*indicates required field</small>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" flat @click.native="dialog = false">Close</v-btn>
                            <v-btn color="blue darken-1" flat  @click="submitFormNewUser">Save</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>





        </div>
        </div>
    </div>

    <div class="card-body">

        <v-card>
            <v-card-title>
                Users
                <v-spacer></v-spacer>
                <v-text-field
                        v-model="search"
                        append-icon="search"
                        label="Search"
                        single-line
                        hide-details
                ></v-text-field>
            </v-card-title>
        </v-card>

        <v-data-table
                :headers="headers"
                :items="users"
                :search="search"
                v-model="selectedUsers"
                item-key="name"
                select-all
                class="elevation-1"
        >


            <template slot="items" slot-scope="props">
                <td>
                    <v-checkbox
                            v-model="props.selectedUsers"
                            value="props.item"
                            primary
                            hide-details
                    ></v-checkbox>
                </td>

                <td>{{ props.item.name }}</td>
                <td class="text-xs-right">{{ props.item.type }}</td>
                <td class="text-xs-right">{{ props.item.email }}</td>

                <td class="text-xs-right">{{ props.item.updated_at }}</td>

            </template>
        </v-data-table>


        {{selectedUsers}}



        <!--

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





                <tbody v-for="(user,index) in users" >

                    <transition name="fade">

                        <tr>
                            <td>{{user.name}}</td>
                            <td>{{user.type}}</td>
                            <td>{{user.email}}</td>
                            <td>{{user.updated_at}}</td>
                            <td><input type="checkbox" class="form-check" :value="user.id" v-model="selectedUsers" ></td>

                        </tr>
                    </transition>

                </tbody>







        </table>

        -->

    </div>

    </section>
</template>

<script>

    export default{
        data(){
            return{

                search:'',
                users:[],
                selectedUsers:[],
                selected:{
                },

                rules: {
                    required: value => !!value || 'Required.',

                    email: value => {
                        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        return pattern.test(value) || 'Invalid e-mail.'
                    }
                },


                dialog:false,

                newUser:{
                    name:'',
                    type:'',
                    email:'',
                    password:'',

                },

                modalShown:false,

                alert:{
                    show:false,
                    class:'',
                    content:'',
                },


                showAlerts:false,



                headers: [
                    {
                        text: 'Name',
                        align: 'left',
                        sortable: true,
                        value: 'name'
                    },
                    { text: 'type', value: 'type',align:'center' },
                    { text: 'email', value: 'email' , align:'center'},
                    { text: 'last update', value: 'updated_at', align:'center' },

                ],


            }
        },

        computed:{
            check(){
                return this.$store.getters.getName
            }

        },

        watch: {
            selectedUsers(after, before) {
               console.log(this.selectedUsers);
            }
        },

        mounted(){

            //console.log(this.users.data);
            axios.get('/api/users')
                .then(response => {
                    console.log(response.data);
                    this.users=(response.data);
                    console.log(this.users);
                }) .catch(function (error) {
                // handle error
                console.log("the error is ");
                console.log(error);
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

                axios.post('/api/users/delete',this.selected)
                    .then(response => {

                        this.updateData();
                        this.selectedUsers=[]
                    });

                this.alert={
                    class:'alert alert-warning alert-dismissible fade show',
                    content:'Users successfully deleted ! ',
                    show:true,
                }




            },

            submitFormNewUser(){
                this.modalShown = !this.modalShown;

                console.log(this.modalShown);

                axios.post('/api/users',this.newUser)
                    .then(response => {
                        console.log(response);
                    });

               this.dialog=false;

                this.alert={
                    class:'alert alert-success alert-dismissible fade show',
                    content:this.newUser.name+' successfully added ! ',
                    show:true,
                }

                this.newUser.name='';
                this.newUser.email='';
                this.newUser.type='';
                this.newUser.password='';

            },


            closeAlert(){

                this.alert.show=false;
            }






        }
    }
</script>


<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
        opacity: 0
    }
</style>