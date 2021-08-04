<template>
    <app>
        <div class="w-9/10 max-w-3xl bg-white mx-auto mt-3 shadow sm:p-6 p-3 font-light">
            <h2 class="sm:text-2xl text-xl font-medium">Rate <span class="text-green-500">"{{schoolname}}"</span></h2>
            <p class="mt-3">Your review will be kept anonymous, and will help other aspirants make better decision.</p>
            <div class="mt-5">
                <label class="text-gray-500 text-sm block">Year of graduation *</label>
                <div class="inline-block border border-gray-300 mt-2">
                    <select name="graduation_year" id="graduation_year" class="pl-2 pr-40 py-2">
                        <option value="2021">2021</option>
                        <option value="2021">2022</option>
                    </select>
                </div>
                
            </div>
            <div class="mt-5">
                <label class="text-gray-500 text-sm block">What course did you study? *</label>
                <div class="border border-gray-300 mt-2">
                    <input type="text" name="course" id="course" class="px-2 py-2 w-full" placeholder="e.g Computer Science">
                </div>
                
            </div>
            <div class="mt-5">
                <label class="text-gray-500 text-sm block">Share your experience *</label>
                <div class="border border-gray-300 mt-2">
                    <textarea name="description" id="description" class="px-2 pt-2 w-full h-52 resize-none" placeholder="What did you enjoy about the school and did not? In what do you think the school can improve?"></textarea>
                </div>
                
            </div>
            <div class="mt-5">
                <label class="text-gray-500 text-sm block">Overall Rating *</label>
                <div class="mt-2">
                    <star-rating v-model="rating" :item-size="25" :increment="0.5"></star-rating>
                </div>
            </div>
            <div class="mt-10">
                <button class="p-3 bg-green-500 text-white hover:bg-green-300">Submit Review</button>
            </div>
        </div>
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
            rating: 0
        }
    },
    props: [
        'schoolname'
    ],
}
</script>