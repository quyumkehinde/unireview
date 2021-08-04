<template>
    <app>
        <div class="w-9/10 max-w-3xl bg-white mx-auto mt-3 shadow sm:p-6 p-3 font-light">
            <h2 class="sm:text-2xl text-xl font-medium">Select a school</h2>
            <p class="mt-3">Select a school you'd like to review or add a new school.</p>
            <select-school :schools="JSON.parse(schools)"></select-school>
            <div class="mt-5">
                <span>School not listed?</span>
                <button class="hover:underline text-sm" @click="newSchool = !newSchool">Add school</button>
            </div>
            <add-school v-if="newSchool"></add-school>
        </div>
    </app>
</template>

<script>
import AddSchool from '../layouts/AddSchool'
import SelectSchool from '../layouts/SelectSchool'
import App from '../layouts/App'
export default {
    components: {
        AddSchool,
        SelectSchool,
        App
    },
    data() {
        return {
            newSchool: false
        }
    },
    props: ['schools'],

}
</script>