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
                  <h1 style="color: #039BE5;">Registro</h1>
                  <br>
                  <h3 style="color: #00B0FF;"></h3>
                </v-flex>
              </v-layout>
              <br><br>
              <v-layout row wrap>
                <v-flex xs8 offset-xs2>
                  <v-form>
                    <v-text-field
                      label="Nombre"
                      v-model="user.name"
                      color="light-blue darken-1"
                      required
                    ></v-text-field>
                    <v-text-field
                      label="Correo Electronico"
                      type="email"
                      v-model="user.email"
                      color="light-blue darken-1"
                      required
                    ></v-text-field>
                    <v-text-field
                      label="Contraseña"
                      type="password"
                      v-model="user.password"
                      color="light-blue darken-1"
                      required
                    ></v-text-field><br><br>
                    <v-btn @click="registrar(user)" block style="border-radius: 7px;" color="light-blue darken-1 white--text">Registrarse</v-btn>
                    
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
import {userService} from '@/services/User.service'

export default {
  data () {
    return {
      user: {},
      rules: [
        v => !!v || 'Campo Requerido'
      ]
    }
  },
  methods: {
    registrar (user) {
      let vm = this
      userService.save(user).then(data => {
        console.log(data)
        vm.$router.push('/')
      }, err => {
        alert('error')
        console.log(err)
      })
    }
  }
}
</script>
