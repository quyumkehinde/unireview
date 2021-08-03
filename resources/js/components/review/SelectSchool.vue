<template>
    <div>
        <div class="w-9/10 max-w-3xl bg-white mx-auto mt-3 shadow sm:p-6 p-3 font-light">
            <h2 class="sm:text-2xl text-xl font-medium">Select a school</h2>
            <p class="mt-3">Select a school you'd like to review or add a new school.</p>
            <form action="">
                <div class="mt-5">
                    <label class="text-gray-500 text-sm block">Select a school *</label>
                    <div class="inline-block border border-gray-300 mt-2">
                        <select name="graduation_year" id="graduation_year" class="pl-2 pr-40 py-2">
                            <option value="2021">Covenant University</option>
                            <option value="2021">Tai Solarin University of Education</option>
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

                <div class="mt-5">
                    <label class="text-gray-500 text-sm block">School Name *</label>
                    <div class="border border-gray-300 mt-2">
                        <input type="text" name="name" id="name" class="px-2 py-2 w-full" placeholder="e.g Federal University, Oye Ekiti">
                    </div>
                    
                </div>
                <div class="mt-5">
                    <label class="text-gray-500 text-sm block">In what state is the school located? *</label>
                    <div class="inline-block border border-gray-300 mt-2">
                        <select name="location" id="location" class="pl-2 pr-40 py-2">
                            <option value="2021">Ogun</option>
                            <option value="2021">Lagos</option>
                        </select>
                    </div>
                </div>
                <div class="mt-10">
                    <button class="p-3 bg-green-500 text-white hover:bg-green-300">Add School</button>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            newSchool: false
        }
    },
}
</script>