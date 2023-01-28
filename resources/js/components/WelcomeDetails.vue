<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="progress" style="height: 7px;">
                            <div class="progress-bar bg-primary" 
                                style="width: 100%" 
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

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-primary">
                                            {{ publication.title }}
                                        </p>
                                        <p>
                                            {{ publication.description }}
                                        </p>
                                    </div>
                                </div>                                
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-5 offset-1 d-grid">
                                <button type="button" class="btn btn:hover btn-text" @click="chennel()">
                                    Ligar
                                </button>
                            </div>
                            <div class="col-md-5 d-grid">
                                <button type="button" class="btn btn-success" @click="whatsapp()">
                                    Whatsapp
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'publication',
        ],
        methods: {
            whatsapp() {
                window.open('https://api.whatsapp.com/send?phone=' + this.publication.user.phone.replace(/[^0-9]/g, ''));
            },
            chennel() {
                
            }
        },        
    }
</script>