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
            <v-list-tile-title class="title">
              Menú
            </v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-toolbar>
      <v-divider></v-divider>
      <v-list dense class="pt-0">
        <v-list-tile
          value="true"
          v-for="(item, i) in items"
          :key="item.title"
          @click=""
        >
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>
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
      <v-btn @click="" flat>Cerrar Sesión
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
export default {
  data () {
    return {
      clipped: false,
      drawer: true,
      fixed: false,
      items: [
        { title: 'Acortar URL', icon: 'dashboard' },
        { title: 'Lista URL', icon: 'question_answer' }
      ],
      miniVariant: false,
      right: true,
      rightDrawer: false,
      title: 'URL Shortener'
    }
  },
  name: 'App'
}
</script>
