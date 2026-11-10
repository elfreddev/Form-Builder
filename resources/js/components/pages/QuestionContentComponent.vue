<template>
    <div class="form-content">
        <div class="form-page">
            <div class="form-title">
                <h5>Form</h5>
            </div>
            <div class="form-divider"></div>
            <div class="form-page-container">
                <div class="drag-question" v-if="form.element_list.length == 0">
                    <i class="fas fa-up-down-left-right"></i> Drag here your first question
                </div>
                <div v-else>
                    <div class="form-element-page">
                        <div class="item-list" v-for="(element, index) in form.element_list">
                                <div v-if="element.type == 'heading'" class="item-form">
                                    <h2 class="form-element-heading">{{ form.element_list[index].value }}</h2>
                                </div>
                                <div v-if="element.type == 'fullname'" class="item-form">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">First Name</label>
                                            <input type="text" class="form-control" v-model="form.element_list[index].value[0]">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Middle Name</label>
                                            <input type="text" class="form-control" v-model="form.element_list[index].value[0]">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control" v-model="form.element_list[index].value[0]">
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'email'" class="item-form">
                                    <div class="shrinkable-form">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" v-model="form.element_list[index].value">
                                    </div>
                                </div>
                                <div v-if="element.type == 'number'" class="item-form">
                                    <div class="shrinkable-form">
                                        <label for="">Number</label>
                                        <input type="number" class="form-control" v-model="form.element_list[index].value">
                                    </div>
                                </div>
                                <div v-if="element.type == 'address'" class="item-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Address</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" v-model="form.element_list[index].value[0]">
                                            <small>Street Address</small>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" v-model="form.element_list[index].value[1]">
                                            <small>Street Address Line 2</small>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" v-model="form.element_list[index].value[2]">
                                            <small>City</small>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" v-model="form.element_list[index].value[3]">
                                            <small>State / Province</small>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" v-model="form.element_list[index].value[4]">
                                            <small>Postal Zip Code</small>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'phone'" class="item-form">
                                    <div class="shrinkable-form">
                                        <label for="">Phone</label>
                                        <input type="tel" class="form-control" v-model="form.element_list[index].value">
                                    </div>
                                </div>
                                <div v-if="element.type == 'datepicker'" class="item-form">
                                    <div class="shrinkable-form">
                                        <label for="">Date Picker</label>
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type='text' class="form-control" v-model="form.element_list[index].value">
                                                <span class="input-group-addon"><span class="fas fa-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'timepicker'" class="item-form">
                                    <div class="shrinkable-form">
                                        <label for="">Time Picker</label>
                                        <div class="form-group">
                                            <div class='input-group date'>
                                                <input type='text' class="form-control" v-model="form.element_list[index].value">
                                                <span class="input-group-addon"><span class="fas fa-clock"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'shorttext'" class="item-form">
                                    <div class="shrinkable-form">
                                        <label for="">Short Text</label>
                                        <input type="text" class="form-control" v-model="form.element_list[index].value">
                                    </div>
                                </div>
                                <div v-if="element.type == 'longtext'" class="item-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Long Text</label>
                                            <textarea rows="5" class="form-control" v-model="form.element_list[index].value"></textarea>></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'dropdown'" class="item-form">
                                    <div class="shrinkable-form">                                        
                                        <label for="">Dropdown</label>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                Dropdown button
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="element.type == 'singlechoice'" class="item-form">
                                    <div class="shrinkable-form">                                        
                                        <label for="">Single Choice</label>
                                        <div class="form-check" v-for="singlechoice in  element.option">
                                            <input class="form-check-input" type="radio" disabled>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                {{singlechoice}}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="element.type == 'multiplechoice'" class="item-form">
                                    <div class="shrinkable-form">                                        
                                        <label for="">Multiple Choice</label>
                                        <div class="form-check" v-for="multiplechoice in  element.option">
                                            <input class="form-check-input" type="checkbox" disabled>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{multiplechoice}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'fileupload'" class="item-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">File Upload</label>
                                            <div class="file-upload">
                                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                                <span>Browse Files</span>
                                                <p>Drag and drop files here</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="item-option">
                                    <button class="item-option-edit"><i class="fas fa-gear"></i></button>
                                    <button class="item-option-delete" @click="deleteElement(index)"><i class="fas fa-trash"></i></button>
                                </div> -->
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-divider"></div>
            <div class="form-submit">
                <button class="btn btn-primary" @click="submitAnsweredForm()">Submit</button>
            </div>
            <!-- <div class="row-form">
                <label for=""></label>
            </div> -->
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            form        : new Form({
                id          : 0,
                form_id     : 0,
                element_list: [],
            }),
        }
    },
    computed : {
        getGuardCode(){
            return this.$store.state.global_guard_code;
        },
    },
    methods: {
        getQuestion(){                
            this.axios.get('/getQuestionContent/'+this.$store.state.global_guard_code)
            .then((response) => {
                // console.log(response.data[0].questionaire);
                this.form.form_id = response.data[0].id;
                this.form.element_list = JSON.parse(response.data[0].questionaire);
            })
            .catch((error) => {
                console.log(error.response.data)
            })
        },
        submitAnsweredForm(){
            this.form.element_list_data  = JSON.stringify(this.form.element_list);
            this.form.post('/saveAnsweredForm')
            .then((response) => {
                this.$noty.success("Success Saved");
                this.form.id = response.data.id;
            })
            .catch((error) => {
                this.$noty.error('Recheck form input');
            })
        }
    },
    created(){
        this.getQuestion();
    }
}
</script>