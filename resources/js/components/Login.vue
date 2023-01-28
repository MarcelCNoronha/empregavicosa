<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <div 
                    v-if="error" 
                    class="alert alert-danger mt-5" 
                    role="alert"
                >
                    {{message}}
                </div>
    
                <div class="row mt-5 text-center">
                    <div class="col-12">
                        <img 
                            src="image/logo.jpg" 
                            alt="logo"
                        >
                    </div>
                </div>

                <div class="row mt-5 text-center">
                    <div class="col-12">
                        <p class="fs-5">
                            <span class="fw-bold text-primary"> 
                                Bem Vindo ao Emprega Viçosa! 
                            </span> 
                            <br>
                            Informe suas credênciais para acessar a plataforma
                        </p>
                    </div>
                </div>
                <form>   
                    <div class="row mt-3">
                        <div class="col-12">
                            <label class="form-label">
                                Email
                            </label>
                            <input 
                                type="mail" 
                                class="form-control"
                                :class="{'is-invalid': submitted && v$.form.email.$invalid }"
                                id="mail" 
                                placeholder="Digite seu email"
                                v-model="form.email"
                                :disabled="filledEmail"
                            >
                            <div 
                                v-if="submitted && v$.form.email.required.$invalid"
                                class="invalid-feedback"
                            >
                                O campo email é obrigatório
                            </div> 
                            
                            <div 
                                v-if="submitted && v$.form.email.email.$invalid"
                                class="invalid-feedback"
                            >
                                O campo email deve ser um email válido
                            </div>
                        </div>
                        <div v-if="filledEmail && isUser" class="col-12 mt-3">
                            <label class="form-label">
                                Senha
                            </label>
                            <input 
                                type="password" 
                                class="form-control"
                                :class="{'is-invalid': submitted && v$.form.password.required.$invalid }"
                                id="password" 
                                placeholder="Digite à sua senha"
                                v-model="form.password"
                            >
                            <div 
                                v-if="submitted && v$.form.password.required.$invalid"
                                class="invalid-feedback"
                            >
                                O campo senha é obrigatório
                            </div>
                            <a :href="/forgot-password/">
                                Recuperar Senha
                            </a>
                        </div>
                        <div v-if="filledEmail && !isUser">
                            <div class="col-12 mt-3">
                                <label class="form-label">
                                    Nome
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    :class="{'is-invalid': submitted && v$.form.name.$invalid }"
                                    id="name" 
                                    placeholder="Digite seu nome"
                                    v-model="form.name"
                                >
                                <div 
                                    v-if="submitted && v$.form.name.$invalid"
                                    class="invalid-feedback"
                                >
                                    O campo nome é obrigatório
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">
                                    Telefone
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    :class="{'is-invalid': submitted && v$.form.phone.$invalid }"
                                    id="phone" 
                                    placeholder="Digite seu telefone"
                                    v-model="form.phone"
                                    v-mask-phone.br
                                >
                                <div 
                                    v-if="submitted && v$.form.phone.required.$invalid"
                                    class="invalid-feedback"
                                >
                                    O campo telefone é obrigatório
                                </div>
                                <div 
                                    v-if="submitted && v$.form.phone.minLength.$invalid"
                                    class="invalid-feedback"
                                >
                                    O campo telefone está incompleto
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">
                                    Idade
                                </label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    :class="{'is-invalid': submitted && v$.form.age.$invalid }"
                                    id="age" 
                                    placeholder="Digite sua idade"
                                    v-model="form.age"
                                >
                                <div 
                                    v-if="submitted && v$.form.age.required.$invalid"
                                    class="invalid-feedback"
                                >
                                    O campo idade é obrigatório
                                </div>
                                <div 
                                    v-if="submitted && v$.form.age.minValue.$invalid"
                                    class="invalid-feedback"
                                >
                                    O campo idade deve ser superior a 1 ano
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">
                                    Minha senha
                                </label>
                                <input 
                                    type="password" 
                                    class="form-control" 
                                    :class="{'is-invalid': submitted && v$.form.password.$invalid }"
                                    id="password" 
                                    placeholder="Digite à sua senha"
                                    v-model="form.password"
                                >
                                <div 
                                    v-if="submitted && v$.form.password.required.$invalid"
                                    class="invalid-feedback"
                                >
                                    O campo senha é obrigatório
                                </div>
                                <div 
                                    v-if="submitted && v$.form.password.minLength.$invalid"
                                    class="invalid-feedback"
                                >
                                    O campo senha deve contêr 8 caracteres 
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">
                                    Repetir senha
                                </label>
                                <input 
                                    type="password" 
                                    class="form-control" 
                                    :class="{'is-invalid': submitted && v$.form.repeatPassword.$invalid }"
                                    id="repeatPassword" 
                                    placeholder="Digite à sua senha"
                                    v-model="form.repeatPassword"
                                >
                                <div 
                                    v-if="submitted && v$.form.repeatPassword.required.$invalid"
                                    class="invalid-feedback"
                                >
                                    O campo senha é obrigatório
                                </div>
                                <div 
                                    v-if="submitted && v$.form.repeatPassword.minLength.$invalid"
                                    class="invalid-feedback"
                                >
                                    O campo senha deve contêr 8 caracters
                                </div>
                            </div>
                        </div>
                    </div> 
                </form>

                <div class="row text-center mt-5 mb-5">
                    <div class="col-8 offset-2 d-grid">
                        <button 
                            type="button" 
                            class="btn btn:hover btn-text"
                            @click="post()"
                        >
                            Continuar
                        </button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import { useVuelidate } from '@vuelidate/core';
    import { required, requiredIf, email, minValue, minLength, sameAs } from '@vuelidate/validators';
    import Swal from 'sweetalert2';
    export default {
        setup: ()   => ({ v$: useVuelidate() }),
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                    name: '',
                    phone: '',
                    age: '',
                    active: 1,
                    repeatPassword: ''
                },
                isUser: '',
                filledEmail: false,
                submitted: false,
                error: false,
                message: ''
            }
        },
        validations() {
            return {
                form: {
                    email: {required, email},
                    name: {
                        required: requiredIf(function () {
                            return this.filledEmail && !this.isUser
                        })
                    },
                    phone: {
                        required: requiredIf(function () {
                            return this.filledEmail && !this.isUser
                        }),
                        minLength: minLength(16)
                    },
                    age: {
                        required: requiredIf(function () {
                            return this.filledEmail && !this.isUser
                        }),
                        minValue: minValue(1)                       
                    },
                    repeatPassword: {
                        required: requiredIf(function () {
                            return this.filledEmail && !this.isUser
                        }),
                        minLength: minLength(8)
                    },
                    password: {
                        required: requiredIf(function () {
                            return this.filledEmail
                        }),
                    }
                }
            }            
        },
        methods: {
            post() {
                this.submitted = true;

                if(this.v$.form.$invalid)
                    return;

                if(!this.filledEmail) 
                    this.getIsUser();
                
                if(this.filledEmail && this.isUser)
                    this.login();

                if(this.filledEmail && !this.isUser)
                    this.store();
            },
            store() {
                Swal.fire({
                    title: "Cadastrando Usuário...",
                    text: "Aguarde enquanto estamos cadastrando o usuário.",
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });

                axios({
                    method: 'post',
                    url: '/api/users',
                    data: this.form
                }).then((response) => {
                    if(response.data) {
                        window.location.href = '/login';
                        Swal.close();
                    }
                });
            },
            login() {
                Swal.fire({
                    title: "Logando...",
                    text: "Aguarde enquanto estamos realizando o login.",
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });

                axios({
                    method: 'post',
                    url: '/api/authenticate',
                    data: this.form
                }).then((response) => {
                    if(response.data.success) {
                        window.location.href = '/welcome/' + response.data.message; 
                        this.error = false;   
                        return;                  
                    } 
                    this.error = true;
                    this.message = response.data.message;
                    Swal.close();
                });
            },
            getIsUser() {
                axios({
                    method: 'get',
                    url: '/api/user/is-user/' + this.form.email
                }).then((response) => {
                    this.isUser         = response.data.success;
                    this.filledEmail    = true;
                    this.submitted      = false;
                });
            }
        }
    }
</script>

<style>
    
</style>