<template>
    <div class="form-element">
        <h5>Form Element</h5>
        <ul class="form-element-list">
            <li class="form-element-item" v-for="item in items" v-on:click="callAddElement(item)">
                <div class="icon" v-if="item.type == 'heading'">
                    <i class="fas fa-heading"></i>
                </div>
                <div class="icon" v-if="item.type == 'logo'">
                    <i class="fas fa-icons"></i>
                </div>
                <div class="icon" v-if="item.type == 'fullname'">
                    <i class="fas fa-font"></i>
                </div>
                <div class="icon" v-if="item.type == 'email'">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="icon" v-if="item.type == 'address'">
                    <i class="fas fa-address-book"></i>
                </div>
                <div class="icon" v-if="item.type == 'phone'">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="icon" v-if="item.type == 'number'">
                    <i class="fas fa-arrow-down-1-9"></i>
                </div>
                <div class="icon" v-if="item.type == 'datepicker'">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="icon" v-if="item.type == 'timepicker'">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="icon" v-if="item.type == 'shorttext'">
                    <i class="fas fa-text-width"></i>
                </div>
                <div class="icon" v-if="item.type == 'longtext'">
                    <i class="fas fa-text-height"></i>
                </div>
                <div class="icon" v-if="item.type == 'paragraph'">
                    <i class="fas fa-paragraph"></i>
                </div>
                <div class="icon" v-if="item.type == 'dropdown'">
                    <i class="fas fa-list-check"></i>
                </div>
                <div class="icon" v-if="item.type == 'singlechoice'">
                    <i class="fas fa-check"></i>
                </div>
                <div class="icon" v-if="item.type == 'multiplechoice'">
                    <i class="fas fa-check-double"></i>
                </div>
                <div class="icon" v-if="item.type == 'fileupload'">
                    <i class="fas fa-file-import"></i>
                </div>
                <div class="icon" v-if="item.type == 'image'">
                    <i class="fas fa-image"></i>
                </div>
                <div class="icon" v-if="item.type == 'table'">
                    <i class="fas fa-table"></i>
                </div>
                <div class="icon" v-if="item.type == 'divider'">
                    <i class="fas fa-arrows-down-to-line"></i>
                </div>
                <div class="name">{{ item.title}}</div>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    data() {
        return {
            items: [
                {
                    title: 'Heading' ,
                    type: 'heading',
                    value: 'Heading',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : [],
                },
                {
                    title: 'Logo' ,
                    type: 'logo',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : [],
                },
                {
                    title: 'Full Name' ,
                    type: 'fullname',
                    shrink: false,
                    value: 'Full Name',
                    fields : ['First Name','Last Name'],
                    settings: {
                        required : false,
                    },
                    option : [],
                },
                {
                    title: 'Email' ,
                    type: 'email',
                    value : 'Email' ,
                    shrink: true,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : 'Ex. sample@email.com',
                },
                {
                    title: 'Address' ,
                    type: 'address',
                    shrink: false,
                    value: 'Address',
                    fields : ['Street Address','Street Address 2','City','State / Province','Postal Zip Code'],
                    settings: {
                        required : false,
                    },
                    option : [],
                },
                {
                    title: 'Phone' ,
                    type: 'phone',
                    value : 'Phone',
                    shrink: true,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : 'Ex. (02) 123 4567',
                },
                {
                    title: 'Number' ,
                    type: 'number',
                    value: 'Number',
                    shrink: true,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : 'Number Only',
                },
                {
                    title: 'Date Picker' ,
                    type: 'datepicker',
                    value: 'Date Picker',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : 'Pick a date',
                },
                {
                    title: 'Time Picker' ,
                    type: 'timepicker',
                    value: 'Time Picker',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : 'Pick a time',
                },
                {
                    title: 'Short Text' ,
                    type: 'shorttext',
                    value: 'Short Text',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : 'description',
                },
                {
                    title: 'Long Text' ,
                    type: 'longtext',
                    value: 'Long Text',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : 'message',
                },
                {
                    title: 'Paragraph' ,
                    type: 'paragraph',
                    value: 'Paragraph',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : 'Message',
                },
                {
                    title: 'Dropdown' ,
                    type: 'dropdown',
                    value: 'Dropdown',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : 'Select Option',
                },
                {
                    title: 'Single Choice' ,
                    type: 'singlechoice',
                    value: 'Single Choice',
                    option : ['Option 1', 'Option 2', 'Option 3', 'Option 4'],
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    fields : 'Radio Button',
                },
                {
                    title: 'Multiple Choice' ,
                    type: 'multiplechoice',
                    value : 'Multiple Choice',
                    option : ['Option 1', 'Option 2', 'Option 3', 'Option 4'],
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    fields : 'Select Option',
                },
                {
                    title: 'File Upload',
                    type: 'fileupload',
                    value: 'File Upload',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : [],
                },
                {
                    title: 'Image',
                    type: 'image',
                    value: 'Image',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : [],
                },
                {
                    title: 'Table',
                    type: 'table',
                    value: 'Table',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : [],
                },
                {
                    title: 'Divider',
                    type: 'divider',
                    value: 'Divider',
                    shrink: false,
                    settings: {
                        required : false,
                    },
                    option : [],
                    fields : [],
                }
            ]
        }
    },
    methods : {
        callAddElement(data){
            this.$events.fire('add-element', data);
        }
    }
}
</script>