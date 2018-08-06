@extends('layouts.main')

@section('content')

    <div>


        <main-nav></main-nav>

        <v-card>
            <v-container
                    fluid
                    grid-list-lg
            >

                <v-layout row wrap>
                    <v-flex xs12>
                        <v-card color="blue-grey darken-2" class="white--text">
                            <v-card-title primary-title>
                                <div class="headline">Users</div>
                                <br/>
                                <div><p>Admins - {{$users['totalAdmins']}} </p></div>
                                <br/>
                                <div>Users - {{$users['totalUsers']}}</div>
                            </v-card-title>
                            <v-card-actions>
                                <v-btn flat dark
                                    
                                >
                                    <v-icon left>
                                        add
                                    </v-icon>

                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-flex>

                </v-layout>

            </v-container>
        </v-card>



    </div>

@endsection