<template>
    <div>
        <form-build-preview-component></form-build-preview-component>
        <div class="form-container">
            <form-element-component></form-element-component>
            <form-content-component></form-content-component>
            <form-option-component></form-option-component>
        </div>
    </div>
</template>
<script>
import FormBuildPreviewComponent from './FormBuildPreviewComponent.vue';
import FormElementComponent from './FormElementComponent.vue';
import FormContentComponent from './FormContentComponent.vue';
import FormOptionComponent from './FormOptionComponent.vue';
export default {
    data() {
        return {
            
        }
    },
    components:{
        'form-build-preview-component' : FormBuildPreviewComponent,
        'form-element-component' : FormElementComponent,
        'form-content-component' : FormContentComponent,
        'form-option-component' : FormOptionComponent,
    },
}
</script>