<template>
  <v-app light flat>
    <v-card color="grey lighten-5" flat>
      <br><br>
      <v-layout row>
        <v-flex xs10 offset-xs1 md6 offset-md3>
          <center>
            <v-card style="width: 370px; height: 500px; border-radius: 7px;" class="card--flex-toolbar grey lighten-3">
              <br><br>
              <v-layout>
                <v-flex xs8 offset-xs2 md6 offset-md3 class="text-xs-center">
                  <h1 style="color: #039BE5;">URL Shortener</h1>
                  <br>
                  <h3 style="color: #00B0FF;">Bienvenido/a </h3>
                </v-flex>
              </v-layout>
              <br><br>
              <v-layout row wrap>
                <v-flex xs8 offset-xs2>
                  <v-form>
                    <v-text-field
                      label="Correo Electronico"
                      type="email"
                      v-model="credentials.email"
                      color="light-blue darken-1"
                      required
                    ></v-text-field>
                    <v-text-field
                      label="Contraseña"
                      type="password"
                      v-model="credentials.password"
                      color="light-blue darken-1"
                      required
                    ></v-text-field><br><br>
                    <small v-if="errorLogin" class="red--text">Email o Password Incorrectos</small>
                    <v-btn :loading="isLoading" @click="submit(credentials)" :disabled="!isValidForm" block style="border-radius: 7px;" color="light-blue darken-1 white--text">Iniciar Sesion</v-btn>
                    
                  </v-form>
                </v-flex>
              </v-layout>
            </v-card>
          </center>
        </v-flex>
      </v-layout>
    </v-card>
  </v-app>
</template>

<script>
import {loginService} from '@/services/Login.service'
import CredentialsService from '@/services/Credentials.service.js'

export default {
  data () {
    return {
      isLoading: false,
      credentials: {
        usuario: '',
        password: ''
      },
      errorLogin: false,
      credentialService: new CredentialsService()
    }
  },
  methods: {
    submit (credentials) {
      let vm = this
      vm.isLoading = true
      loginService.save(credentials).then(data => {
        vm.credentialService.setToken(data.body.token)
        vm.$router.push('/')
      }, () => {
        vm.errorLogin = true
        vm.isLoading = false
        alert('credenciales erroneas')
      })
    }
  },
  computed: {
    isValidForm () {
      let vm = this
      return vm.credentials.email !== '' && this.credentials.password !== ''
    }
  }
}
</script>
