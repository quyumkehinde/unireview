<template>
    <app>
        <div class="w-9/10 max-w-3xl bg-white mx-auto mt-3 shadow sm:p-6 p-3 font-light">
            <h2 class="sm:text-2xl text-xl font-medium">Select a school</h2>
            <p class="mt-3">Select a school you'd like to review or add a new school.</p>
            <form action="">
                <div class="mt-5">
                    <label class="text-gray-500 text-sm block">Select a school *</label>
                    <div class="inline-block border border-gray-300 mt-2">
                        <select name="graduation_year" id="graduation_year" class="pl-2 pr-40 py-2">
                            <option value="1">Covenant University</option>
                            <option value="2">Tai Solarin University of Education</option>
                        </select>
                    </div>
                    
                </div>
                <div class="mt-10">
                    <button class="p-3 bg-green-500 text-white hover:bg-green-300">Proceed to Review</button>
                </div>
            </form>
            <div class="mt-5">
                <span>School not listed?</span>
                <button class="hover:underline text-sm" @click="newSchool = !newSchool">Add school</button>
            </div>
            <form v-if="newSchool">
                <div class="my-5 text-red-500" :class="{ 'text-red-500': isError, 'text-green-500': isSuccess }" v-if="isError || isSuccess">
                    {{ message }}
                </div>
                <div class="mt-5">
                    <label class="text-gray-500 text-sm block">School Name *</label>
                    <div class="border border-gray-300 mt-2">
                        <input type="text" v-model="name" id="name" class="px-2 py-2 w-full" placeholder="e.g Federal University, Oye Ekiti" required>
                    </div>
                    
                </div>
                <div class="mt-5">
                    <label class="text-gray-500 text-sm block">School location *</label>
                    <div class="inline-block border border-gray-300 mt-2">
                        <select v-model="state" id="state" class="pl-2 pr-40 py-2" required>
                            <option value="1">Ogun</option>
                            <option value="2">Lagos</option>
                        </select>
                    </div>
                </div>
                <div class="mt-10">
                    <button class="p-3 bg-green-500 text-white hover:bg-green-300 disabled:bg-green-300" @click="addSchool" :disabled="isSubmitDisabled">Add School</button>
                </div>
            </form>
        </div>
    </app>
</template>


<script>
import App from '../layouts/App'
export default {
    data() {
        return {
            newSchool: false,
            name: "",
            state: 1,
            isError: false,
            isSuccess: false,
            isSubmitDisabled: false
        }
    },
    components: {
        App
    },
    methods: {
        addSchool(e){
            e.preventDefault()
            this.isError = false
            this.isSuccess = false
            this.isSubmitDisabled = true
            fetch('/api/school/create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    name: this.name,
                    state: this.state
                })
            }).then((res) => {
                return res.json()
            }).then((response) => {
                if(response.statusCode == 1){
                    this.isSuccess = true
                }else{
                    this.isError = true
                }
                this.message = response.message
                this.name = "";
                this.state = 1;
                this.isSubmitDisabled = false;
            })
        }
    },
}
</script>