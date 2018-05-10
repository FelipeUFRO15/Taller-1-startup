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
        <v-card dark color="light-blue lighten-4" v-for="direccion in direcciones" :key="direccion.id">
          <v-card-title primary-title>
            <div>
              <h3 class="headline mb-0">{{ direccion.url }}</h3>
              <div>{{ direccion.short }}</div>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import {direccionService} from '@/services/Direccion.service'

export default {
  data () {
    return {
      direcciones: []
    }
  },
  mounted () {
    let vm = this
    direccionService.query().then(data => {
      vm.direcciones = data.body
      console.log(vm.direcciones)
    }, erro => {
      console.log('error')
    })
  }
}
</script>
