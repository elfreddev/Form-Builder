<template>
    <div class="form-option">
        <h5>Option</h5>
        <div class="form-option-list">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">General</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="style-tab" data-bs-toggle="tab" data-bs-target="#style" type="button" role="tab" aria-controls="style" aria-selected="false">Style</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="advanced-tab" data-bs-toggle="tab" data-bs-target="#advanced" type="button" role="tab" aria-controls="advanced" aria-selected="false">Advanced</button>
                </li>
            </ul>
    
            <div class="tab-content">
                <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <div class="row">
                        <div class="col-md-12 mb-4" v-if="with_field_label.includes(element.type)">
                            <label for="field_label">Field Label</label>
                            <input type="text" name="fiel_label" id="field_label" v-model="element.value" class="form-control">
                        </div>
                        <hr>
                        <div class="col-md-12 mb-4">
                            <label for="label_alignment">Label Alignment</label>
                            <div class="button-group label-alignment-button">
                                <button :class="option.align == 'left' ? 'active' : ''" v-on:click="updateOptionAlign('left')">LEFT</button>
                                <button :class="option.align == 'right' ? 'active' : ''" v-on:click="updateOptionAlign('right')">RIGHT</button>
                                <button :class="option.align == 'top' ? 'active' : ''" v-on:click="updateOptionAlign('top')">TOP</button>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 mb-4">
                            <label for="required">Required</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" v-model="element.settings" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 mb-4" v-if="with_sub_label.includes(element.type)">
                            <div v-if="element.type == 'fullname'" class="row">
                                <label for="sublabel">Sublabel</label>
                                <div class="row no-margin">
                                    <div class="col-md-5"><label for="">First Name</label></div>
                                    <div class="col-md-7"><input type="text" v-model="element.fields[0]"></div>
                                    <div class="col-md-5"><label for="">Last Name</label></div>
                                    <div class="col-md-7"><input type="text" v-model="element.fields[1]"></div>
                                </div>
                            </div>
                            <div v-else-if="element.type == 'address'" class="row">
                                <div class="col-md-12">
                                    <label for="sublabel">Sublabel</label>
                                </div>
                                <div class="col-md-5"><label for="">Street Address</label></div>
                                <div class="col-md-7"><input type="text" v-model="element.fields[0]"></div>
                                <div class="col-md-5"><label for="">Street Address 2</label></div>
                                <div class="col-md-7"><input type="text" v-model="element.fields[1]"></div>
                                <div class="col-md-5"><label for="">City</label></div>
                                <div class="col-md-7"><input type="text" v-model="element.fields[2]"></div>
                                <div class="col-md-5"><label for="">State/Province</label></div>
                                <div class="col-md-7"><input type="text" v-model="element.fields[3]"></div>
                                <div class="col-md-5"><label for="">Postal Zip</label></div>
                                <div class="col-md-7"><input type="text" v-model="element.fields[4]"></div>
                            </div>
                            <div v-else>
                                <label for="sublabel">Sublabel</label>
                                <input type="text" name="sublabel" id="sublabel" v-model="element.fields" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="style" role="tabpanel" aria-labelledby="style-tab">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="options_label">Options</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <hr>
                        <div class="col-md-12 mb-4">
                            <label for="options_label">Character Limit</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                        <hr>
                        <!-- Name -->
                        <div class="col-md-12 mb-4">
                            <label for="sublabel">Prefix</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 mb-4">
                            <label for="sublabel">Middle Name</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 mb-4">
                            <label for="sublabel">Suffix</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                        <!-- End Name -->
                    </div>
                </div>
                <div class="tab-pane" id="advanced" role="tabpanel" aria-labelledby="advanced-tab">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="sublabel">Placeholder</label>
                            <div class="row mb-4">
                                <span class="col-md-5">First Name</span>
                                <div class="col-md-7">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <span class="col-md-5">Last Name</span>
                                <div class="col-md-7">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 mb-4">
                            <label for="sublabel">Sublabel</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <hr>
                        <div class="col-md-12 mb-4">
                            <label for="required">Read Only</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 mb-4">
                            <label for="required">Shrink</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
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
    data() {
        return {
            option : {
                align : 'left'
            },
            element : {},
            with_field_label : ['fullname', 'email', 'address', 'phone', 'number', 'datepicker', 'timepicker', 'shorttext', 'longtext', 'dropdown', 'singlechoice', 'multiplechoice'],
            with_sub_label : ['fullname', 'email', 'address', 'phone', 'number', 'datepicker', 'timepicker', 'shorttext', 'longtext', 'dropdown', 'singlechoice', 'multiplechoice'],
        }
    },
    methods: {
        updateOption(data){
            this.element = data;
        },
        updateOptionAlign(data) {
            if(this.option.align != data){
                this.option.align = data;
                this.$events.fire('update-option-alignment', data);
            }
        }
    },
    mounted(){
        this.$events.on('select-active', (data) => {
            this.updateOption(data);
        });
    }
}
</script>