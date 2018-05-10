<template>
  <v-app>
    <v-navigation-drawer
      persistent
      :mini-variant="miniVariant"
      :clipped="clipped"
      v-model="drawer"
      enable-resize-watcher
      fixed
      app
    >
      <v-toolbar color="light-blue lighten-2" flat>
        <v-list>
          <v-list-tile>
          </v-list-tile>
        </v-list>
      </v-toolbar>
      <v-divider></v-divider>
      <v-list dense class="pt-0">
        <v-list-tile
          value="true"
          v-for="(item, i) in items"
          :key="item.title"
        >
          <v-list-tile-content>
            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar
      app
      :clipped-left="clipped"
      color="light-blue darken-1"
    >
      <v-toolbar-side-icon @click.stop="drawer = !drawer" color="light-blue lighten-2"></v-toolbar-side-icon>
      <v-toolbar-title v-text="title"></v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn @click="logout" flat>Cerrar Sesión
        <v-icon dark right>exit_to_app</v-icon>
      </v-btn>
    </v-toolbar>
    <v-content>
      <router-view/>
    </v-content>
    <v-footer :fixed="fixed" app>
      <span>&copy; 2018 - URL Shortener - Acuña / Coronado</span>
    </v-footer>
  </v-app>
</template>

<script>
import CredentialsService from '@/services/Credentials.service'

export default {
  data () {
    return {
      clipped: false,
      drawer: true,
      fixed: false,
      items: [
        { title: 'URL Shortener' }
      ],
      miniVariant: false,
      right: true,
      rightDrawer: false,
      title: 'URL Shortener',
      credenciales: new CredentialsService()
    }
  },
  methods: {
    logout () {
      let vm = this
      vm.credenciales.clearCredentials()
      vm.$router.push('/login')
    }
  },
  name: 'App'
}
</script>
