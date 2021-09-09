<template>
    <div class="row col-12">
        <div :class="messageClass" style="height: 50px; padding-top: 15px; margin: 15px 215px;">{{ message }}</div>
        <div ref="wixForm">
            <form-wizard  @onComplete="submit">
                <tab-content :title="trans.get('web.sell_a_car.car_information_title')" :selected="true"
                             class="col-sm-12">
                    <div class="row car-info-tab">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="make">{{ trans.get('web.sell_a_car.car_make_label') }}</label>
                                <input type="text" id="make" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.car_make_placeholder')"
                                       v-model="car.make">
                            </div>
                            <div class="form-group">
                                <label for="model">{{ trans.get('web.sell_a_car.car_model_label') }}</label>
                                <input type="text" id="model" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.car_model_placeholder')"
                                       v-model="car.model">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="kilometers">{{ trans.get('web.sell_a_car.kilometers_label') }}</label>
                                <input type="number" id="kilometers" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.kilometers_placeholder')"
                                       v-model="car.kilometers">
                            </div>
                            <div class="form-group">
                                <label for="year">{{ trans.get('web.sell_a_car.year_label') }}</label>
                                <input type="text" id="year" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.year_placeholder')"
                                       v-model="car.year">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="price">{{ trans.get('web.sell_a_car.price_label') }}</label>
                                <input type="text" id="price" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.price_label')"
                                       v-model="car.price">
                            </div>
                            <div class="form-group">
                                <label for="color">{{ trans.get('web.sell_a_car.color_label') }}</label>
                                <input type="text" id="color" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.color_placeholder')"
                                       v-model="car.color">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="price">{{ trans.get('web.sell_a_car.number_of_doors_label') }}</label>
                                <input type="text" id="number-of-doors" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.number_of_doors_placeholder')"
                                       v-model="car.number_of_doors">
                            </div>
                            <div class="form-group">
                                <label for="color">{{ trans.get('web.sell_a_car.number_of_cylinders_label') }}</label>
                                <input type="text" id="number-of-cylinders" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.number_of_cylinders_placeholder')"
                                       v-model="car.number_of_cylinders">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="horse_power">{{ trans.get('web.sell_a_car.horse_power_label') }}</label>
                                <input type="text" id="horse_power" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.horse_power_placeholder')"
                                       v-model="car.horse_power">
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="form-check">
                                <label for="warranty">{{ trans.get('web.sell_a_car.has_warranty_label') }}</label>
                                <input class="form-check-input" type="checkbox" value="" id="warranty"
                                       v-model="car.warranty">
                            </div>
                        </div>
                    </div>
                </tab-content>
                <tab-content :title="trans.get('web.sell_a_car.car_condition_title')" class="col-sm-12">
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="form-group">
                                <label
                                    for="exterior-condition">{{
                                        trans.get('web.sell_a_car.exterior_condition_label')
                                    }}</label>
                                <div v-for="(condition, idx) in options.conditions">
                                    <input :id="'exterior-'+ condition + '-' + idx" :value="condition" type="radio"
                                           v-model="car.condition.exterior">
                                    <label :for="'exterior-' + condition + '-' + idx">{{ condition }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="form-group">
                                <label for="interior-condition">{{
                                        trans.get('web.sell_a_car.interior_condition_label')
                                    }}</label>
                                <div v-for="(condition, idx) in options.conditions">
                                    <input :id="'interior-' + condition + '-' + idx" :value="condition" type="radio"
                                           v-model="car.condition.interior">
                                    <label :for="'interior-'+ condition + '-' + idx">{{ condition }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="form-group">
                                <label for="interior-condition">{{ trans.get('web.sell_a_car.accident_label') }}</label>
                                <div v-for="(condition, idx) in options.accident">
                                    <input :id="'accident-' + condition + '-' + idx" :value="condition" type="radio"
                                           v-model="car.condition.accident">
                                    <label :for="'accident-'+ condition + '-' + idx">{{ condition }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </tab-content>
                <tab-content :title="trans.get('web.sell_a_car.contact_information_title')" class="col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="first-name">{{ trans.get('web.sell_a_car.first_name_label') }}</label>
                                <input type="text" id="first-name" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.first_name_placeholder')"
                                       v-model="car.ownerInfo.first_name">
                            </div>
                            <div class="form-group">
                                <label for="last-name">{{ trans.get('web.sell_a_car.last_name_label') }}</label>
                                <input type="text" id="last-name" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.last_name_placeholder')"
                                       v-model="car.ownerInfo.last_name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="first-name">{{ trans.get('web.sell_a_car.phone_label') }}</label>
                                <input type="text" id="phone" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.phone_placeholder')"
                                       v-model="car.ownerInfo.phone_number">
                            </div>
                            <div class="form-group">
                                <label for="email-address">{{ trans.get('web.sell_a_car.email_label') }}</label>
                                <input type="text" id="email-address" class="form-control"
                                       :placeholder="trans.get('web.sell_a_car.email_placeholder')"
                                       v-model="car.ownerInfo.email_address">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label for="comment">{{ trans.get('web.sell_a_car.comment_label') }}</label>
                            <textarea class="form-control" v-model="car.ownerInfo.comment" id="comment"></textarea>
                        </div>
                    </div>
                </tab-content>
            </form-wizard>
        </div>
    </div>
</template>

<script>
import {FormWizard, TabContent} from 'vue-step-wizard'
import "vue-step-wizard/dist/vue-step-wizard.css";
import axios from 'axios';
import Vue from 'vue';
import Lang from 'lang.js';

const default_locale = window.default_language;
const fallback_locale = window.fallback_locale;
console.log(window.messages)
const messages = JSON.parse(window.messages);
Vue.prototype.trans = new Lang({messages, locale: default_locale, fallback: fallback_locale});
export default {
    name: 'StepperForm',
    components: {
        FormWizard, TabContent
    },
    data: function () {
        return {
            options: {
                conditions: [],
                accident: [],
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
                make: '',
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
            formClasses: 'row col-12',
            message: '',
            messageClass: 'hidden'
        }
    },
    mounted() {
        this.getConditions();
    },
    methods: {
        getConditions: function () {
            axios.get('/conditions').then(
                response => {
                    this.options.conditions = response.data.conditions;
                    this.options.accident = response.data.accidentOptions;
                },
                error => console.error(error));
        },
        submit: function () {
            axios.post('/sell-a-call', this.car)
                .then(response => this.setMessage(response.data.message, 'success'), error => this.setMessage(error, 'error'));
        },
        setMessage: function (message, type) {
            this.message = message;
            if (type === 'success') {
                this.messageClass = 'bg-success text-center text-white';
                this.$refs.wixForm.style.display = 'none';
            } else {
                this.messageClass = 'bg-danger text-center text-white';
            }
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

.step-button {
    border-radius: 3px;
}

.step-button-next, .step-button-submit {
    background-color: #d4af37;
}

.step-button-previous {
    background-color: #000;
}

@media only screen and (max-width: 768px) {
    .step-pills {
        display: block;
    }
}
</style>
