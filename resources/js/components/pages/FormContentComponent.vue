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
                        <div class="item-list" v-for="(element, index) in form.element_list" v-on:click="selectElement(index)" :class="[element.shrink ? 'shrink' : '', element.active ? 'is_active' : '']">
                                <div v-if="element.type == 'heading'" class="item-form">
                                    <input type="text" v-model="element.value" class="form-control heading">
                                </div>
                                <div v-if="element.type == 'fullname'" class="item-form">
                                    <div class="row" v-if="form.option.align == 'left' || form.option.align == 'right'">
                                        <div class="col-md-2">
                                            <label for="">{{ element.value }}</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" disabled readonly>
                                            <small>{{ element.fields[0] }}</small>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" disabled readonly>
                                            <small>{{ element.fields[1] }}</small>
                                        </div>
                                    </div>
                                    <div class="row" v-if="form.option.align == 'top'">
                                        <div class="col-md-12">
                                            <label for="">{{ element.value }}</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" disabled readonly>
                                            <small>{{ element.fields[0] }}</small>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" disabled readonly>
                                            <small>{{ element.fields[1] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'email'" class="item-form">
                                    <div class="shrinkable-form" :class="form.option.align">
                                        <label for="" class="shrinkable-form-label">{{element.value}}</label>
                                        <div class="shrinkable-form-input">
                                            <input type="email" class="form-control" disabled readonly>
                                            <small>{{ element.fields }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'number'" class="item-form">
                                    <div class="shrinkable-form" :class="form.option.align">
                                        <label for="" class="shrinkable-form-label">{{element.value}}</label>
                                        <div class="shrinkable-form-input">
                                            <input type="number" class="form-control" disabled readonly>
                                            <small>{{ element.fields }}</small>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-4">
                                            <label for="">{{ element.value }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" disabled readonly>
                                            <small>{{ element.fields }}</small>
                                        </div>
                                    </div> -->
                                </div>
                                <div v-if="element.type == 'address'" class="item-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="" class="form-label">{{ element.value }}</label>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <input type="text" class="form-control" readonly>
                                            <small>{{ element.fields[0] }}</small>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <input type="text" class="form-control" readonly>
                                            <small>{{ element.fields[1] }}</small>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input type="text" class="form-control" readonly>
                                            <small>{{ element.fields[2] }}</small>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input type="text" class="form-control" readonly>
                                            <small>{{ element.fields[3] }}</small>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" readonly>
                                            <small>{{ element.fields[4] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'phone'" class="item-form">
                                    <div class="shrinkable-form" :class="form.option.align">
                                        <label for="" class="shrinkable-form-label">{{element.value}}</label>
                                        <div class="shrinkable-form-input">
                                            <input type="tel" class="form-control" disabled readonly>
                                            <small>{{ element.fields }}</small>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-4">
                                            <label for="">{{ element.value }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="tel" class="form-control" disabled readonly>
                                            <small>{{ element.fields }}</small>
                                        </div>
                                    </div> -->
                                </div>
                                <div v-if="element.type == 'datepicker'" class="item-form">
                                    <div class="shrinkable-form" :class="form.option.align">
                                        <label for="" class="shrinkable-form-label">{{element.value}}</label>
                                        <div class="shrinkable-form-input">
                                            <div class="form-group">
                                                <div class='input-group date'>
                                                    <input type='text' class="form-control" disabled readonly/>
                                                    <span class="input-group-addon"><span class="fas fa-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <small>{{ element.fields }}</small>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-4">
                                            <label for="">{{ element.value }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class='input-group date'>
                                                    <input type='text' class="form-control" disabled readonly/>
                                                    <span class="input-group-addon"><span class="fas fa-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <small>{{ element.fields }}</small>
                                        </div>
                                    </div> -->
                                </div>
                                <div v-if="element.type == 'timepicker'" class="item-form">
                                    <div class="shrinkable-form" :class="form.option.align">
                                        <label for="" class="shrinkable-form-label">{{element.value}}</label>
                                        <div class="shrinkable-form-input">
                                            <div class="form-group">
                                                <div class='input-group date'>
                                                    <input type='text' class="form-control" disabled readonly/>
                                                    <span class="input-group-addon"><span class="fas fa-clock"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <small>{{ element.fields }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'shorttext'" class="item-form">
                                    <div class="shrinkable-form" :class="form.option.align">
                                        <label for="" class="shrinkable-form-label">{{element.value}}</label>
                                        <div class="shrinkable-form-input">
                                            <input type="text" class="form-control" disabled readonly>
                                            <small>{{ element.fields }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'longtext'" class="item-form">
                                    <div class="shrinkable-form" :class="form.option.align">
                                        <label for="" class="shrinkable-form-label">{{element.value}}</label>
                                        <div class="shrinkable-form-input">
                                            <textarea rows="5" class="form-control" disabled></textarea>
                                            <small>{{ element.fields }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="element.type == 'dropdown'" class="item-form">
                                    <div class="shrinkable-form" :class="form.option.align">
                                        <label for="" class="shrinkable-form-label">{{element.value}}</label>
                                        <div class="shrinkable-form-input">
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
                                            <small>{{ element.fields }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="element.type == 'singlechoice'" class="item-form">
                                    <div class="shrinkable-form" :class="form.option.align">
                                        <label for="" class="shrinkable-form-label">{{element.value}}</label>
                                        <div class="shrinkable-form-input">
                                            <div class="form-check" v-for="singlechoice in  element.option">
                                                <input class="form-check-input" type="radio" disabled>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    {{singlechoice}}
                                                </label>
                                                <small>{{ element.fields }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="element.type == 'multiplechoice'" class="item-form">
                                    <div class="shrinkable-form" :class="form.option.align">
                                        <label for="" class="shrinkable-form-label">{{element.value}}</label>
                                        <div class="shrinkable-form-input">
                                            <div class="form-check" v-for="multiplechoice in  element.option">
                                                <input class="form-check-input" type="checkbox" disabled>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{multiplechoice}}
                                                </label>
                                            </div>
                                            <small>{{ element.fields }}</small>
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
                                <div class="item-option">
                                    <button class="item-option-edit"><i class="fas fa-gear"></i></button>
                                    <button class="item-option-delete" @click="deleteElement(index)"><i class="fas fa-trash"></i></button>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-divider"></div>
            <div class="form-submit">
                <button class="btn btn-primary" @click="submitForm()">Submit</button>
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
            form      : new Form({
                id          : 0,
                element_list: [],
                date_from   : '',
                date_to     : '',
                project_id  : 1,
                contributors: 0,
                author_id   : 1,
                status      : 0,
                option      : {
                    align : 'top',
                }
            }),
        }
    },
    watch : {
        'form': function(newVal){
            if(newVal){
                // console.log('Data Updated');
            }
        },
    },
    methods : {
        addElement(data){
            let activeIndex = 0;
            let oldForm = this.form;
            let list = this.form.element_list;
            // Get the index of the active list
            list.forEach((element, id) => {
                if(element.active == true)
                    activeIndex = id + 1;
            });

            // Insert new element after the active index
            if(activeIndex != 0){
                list.splice(activeIndex, 0, data);
                this.selectElement(activeIndex);
            }
            
            else{
                list.push(data);
            }
            this.form = new Form({
                id          : oldForm.id,
                element_list: list,
                date_from   : oldForm.effective_date_from,
                date_to     : oldForm.effective_date_to,
                project_id  : oldForm.project_id,
                contributors: oldForm.contributors,
                author_id   : oldForm.author_id,
                status      : oldForm.status,
                option      : oldForm.option,
                code        : oldForm.code,
            });
        },
        selectElement(index){
            let status = !(this.form.element_list[index].active);
            
            this.form.element_list.forEach((element, id) => {
                Vue.set(this.form.element_list, id, {
                    title   : element.title,
                    type    : element.type,
                    value   : element.value,
                    active  : false,
                    shrink  : element.shrink,
                    option  : element.option,
                    setting : element.setting,
                    fields  : element.fields,
                    sublabel: element.sublabel,
                });
            });
            
            // console.log(!status);
            Vue.set(this.form.element_list, index, {
                title   : this.form.element_list[index].title,
                type    : this.form.element_list[index].type,
                value   : this.form.element_list[index].value,
                active  : status,
                shrink  : this.form.element_list[index].shrink,
                option  : this.form.element_list[index].option,
                setting : this.form.element_list[index].setting,
                fields  : this.form.element_list[index].fields,
                sublabel: this.form.element_list[index].sublabel,
            });

            // Call Option
            this.$events.fire('select-active', this.form.element_list[index]);
        },
        deleteElement(index){
            if(index == 0)
                this.form.element_list.shift();
            else
                this.form.element_list.splice(index, 1);
        },
        submitForm(){
            this.form.element_list_data  = JSON.stringify(this.form.element_list);
            this.form.post('/saveForm')
            .then((response) => {
                this.$noty.success("Success Saved");
                this.form.id = response.data.id;
                this.form.code = response.data.code;
            })
            .catch((error) => {
                this.$noty.error('Recheck form input');
            })
        },
        getSavedForm(){
            this.axios.get('/getQuestionContent/'+this.$route.params.code)
            .then((response) => {
                let resp = response.data[0];
                // this.form = new Form(response.data[0]);
                this.form = new Form({
                    id          : resp.id,
                    element_list: JSON.parse(resp.questionaire),
                    code        : resp.code,
                    date_from   : resp.effective_date_from,
                    date_to     : resp.effective_date_to,
                    project_id  : resp.project_id,
                    contributors: resp.contributors,
                    author_id   : resp.author_id,
                    status      : resp.status,
                    option      : resp.option,
                })
                // console.log(resp);
            })
            .catch((error) => {
                console.log(error.response.data)
            })
        },
        resetForm(){
            this.form = new Form({
                // id          : 0,
                first_name  : '',
                middle_name : '',
                last_name   : '',
                username    : '',
                new_password: '',
                option      : 'left',
                status      : false,
            })
        },
    },
    mounted(){
        this.$events.on('add-element', (data) => {
            this.addElement(data);
        });
        this.$events.on('update-option-alignment', (data) => {
            this.form.option.align = data;
        });
        if(this.$route.params.code){
            this.getSavedForm();
        }
        // console.log(this.$route.params.code);
    }
}
</script>
