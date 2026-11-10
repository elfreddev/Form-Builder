<template>
    <div>
        <!-- <form-build-preview-component></form-build-preview-component> -->
        <div class="form-container">
            <blank-sidebar-component></blank-sidebar-component>
            <question-content-component></question-content-component>
            <blank-sidebar-component></blank-sidebar-component>
        </div>
    </div>
</template>
<script>
import FormBuildPreviewComponent from './FormBuildPreviewComponent.vue';
import BlankSidebarComponent from './BlankSidebarComponent.vue';
import QuestionContentComponent from './QuestionContentComponent.vue';
export default {
    data() {
        return {
            
        }
    },
    computed : {
        getGuardCode(){
            return this.$store.state.global_guard_code;
        },
    },
    components:{
        'form-build-preview-component' : FormBuildPreviewComponent,
        'blank-sidebar-component' : BlankSidebarComponent,
        'question-content-component' : QuestionContentComponent,
    },
    created(){
        console.log(this.$store.state.global_guard_code);
    }
}
</script>