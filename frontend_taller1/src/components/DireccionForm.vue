<template>
  <v-dialog
    v-model="dialog"
    scrollable
    :overlay="false"
    max-width="800px"
    transition="dialog-transition"
    @update:returnValue="closeDialog()">
    <v-card>
      <v-toolbar flat dark color="light-blue lighten-2">
        <v-toolbar-title> Acortar URL</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn icon @click="closeDialog()">
          <v-icon>close</v-icon>
        </v-btn>
      </v-toolbar>
      <v-card-text>
        <v-container grid-lis-md>
          <v-layout column wrap>
            <v-form v-model="valid" lazy-validation>
            <v-flex xs12>
              <v-text-field :readonly="lectura" :rules="rules" v-model="direccion.url" label="URL" color="light-blue lighten-2"></v-text-field>
            </v-flex>
            </v-form>
          </v-layout>
          <v-flex xs2 offset-xs5>
            <v-btn v-if="lectura !== true " :disabled="!valid" dark block color="light-blue lighten-2" @click="acortarURL(direccion)">Acortar</v-btn>
          </v-flex>
        </v-container>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>

<script>
import {direccionService} from '@/services/Direccion.service'

export default {
  data () {
    return {
      valid: false,
      direccion: {},
      rules: [
        v => !!v || 'Campo Requerido'
      ],
      lectura: false
    }
  },
  props: ['dialog'],
  methods: {
    acortarURL (direccion) {
      let vm = this
      direccionService.save(direccion).then(data => {
        direccion.short = data.body.short
        vm.$emit('nuevaDireccion', direccion)
        vm.closeDialog()
        console.log(data)
      }, err => {
        alert('error')
        console.log(err)
      })
    },
    closeDialog () {
      let vm = this
      vm.$emit('closeDialog')
      vm.direccion = {}
    }
  }
}
</script>