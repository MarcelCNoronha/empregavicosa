<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="progress" style="height: 7px;">
                            <div class="progress-bar bg-primary" 
                                style="width: 50%" 
                                role="progressbar" 
                                aria-valuenow="0" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div> 
                
                <div class="row mt-3">
                    <div class="col-1">           
                        <img class="brand" src="/image/logo.jpg" alt="logo" style="width: 100px;">                        
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card mt-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">
                                            Nova Publicação
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control"
                                            id="title" 
                                            placeholder="Digite o título"
                                            v-model="form.title"
                                            :class="{'is-invalid': submitted && v$.form.title.$invalid }"
                                        >
                                        <div 
                                            v-if="submitted && v$.form.title.$invalid"
                                            class="invalid-feedback"
                                        >
                                            O campo título é obrigatório
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <textarea 
                                            class="form-control" 
                                            placeholder="Digite a descrição"  
                                            style="height: 100px"
                                            v-model="form.description"
                                            :class="{'is-invalid': submitted && v$.form.description.$invalid }"
                                        >
                                        </textarea>
                                        <div 
                                            v-if="submitted && v$.form.description.$invalid"
                                            class="invalid-feedback"
                                        >
                                            O campo título é obrigatório
                                        </div>
                                    </div>
                                    <div class="col-md-2 offset-10 mt-1">
                                        <button 
                                            type="button" 
                                            class="btn btn:hover btn-text" 
                                            @click="store()"
                                        >
                                            Cadastrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">    
                        <div class="card mt-1">
                            <div class="card-body">
                                <label class="form-label">
                                    Publicações
                                </label>

                                <div v-for="(publication) in publications" class="card mt-1">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <p class="text-primary">
                                                    {{ publication.title }}
                                                </p>
                                                <p>
                                                    {{ publication.description }}
                                                </p>
                                            </div>
                                            <div class="col-md-2 text-center mt-5">
                                                <a href="#" @click="details(publication.id)" class="text-info">Selecionar</a>
                                            </div>
                                        </div>                                
                                    </div>
                                </div>

                            </div>
                        </div>
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
                publications: [],
                form: {
                    user_id: this.user.id,
                    title: '',
                    description: '',
                    active: 1
                },
                submitted: false
            }
        },
        props: [
            'user',
        ],
        validations() {
            return {
                form: {
                    title: {required},
                    description: {required}
                }
            }            
        },
        methods: {
            getPublications() {
                axios({
                    method: 'get',
                    url: '/api/publications'
                }).then((response) => {
                    this.publications = response.data
                });
            },
            details(id) {
                window.location.href = "/welcome-details/" + id;
            },
            store() {
                this.submitted = true;

                if(this.v$.form.$invalid)
                    return;

                Swal.fire({
                    title: "Cadastrando Publicação...",
                    text: "Aguarde enquanto estamos cadastrando a publicação.",
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });

                axios({
                    method: 'post',
                    url: '/api/publications',
                    data: this.form
                }).then((response) => {
                    if(response.data) {
                        this.getPublications();
                        this.form.title = '';
                        this.form.description = '';
                        this.submitted = false;
                        Swal.close();
                    }
                });
            }
        },
        mounted() {
            this.getPublications();
        }
    }
</script>

<style>
    
</style>