<template>
    <form-wizard class="row col-12">
        <tab-content title="Car Information" :selected="true" class="col-sm-12">
            <div class="row car-info-tab">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="price">Car Make</label>
                        <select v-model="car.car_make_id" class="form-control">
                            <option disabled value="" selected>Please select one</option>
                            <option v-for="make of carMakes" :value="make.id">{{ make.name }}</option>
                        </select>
                        <div class="form-group">
                            <label for="price">Model</label>
                            <input type="text" id="model" class="form-control" placeholder="Enter car model"
                                   v-model="car.model">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="kilometers">Kilometers</label>
                        <input type="number" id="kilometers" class="form-control" placeholder="Enter car kilometers"
                               v-model="car.kilometers">
                    </div>
                    <div class="form-group">
                        <label for="year">Car Year</label>
                        <input type="text" id="year" class="form-control" placeholder="Enter car year"
                               v-model="car.year">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" id="price" class="form-control" placeholder="Enter car price"
                               v-model="car.price">
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" id="color" class="form-control" placeholder="Enter car color"
                               v-model="car.color">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="price">Number of Doors</label>
                        <input type="text" id="number-of-doors" class="form-control"
                               placeholder="Enter car number of doors"
                               v-model="car.number_of_doors">
                    </div>
                    <div class="form-group">
                        <label for="color">Number of Cylinders</label>
                        <input type="text" id="number-of-cylinders" class="form-control"
                               placeholder="Enter car number of cylinders"
                               v-model="car.number_of_cylinders">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="form-check">
                        <label for="warranty">Has Warranty</label>
                        <input class="form-check-input" type="checkbox" value="" id="warranty" v-model="car.warranty">
                    </div>
                </div>
            </div>
        </tab-content>
        <tab-content title="Car Condition" class="col-sm-12">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="form-group">
                        <label for="exterior-condition">What is the Exterior Condition?</label>
                        <div v-for="(condition, idx) in options.conditions">
                            <input :id="'exterior-'+ condition + '-' + idx" :value="condition" type="radio"
                                   v-model="car.condition.exterior">
                            <label :for="'exterior-' + condition + '-' + idx">{{ condition }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="form-group">
                        <label for="interior-condition">What is the Interior Condition?</label>
                        <div v-for="(condition, idx) in options.conditions">
                            <input :id="'interior-' + condition + '-' + idx" :value="condition" type="radio"
                                   v-model="car.condition.interior">
                            <label :for="'interior-'+ condition + '-' + idx">{{ condition }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="form-group">
                        <label for="interior-condition">Has the car been in accident?</label>
                        <div v-for="(condition, idx) in options.accident">
                            <input :id="'accident-' + condition + '-' + idx" :value="condition" type="radio"
                                   v-model="car.condition.accident">
                            <label :for="'accident-'+ condition + '-' + idx">{{ condition }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </tab-content>
        <tab-content title="Contact Information" class="col-sm-12">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" class="form-control"
                               placeholder="Enter your first name"
                               v-model="car.ownerInfo.first_name">
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" class="form-control"
                               placeholder="Enter your last name"
                               v-model="car.ownerInfo.last_name">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="first-name">Phone</label>
                        <input type="text" id="phone" class="form-control"
                               placeholder="Enter your phone number"
                               v-model="car.ownerInfo.phone_number">
                    </div>
                    <div class="form-group">
                        <label for="email-address">Email Address</label>
                        <input type="text" id="email-address" class="form-control"
                               placeholder="Enter your email address"
                               v-model="car.ownerInfo.email_address">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" v-model="car.ownerInfo.comment" id="comment"></textarea>
                </div>
            </div>
        </tab-content>
    </form-wizard>
</template>

<script>
import {FormWizard, TabContent} from 'vue-step-wizard'
import "vue-step-wizard/dist/vue-step-wizard.css";
import axios from 'axios';

export default {
    name: 'StepperForm',
    components: {
        FormWizard, TabContent
    },
    data: function () {
        return {
            options: {
                conditions: [
                    'Extra Clean',
                    'Clean',
                    'Average',
                    'Below Average',
                    'I Don\'t Know'
                ],
                accident: [
                    'Yes',
                    'No',
                    'I Don\'t Know'
                ],
            },
            car: {
                kilometers: '',
                year: '',
                price: '',
                warranty: false,
                color: '',
                number_of_doors: '',
                number_of_cylinders: '',
                horse_power: '',
                car_make_id: null,
                model: '',
                condition: {
                    exterior: '',
                    interior: '',
                    accident: ''
                },
                ownerInfo: {
                    first_name: '',
                    last_name: '',
                    email_address: '',
                    phone_number: '',
                    comment: ''
                }
            },
            fullName: '',
            companyName: '',
            referral: '',
            carMakes: [],
        }
    },
    mounted() {
        this.getCarMakes();
    },
    methods: {
        getCarMakes: function () {
            axios.get('/car-make').then(
                response => this.carMakes = response.data,
                error => console.error(error));
        }
    }
}
</script>
<style>
.step-progress .bar {
    background-color: #d4af37;
}

.vue-step-wizard {
    background-color: #f7f8fc;
    width: 100%;
    margin: auto;
    padding: 40px;
}

.step-body, .step-footer {
    margin-top: 15px
}

.step-pills .step-item {
    border-radius: 2px;
}

.step-pills .step-item.active {
    border: 1px solid #d4af37
}

.step-pills .step-item a {
    color: #000;
}

.tabStatus {
    background: #000;
}

.car-info-tab .form-group {
    margin-top: 15px;
}

@media only screen and (max-width: 768px) {
    .step-pills {
        display: block;
    }
}
</style>
