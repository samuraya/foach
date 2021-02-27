<template>
  
  <v-app id="inspire">
      <v-main>
         <v-container fluid fill-height>
            <v-row align="center" justify="center" no-gutters dense>
               <v-col md="6">
                  <v-card outlined class="elevation-1" v-for="employee in employees" :key="employee.id"> 
                      
                    <v-list-item class="grow">
                      <v-row>
                      <v-col md="3">
                      <v-list-item-avatar color="grey darken-3" size="100">
                        <!-- <v-img
                          class="elevation-6"
                          alt=""
                          src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                        ></v-img> -->
                        <Avataaars></Avataaars>
                      </v-list-item-avatar>
                      </v-col>
                      <v-col md="6">
                      <v-list-item-content>
                        <v-list-item-title>{{employee.fullname}}</v-list-item-title>
                        <v-list-item-subtitle>
                          {{employee.position}}
                        </v-list-item-subtitle>                 
                      </v-list-item-content> 
                      <v-switch
                        @change="switchVacation(employee)"
                        v-model="employee.on_vacation"
                        label="On vacation"
                      ></v-switch>
                      </v-col>  
                      </v-row>    
                    </v-list-item>                     
                  </v-card>
                  <v-spacer></v-spacer>
               </v-col> 
            </v-row>          
         </v-container>
      </v-main>     
   </v-app>
</template>

<script>
  import Avataaars from 'vuejs-avataaars';

  export default {
    name: 'Employees',
    props: ['employees'],
    components: {
      Avataaars
    },
    data() {
      return {
        
      }
    },
    methods:{
      switchVacation(employee){
        axios.post('/vacation', 
            {
               id: employee.id,
               on_vacation: employee.on_vacation
            }).then(response => {               

            }).catch((error) => {
               
            });
        // console.log(employee.id, employee.on_vacation);
      }
    }
  }
</script>
<style scoped>
  
  .v-card {
    margin-top: 15px;
  }

  .v-list-item__title {
    margin-bottom: 20px;
  }
  
</style>