<template>
    <div>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Forms</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Forms</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-inbox table-hover custom-tab-container">
                        <tbody>
                            <tr class="unread" v-for="item in items" @click="gotoForm(item.code)">
                                
                                <!-- <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                </td> -->
                                <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                <td class="view-message  dont-show">
                                    <a :href="'/edit-form/'+item.code">
                                        <b>{{items.name}}</b>
                                        <p class="no-margin">
                                            <span v-for="resp in count">
                                                <span v-if="resp.form_id == item.id">{{ resp.respondents }}</span>
                                            </span>
                                            submission</p>                                        
                                    </a>
                                </td>
                                <td class="view-message ">
                                    <small><b>From: </b> {{ item.effective_date_from | formatDateTime }} </small> - <small><b>To: </b> {{ item.effective_date_to | formatDateTime }}</small>
                                </td>
                                <td class="view-message ">
                                    <p class="no-margin">
                                        <a href="">Share form link</a>
                                    </p>
                                </td>
                                <td class="view-message">
                                    <div class="button-group pull-right">
                                        <button class="btn btn-sm btn-default">
                                            <i class="fas fa-pencil"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            items: [],
            count: [],
        }
    },
    methods : {
        getFormAnswered(){
            this.axios.get('/getFormAnswered')
            .then((response) => {
                this.items = response.data.form.data;
                this.count = response.data.count;
                let arr = response.data.data;
                console.log(response.data.form.data);
                // console.log(arr.data);
                // arr.forEach(list => {
                //     // console.log(list);
                //     let questionaire = list.questionaire_answers == null ? [] : JSON.parse(list.questionaire_answers);
                //     // console.log(questionaire);
                //     questionaire.forEach(e => {
                //         console.log(e);
                //     });
                // });
            })
            .catch((error) => {
                console.log(error.response.data)
            })
        },
        gotoForm(code){
            window.location.href = 'edit-form/'+code;
        }
    },
    created(){
        this.getFormAnswered();
    }
}
</script>
