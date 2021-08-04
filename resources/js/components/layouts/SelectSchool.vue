<template>
    
    <form @submit="submitForm">
        <div class="mt-5">
            <label class="text-gray-500 text-sm block">Select a school *</label>
            <div class="inline-block border border-gray-300 mt-2" required>
                <select v-model="school" id="school" class="pl-2 sm:pr-20 pr-7 py-2">
                    <option v-for="school in schools" :value="school.id" :key="school.id">{{ school.name }}</option>
                </select>
            </div>
            
        </div>
        <div class="mt-10">
            <button class="p-3 bg-green-500 text-white hover:bg-green-300">Proceed to Review</button>
        </div>
    </form>
</template>


<script>
export default {
    data() {
        return {
            school: 1
        }
    },
    methods: {
        submitForm(e){
            e.preventDefault()
            window.location.href = '/review/school/' + this.school + '/create'
        }
    },
    props: ['schools'],
}
</script>