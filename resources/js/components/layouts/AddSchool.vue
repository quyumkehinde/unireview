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
                    <option value="abia">Abia</option>
                    <option value="abuja">Abuja (FCT)</option>
                    <option value="adamawa">Adamawa</option>
                    <option value="akwa-ibom">Akwa Ibom</option>
                    <option value="anambra">Anambra</option>
                    <option value="bauchi">Bauchi</option>
                    <option value="bayelsa">Bayelsa</option>
                    <option value="benue">Benue</option>
                    <option value="borno">Borno</option>
                    <option value="cross-river">Cross River</option>
                    <option value="delta">Delta</option>
                    <option value="ebonyi">Ebonyi</option>
                    <option value="edo">Edo</option>
                    <option value="ekiti">Ekiti</option>
                    <option value="enugu">Enugu</option>
                    <option value="gombe">Gombe</option>
                    <option value="imo">Imo</option>
                    <option value="jigawa">Jigawa</option>
                    <option value="kaduna">Kaduna</option>
                    <option value="kano">Kano</option>
                    <option value="katsina">Katsina</option>
                    <option value="kebbi">Kebbi</option>
                    <option value="kogi">Kogi</option>
                    <option value="kwara">Kwara</option>
                    <option value="lagos">Lagos</option>
                    <option value="nasarawa">Nasarawa</option>
                    <option value="niger">Niger</option>
                    <option value="ogun">Ogun</option>
                    <option value="ondo">Ondo</option>
                    <option value="osun">Osun</option>
                    <option value="oyo">Oyo</option>
                    <option value="plateau">Plateau</option>
                    <option value="rivers">Rivers</option>
                    <option value="sokoto">Sokoto</option>
                    <option value="taraba">Taraba</option>
                    <option value="yobe">Yobe</option>
                    <option value="zamfara">Zamfara</option>
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
                this.message = result.message

                if(result.statusCode == 1){
                    this.isSuccess = true
                }else{
                    this.isError = true
                }
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