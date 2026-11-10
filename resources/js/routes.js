export const routes = [
    { path: '*', redirect: '/home'},
    { 
        path: '/home', 
        component: require('./components/pages/HomeComponent.vue').default
    },
    { 
        path: '/account', 
        component: require('./components/pages/AccountComponent.vue').default
    },
    { 
        path: '/create-form', 
        component: require('./components/pages/CreateFormComponent.vue').default
    },
    { 
        path: '/edit-form/:code', 
        component: require('./components/pages/CreateFormComponent.vue').default
    },
    { 
        path: '/question/:id', 
        component: require('./components/pages/FormQuestionComponent.vue').default
    },
]