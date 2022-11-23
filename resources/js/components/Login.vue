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
                                Bem Vindo ao Emprega Viçosa 
                            </span> 
                            <br>
                            Que bom te ver novamente, realize o login
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
                                id="mail" 
                                placeholder="Digite seu email"
                                v-model="form.email"
                            >
                        </div>
                    </div> 
                </form>

                <div class="row text-center mt-5">
                    <div class="col-8 offset-2 d-grid">
                        <button 
                            type="button" 
                            class="btn btn-primary text-white"
                            @click="getIsUser()"
                        >
                            Continuar
                        </button>
                    </div>
                </div>
                {{isUser}}
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                form: {
                    email: ''
                },
                isUser: ''
            }
        },
        mounted() {
            
        },
        methods: {
           getIsUser() {
                axios({
                    method: 'get',
                    url: '/api/user/is-user/' + this.form.email
                }).then((response) => {
                    this.isUser = response.data.success
                });
           }
        }
    }
</script>

<style>
    
</style>