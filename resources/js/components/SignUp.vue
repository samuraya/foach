<template>
   <v-app id="inspire">
      <v-main>
         <v-container fluid fill-height>
            <v-row align="center" justify="center" no-gutters dense>
               <v-col md="6">

                  <v-card class="elevation-1" outlined>        
                     <v-card-text>                              
                        <v-form>
                           <v-row no-gutters dense> 
                              <v-col>
                              <v-divider color="#43A047" dense></v-divider>
                              </v-col>
                           </v-row>
                           <v-row>
                              <v-col>
                              <v-card-title>Sign up</v-card-title>
                              </v-col>
                           </v-row>
                           <v-row>
                              <v-col>
                                 <FormInlineMessage
                                    v-if="$v.firstName.$error"
                                 >
                                    First name must be at least 2 characters long                                
                                 </FormInlineMessage>
                                 <v-text-field
                                    v-model="firstName"
                                    
                                    name="login"
                                    label="First Name"
                                    type="text"
                                    outlined
                                    @blur="$v.firstName.$touch()"
                                 ></v-text-field>
                                 
                              </v-col>
                              <v-col>
                                 <FormInlineMessage
                                    v-if="$v.lastName.$error"
                                 >
                                    Last name must be at least 2 characters long                                
                                 </FormInlineMessage>
                                 <v-text-field
                                    v-model="lastName"
                                    
                                    name="login"
                                    label="Last Name"
                                    type="text"
                                    outlined
                                    @blur="$v.lastName.$touch()"
                                 ></v-text-field>
                                 
                              </v-col>
                           </v-row>
                           <v-row>
                              <v-col>
                                 <FormInlineMessage
                                    v-if="$v.phone.$error"
                                 >
                                    Phone number must be given in digits                               
                                 </FormInlineMessage>
                                 <v-text-field
                                    v-model="phone"
                                    prepend-inner-icon="phone"
                                    name="phone"
                                    label="Phone Number"
                                    type="number"
                                    outlined
                                    @blur="$v.phone.$touch()"
                                 ></v-text-field>
                                 
                              </v-col>
                              <v-col>
                                 <FormInlineMessage
                                    v-if="$v.amountSelected.$error"
                                 >
                                    Please select your investment amount                                
                                 </FormInlineMessage>
                                 <v-select
                                    :items="amounts"
                                    v-model="amountSelected"
                                    prepend-inner-icon="euro_symbol"
                                    label="Amount to Invest"
                                    outlined
                                    @blur="$v.amountSelected.$touch()"
                                 ></v-select>
                                 
                              </v-col>
                           </v-row>
                           <v-row>
                              <v-col>
                                 <FormInlineMessage
                                    v-if="$v.email.$error"
                                 >
                                    Please provide valid email                                
                                 </FormInlineMessage>
                                 <v-text-field
                                    v-model="email"
                                    id="email"
                                    prepend-inner-icon="email"
                                    name="email"
                                    label="Email"
                                    type="email"
                                    outlined
                                    @blur="$v.email.$touch()"
                                 ></v-text-field>
                                 

                              </v-col>
                           </v-row>
                           <v-row>
                              <v-col>
                                 <FormInlineMessage
                                    v-if="$v.emailConfirm.$error"
                                 >
                                    Email doesn't match                               
                                 </FormInlineMessage>
                                 <v-text-field
                                    v-model="emailConfirm"
                                    id="email-confirm"
                                    prepend-inner-icon="email"
                                    name="email-confirm"
                                    label="Confirm Email"
                                    type="email"
                                    outlined
                                    @blur="$v.emailConfirm.$touch()"
                                 ></v-text-field>
                                 

                              </v-col>
                           </v-row>
                           <v-row>
                              <v-col>
                                 <FormInlineMessage
                                    v-if="$v.password.$error"
                                 >
                                    Password must be at least 8 characters long                            
                                 </FormInlineMessage>
                                 <v-text-field
                                    v-model="password"
                                    id="password"
                                    prepend-inner-icon="lock"
                                    name="password"
                                    label="Password"
                                    type="password"
                                    outlined
                                    @blur="$v.password.$touch()"
                                 ></v-text-field>
                                 
                              </v-col>
                           </v-row>
                           <v-row>
                              <v-col>
                                 <FormInlineMessage
                                    v-if="$v.passwordConfirm.$error"
                                 >
                                    Password doesn't match                            
                                 </FormInlineMessage>
                                 <v-text-field
                                    v-model="passwordConfirm"
                                    id="confirm-password"
                                    prepend-inner-icon="lock"
                                    name="confirm-password"
                                    label="Confirm Password"
                                    type="password"
                                    outlined
                                    @blur="$v.passwordConfirm.$touch()"
                                 ></v-text-field>
                                 
                              </v-col>
                           </v-row>
                           <v-row no-gutters>
                              <v-col>
                                 <FormInlineMessage
                                    v-if="$v.ageOk.$error"
                                 >
                                    You must be 18 or above                          
                                 </FormInlineMessage>
                                 <v-checkbox
                                    v-model="ageOk"
                                    label="I am 18 years of age"
                                    value="ok"
                                 ></v-checkbox>
                                 
                              </v-col>
                           </v-row>
                           <v-row no-gutters>
                              <v-col>
                                 <v-checkbox
                                    v-model="newsOk"
                                    label="I would like to receive more information"
                                    value="ok"
                                 ></v-checkbox>
                              </v-col>
                           </v-row>

                           <!-- server error alert-->
                           <v-row align="center" justify="center" >                              
                              <v-alert
                                 prominent
                                 type="error"
                                 v-if="serverErrors.any()"
                               >
                                 <v-row align="center" v-for="(error, index) in serverErrors.all()" :key="index">
                                   <v-col class="grow">
                                     ***{{error[0]}}
                                   </v-col>                                  
                                   
                                 </v-row>
                                 <v-btn @click.prevent="resetServerErrors">Try again</v-btn>
                               </v-alert>                              
                                       
                           </v-row>

                          <v-spacer></v-spacer>

                           <v-row align="center" justify="center">
                              
                                 <v-btn 
                                    color="primary" 
                                    x-large
                                    @click.prevent="submit"
                                    :disabled="$v.$invalid"
                                 >
                                 Create Account
                                 </v-btn>
                              
                           </v-row>



                        </v-form>
                     </v-card-text>
                     
                  </v-card>
               </v-col> 

            </v-row>
            
         </v-container>

      </v-main>

      <!-- Loading overlay -->
      <v-dialog v-model="loading" fullscreen full-width>
        <v-container fluid fill-height>
          <v-layout justify-center align-center>
            <v-progress-circular
              indeterminate
              color="primary">
            </v-progress-circular>
          </v-layout>
        </v-container>
      </v-dialog>

      
   </v-app>
</template>

<script>

import axios from 'axios';
import { validationMixin } from 'vuelidate';
import { required } from 'vuelidate/lib/validators';
import { minLength, maxLength, numeric, minValue, email, sameAs } from 'vuelidate/lib/validators';
import { Errors } from 'form-backend-validation';
 
export default {
   name: 'SignUp',
   mixins: [validationMixin],
   props: {
      source: String,
   },

   data() {
      return {
         loading: false,
         firstName:'',
         lastName:'',
         phone:'',
         amountSelected: 0,
         amounts:[200, 300, 500],
         ageOk:'',
         email:'',
         emailConfirm:'',
         password:'',
         passwordConfirm:'',
         newsOk:'',
         serverErrors: new Errors(),  
         
      }
   },

   validations: {
    firstName: {
      required,
      minLength: minLength(2),
      maxLength: maxLength(12)      
   },
   lastName: {
      required,
      minLength: minLength(2),
      maxLength: maxLength(12)  
   },
   phone: {
      required,
      numeric,
   },
   amountSelected: {
      required,
      minValue: minValue(1)
   },
   email: {
      required,
      email
   },
   emailConfirm: {
      required,
      sameAsEmail: sameAs('email')
   },
   password: {
      required,
      minLength: minLength(8),
   },
   passwordConfirm: {
      required,
      sameAsPassword: sameAs('password')
   },
   ageOk: {
      required,
      minLength: minLength(2)
   }

  },

  methods: {

      submit(){
      this.loading = true;
      var that = this;
      this.$v.$touch();
      if (this.$v.$error) return; 

      setTimeout(function(){
         axios.post('/register', 
            {
               first_name:that.firstName,
               last_name:that.lastName,
               amount: that.amountSelected,
               email: that.email,
               phone: that.phone,
               password: that.password
            }).then(response => {               
               that.loading = false;
               Turbolinks.visit('/employees');   

            }).catch((error) => {
                that.serverErrors = new Errors(error.response.data.errors)
               that.loading = false; 
            });
          
      }, 2000)              
    },
    resetServerErrors() {
      this.serverErrors = new Errors();
    }

  },
};
</script>

<style scoped>
   
   .v-input--checkbox  {
        margin: 0;
        padding: 0;
    }
   .container {
      max-width: 1024px;
   }

   .v-divider {
      margin-top: 20px;
      margin-bottom: 0;
      padding-bottom: 0;
      width: 9%;      
      margin-left: 10px;
      height: 0px;
      border: none;
      border-top: 3px solid;
      border-top-color: #43A047;
   }
   .v-card__title {
      padding: 0;
      margin-left: 10px;
   }
   .v-btn {
      margin-bottom: 50px;
   }

   .v-card__title {
      font-family: 'Open Sans', sans-serif;
      font-size: 24px;
   }

   .v-form {
      padding: 20px;
   }
   

</style>
