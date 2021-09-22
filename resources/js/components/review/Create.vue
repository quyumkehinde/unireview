<template>
    <app>
        <form @submit="submitForm" class="w-9/10 max-w-3xl bg-white mx-auto mt-3 shadow sm:p-6 p-3 font-light">
            <h2 class="sm:text-2xl text-xl font-medium">Rate <span class="text-green-500">"{{school.name}}"</span></h2>
            <p class="mt-3">Your review will be kept anonymous, and will help other aspirants make better decision.</p>
            <div class="mt-5">
                <label class="text-gray-500 text-sm block">Year of graduation *</label>
                <div class="inline-block border border-gray-300 mt-2">
                    <select v-model="graduation_year" id="graduation_year" class="pl-2 pr-40 py-2 text-gray-600" required>
                        <option value=0 disabled>Select</option>
                        <option v-for="year in years" :value="year" :key="year">{{ year }}</option>
                    </select>
                </div>
                
            </div>
            <div class="mt-5">
                <label class="text-gray-500 text-sm block">What degree did you study? *</label>
                <div class="inline-block border border-gray-300 mt-2">
                    <select v-model="degree" id="degree" class="pl-2 pr-40 py-2 text-gray-600" required>
                        <option value="" disabled>Select</option>
                        <option value="undergraduate">Undergraduate</option>
                        <option value="postgraduate">Postgraduate</option>
                    </select>
                </div>
                
            </div>
            <div class="mt-5">
                <label class="text-gray-500 text-sm block">What course did you study? *</label>
                <div class="border border-gray-300 mt-2">
                    <input type="text" v-model="course" id="course" class="px-2 py-2 w-full" placeholder="e.g Computer Science" required>
                </div>
                
            </div>
            <div class="mt-5">
                <label class="text-gray-500 text-sm block">Share your experience *</label>
                <div class="border border-gray-300 mt-2">
                    <textarea v-model="description" id="description" class="px-2 pt-2 w-full h-52 resize-none" placeholder="What did you enjoy about the school and did not? In what way do you think the school can improve?" required></textarea>
                </div>
                
            </div>
            <div class="mt-5">
                <label class="text-gray-500 text-sm block">Overall Rating *</label>
                <div class="mt-2">
                    <star-rating v-model="rating" :item-size="25" :increment="1"></star-rating>
                </div>
            </div>
            <div class="mt-5" v-if="statusCode">
                <p class="text-green-500">{{ message }}</p>
            </div>
            <div class="mt-10">
                <button class="p-3 bg-green-500 text-white hover:bg-green-300" type="submit" :disabled="isSubmitDisabled">Submit Review</button>
            </div>
        </form>
    </app>
</template>


<script>
import { StarRating } from 'vue-rate-it';
import App from '../layouts/App'
export default {
    components: {
        StarRating,
        App
    },
    data() {
        return {
            graduation_year: 0,
            degree: "",
            course: "",
            description: "",
            rating: 3,
            years: [],
            statusCode: 0,
            isSubmitDisabled: false,
        }
    },
    props: [ 'schoolinfo' ],
    created() {
        this.school = JSON.parse(this.$props.schoolinfo)
        const currentYear = new Date().getFullYear()

        let year = currentYear - 30
        while(year < currentYear + 6){
            this.years.push(year)
            year++
        }
        this.token = $('meta[name="csrf-token"]').attr('content')
    },
    methods: {
        submitForm(e){
            this.isSubmitDisabled = true
            e.preventDefault()
            fetch(`/review/create`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.token
                },
                body: JSON.stringify({
                    'school_id': this.school.id,
                    'description': this.description,
                    'degree': this.degree,
                    'course': this.course,
                    'graduation_year': this.graduation_year,
                    'rating': this.rating,
                    '_token': this.token
                })
            }).then((response) => {
                console.log(response)
                return response.json()
            }).then((result) => {
                console.log(result)
                this.statusCode = result.statusCode
                this.message = result.message
                this.graduation_year = this.rating = 0 
                this.degree = this.course = this.description = ""
                this.isSubmitDisabled = false
            })
        }
    },
}
</script>