<template>

    <div>

    <v-navigation-drawer
            v-model="drawer"
            fixed
            app
    >
        <v-list dense>
            <v-list-tile @click="">
                <v-list-tile-action>
                    <v-icon>home</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title>Home</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
            <v-list-tile @click="">
                <v-list-tile-action>
                    <v-icon>contact_mail</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title>Contact</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-navigation-drawer>

    <v-toolbar>
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>

        <v-toolbar-title>My Site</v-toolbar-title>

        <v-spacer></v-spacer>

        <v-toolbar-items>
            <v-btn flat>Home</v-btn>
            <v-btn flat>Home</v-btn>









            <v-btn flat>
                <v-icon left>
                    person_outline
                </v-icon>
                Home
            </v-btn>


        </v-toolbar-items>

    </v-toolbar>

    </div>

</template>


<script>

    export default {
        data() {

            return {
                drawer: false
            }
        }
    }
</script>