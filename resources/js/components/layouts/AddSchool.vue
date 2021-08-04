<template>
    <form @submit="addSchool">
        <div class="my-5 text-red-500" :class="{ 'text-red-500': isError, 'text-green-500': isSuccess }" v-if="isError || isSuccess">
            {{ message }}
        </div>
        <div class="mt-5">
            <label class="text-gray-500 text-sm block">School Name *</label>
            <div class="border border-gray-300 mt-2">
                <input type="text" v-model="name" id="name" class="px-2 py-2 w-full" placeholder="e.g Federal University, Oye Ekiti" required="required">
            </div>
            
        </div>
        <div class="mt-5">
            <label class="text-gray-500 text-sm block">School location *</label>
            <div class="inline-block border border-gray-300 mt-2">
                <select v-model="state" id="state" class="pl-2 pr-40 py-2" required="required">
                    <option disabled selected>--Select State--</option>
                    <option value="Abia">Abia</option>
                    <option value="Abuja">Abuja (FCT)</option>
                    <option value="Adamawa">Adamawa</option>
                    <option value="Akwa Ibom">Akwa Ibom</option>
                    <option value="Anambra">Anambra</option>
                    <option value="Bauchi">Bauchi</option>
                    <option value="Bayelsa">Bayelsa</option>
                    <option value="Benue">Benue</option>
                    <option value="Borno">Borno</option>
                    <option value="Cross River">Cross River</option>
                    <option value="Delta">Delta</option>
                    <option value="Ebonyi">Ebonyi</option>
                    <option value="Edo">Edo</option>
                    <option value="Ekiti">Ekiti</option>
                    <option value="Enugu">Enugu</option>
                    <option value="Gombe">Gombe</option>
                    <option value="Imo">Imo</option>
                    <option value="Jigawa">Jigawa</option>
                    <option value="Kaduna">Kaduna</option>
                    <option value="Kano">Kano</option>
                    <option value="Katsina">Katsina</option>
                    <option value="Kebbi">Kebbi</option>
                    <option value="Kogi">Kogi</option>
                    <option value="Kwara">Kwara</option>
                    <option value="Lagos">Lagos</option>
                    <option value="Nasarawa">Nasarawa</option>
                    <option value="Niger">Niger</option>
                    <option value="Ogun">Ogun</option>
                    <option value="Ondo">Ondo</option>
                    <option value="Osun">Osun</option>
                    <option value="Oyo">Oyo</option>
                    <option value="Plateau">Plateau</option>
                    <option value="Rivers">Rivers</option>
                    <option value="Sokoto">Sokoto</option>
                    <option value="Taraba">Taraba</option>
                    <option value="Yobe">Yobe</option>
                    <option value="Zamfara">Zamfara</option>
                </select>
            </div>
        </div>
        <div class="mt-10">
            <button class="p-3 bg-green-500 text-white hover:bg-green-300 disabled:" :class="{ isSubmitDisabled: 'bg-green-300' }" :disabled="isSubmitDisabled">Add School</button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            state: "",
            isError: false,
            isSuccess: false,
            isSubmitDisabled: false
        }
    },
    methods: {
        addSchool(e){
            e.preventDefault()
            this.isError = false
            this.isSuccess = false
            this.isSubmitDisabled = true
            fetch('/review/school', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.token
                },
                body: JSON.stringify({
                    name: this.name,
                    state: this.state,
                    '_token': this.token
                })
            }).then((response) => {
                return response.json()
            }).then((result) => {
                if(result.statusCode == 1){
                    this.isSuccess = true
                }else{
                    this.isError = true
                }
                this.message = response.message
                this.name = "";
                this.state = 1;
                this.isSubmitDisabled = false;
            })
        },
    },
    created() {
        this.token = $('meta[name="csrf-token"]').attr('content')
    },
}
</script>