<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <div class="row mt-5 text-center">
                    <div class="col-12">
                        <img 
                            src="image/logo_senac.png" 
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
                            Digite sua nova senha
                        </p>
                    </div>
                </div>
                
                <form>   
                    <div class="row mt-3">
                        <div class="col-12">
                            <label class="form-label">
                                Nova Senha
                            </label>
                            <input 
                                type="password" 
                                class="form-control" 
                                :class="{'is-invalid': submitted && v$.form.password.$invalid }" 
                                id="password" 
                                placeholder="Digite sua nova senha" 
                                v-model="form.password"
                            >
                            <div 
                                v-if="submitted && v$.form.password.$invalid"
                                class="invalid-feedback"
                            >
                                O campo nova senha é obrigatório
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
                    password: '',
                    email: this.email,
                    token: this.token
                },
                submitted: false,
                sent: false
            }
        },
        props: [
            'token',
            'email'
        ],
        validations() {
            return {
                form: {
                    password: {required}
                }
            }            
        },
        methods: {
            post() {
                this.submitted = true;

                if(this.v$.form.$invalid)
                    return;

                Swal.fire({
                    title: "Redefinindo...",
                    text: "Aguarde enquanto estamos redefinindo sua senha.",
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });

                axios({
                    method: 'post',
                    url: '/api/reset-password',
                    data: this.form
                }).then((response) => {
                    if(response.data.success) {
                        window.location.href= "/";                           
                    }
                    Swal.close();
                });
            }
        }
    }
</script>

<style>
    
</style>