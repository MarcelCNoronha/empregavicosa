<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                
                <div  
                    v-if="submitted && not_sent"
                    class="alert alert-danger mt-5" 
                    role="alert"
                >
                    Email Inexistente
                </div>

                <div
                    v-if="submitted && sent"
                    class="alert alert-success mt-5" 
                    role="alert"
                >
                    Enviamos para seu email as instruções para redefinir sua senha
                </div>

                <div class="row mt-5 text-center">
                    <div class="col-12">
                        <img 
                            src="/image/logo.jpg" 
                            alt="logo"
                        >
                    </div>
                </div>

                <div class="row mt-5 text-center">
                    <div class="col-12">
                        <p class="fs-5">
                            <span class="fw-bold text-primary"> 
                                Redefinir Senha
                            </span> 
                            <br>
                            Informe seu e-mail para que possamos enviar as instruções para redefinir sua senha.
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
                            >
                            <div 
                                v-if="submitted && v$.form.email.$invalid"
                                class="invalid-feedback"
                            >
                                O campo email é obrigatório
                            </div>
                        </div>
                    </div> 
                </form>

                <div class="row text-center mt-5">
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
    import { required } from '@vuelidate/validators';
    import Swal from 'sweetalert2';
    export default {
        setup: ()   => ({ v$: useVuelidate() }),
        data() {
            return {
                form: {
                    email: ''
                },
                submitted: false,
                sent: false,
                not_sent: false
            }
        },
        validations() {
            return {
                form: {
                    email: {required}
                }
            }            
        },
        methods: {
            post() {
                this.submitted = true;
                this.sent = false;
                this.not_sent = false;

                if(this.v$.form.$invalid)
                    return;

                Swal.fire({
                    title: "Enviando...",
                    text: "Aguarde enquanto estamos enviando o email de redefinição.",
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });

                axios({
                    method: 'post',
                    url: '/api/forgot-password',
                    data: this.form
                }).then((response) => {
                    if(response.data.success) {
                        this.sent = true;                          
                    } else {
                        this.not_sent = true;
                    }                    
                    Swal.close();
                });
            }
        }
    }
</script>

<style>
    
</style>