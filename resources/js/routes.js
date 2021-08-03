import Home from './components/static/Home.vue';
import CreateReview from './components/review/Create.vue';
import SelectSchool from './components/review/SelectSchool'

export const routes = [
    { path: '/', component: Home, name: 'Home' },
    { path: '/review/create', component: CreateReview, name: 'CreateReview' },
    { path: '/review/select-school', component: SelectSchool, name: 'SelectSchool' }
];