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
        <v-card light color="light-blue lighten-4" v-for="direccion in direcciones" :key="direccion.id">
          <v-card-title primary-title>
            <div>
              <h3 style="color: orange;">URL original: {{ direccion.url }}</h3>
              <a :href="direccion.short" style="color: green;" target="_blank">URL acortada: {{ direccion.short }}</a>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
    </v-layout>
    <direccion-form @nuevaDireccion="nuevaDireccion" @closeDialog="dialog = false" :dialog="dialog"></direccion-form>
  </v-container>
</template>

<script>
import {direccionService} from '@/services/Direccion.service'
import DireccionForm from '@/components/DireccionForm'

export default {
  data () {
    return {
      direcciones: [],
      dialog: false
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
  },
  methods: {
    nuevaDireccion (direccion) {
      let vm = this
      vm.direcciones.push(direccion)
      vm.dialog = true
    }
  },
  components: {DireccionForm}
}
</script>
