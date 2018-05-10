<template>
  <v-container fluid>
    <v-layout row wrap>
      <v-flex xs4>
        <v-btn @click="dialog = true" dark color="light-blue lighten-2">
          Acortar URL
        </v-btn>
      </v-flex>
      <v-flex xs12>
        <h1>Lista de URLs Procesadas</h1>
      </v-flex>
    </v-layout>
    <v-layout row wrap>
      <v-flex xs12 md6>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  data () {
    return {
    }
  }
}
</script>
