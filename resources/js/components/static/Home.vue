<template>
    <app>
        <section class="hero w-full h-screen">
            <div class="modal w-full h-full bg-green-100 py-10 flex flex-col items-center justify-center">
                <div class="w-full text-center px-10">
                    <h2 class="text-white sm:text-3xl md:text-4xl text-2xl font-bold">Choose the right university for yourself.</h2>
                    <div class="w-full max-w-2xl mx-auto mt-10 flex">
                        <input type="text" name="school" id="school" class="inline-block flex-1 py-2 px-3" placeholder="Enter a school...">
                        <button class="text-white flex-0 bg-green-500 hover:bg-green-300 px-3 text-2xl">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        
                    </div>
                    <a href="/review/school" class="text-white inline-block mt-5 hover:text-green-500 border-b border-solid border-white hover:border-green-500">
                        <em>Write a Review</em>
                    </a>
                </div>
            </div>
        </section>
        <section>
            <div class="md:px-20 sm:px-10 px-3 md:py-32 py-20 md:flex items-center bg-gray-100">
                <div class="flex-1">
                    <h2 class="font-medium sm:text-3xl text-2xl">Learn from the <span class="text-green-500">experience </span> of others.</h2>
                    <p class="text-lg font-light tracking-wide md:mt-10 mt-3">
                        There's no better way to know if whether a school is ideal for you, than listening to what the students has to say. <br><br>
                        We've got you covered with over reviews made by students in schools all over Nigeria.
                    </p>
                </div>
                <div class="flex-1 w-full object-contain mt-5 sm:mt-0">
                    <img src="/storage/images/learn-from-others.jpg" alt="" class="w-full h-auto">
                </div>
            </div>
            <div class="bg-black text-white">
                <div class="md:px-20 sm:px-10 px-3 md:pt-32 pt-20 md:pb-20 pb-10 md:flex flex-row-reverse items-center">
                    <div class="flex-1 md:pl-10">
                        <h2 class="font-medium sm:text-3xl text-2xl">Share your <span class="text-green-500">experience </span> with others.</h2>
                        <p class="text-lg font-light tracking-wide md:mt-10 mt-3">
                            How well did you enjoy learning at your university? Are the tutors always available when you need help? <br><br>
                            Help some today avoid a mistake that will cost living years of their life in regret. Share a review today!
                        </p>
                    </div>
                    <div class="flex-1 w-full object-contain mt-5 sm:mt-0">
                        <img src="/storage/images/share-with-others.jpg" alt="" class="w-full h-auto">
                    </div>
                </div>
                <div class="w-full text-center pb-10">
                    <a href="/review/school" class="bg-green-500 py-2 px-10 inline-block text-center hover:bg-green-300">Write a Review</a>
                </div>
            </div>
        </section>
        <section class="md:px-20 sm:px-10 px-3 sm:py-20 py-10 bg-white">
            <h2 class="sm:text-3xl text-2xl font-medium ">Browse Schools By State</h2>
            <span class="font-light text-lg my-5 inline-block tracking-wide">Select the state you'd love to school in.</span>
            <div class="states mt-5 w-full py-5 border-t border-gray-300 border-solid">
                <div class="w-state md:w-1/5 inline-block">
                    <a href="" class="inline-block hover:underline hover:bg-white w-full mt-1 p-3">Ogun</a>
                </div>
                <div class="w-state md:w-1/5 inline-block">
                    <a href="" class="inline-block hover:underline hover:bg-white w-full mt-1 p-3">Ogun</a>
                </div>
                    <div class="w-state md:w-1/5 inline-block">
                    <a href="" class="inline-block hover:underline hover:bg-white w-full mt-1 p-3">Ogun</a>
                </div>
                <div class="w-state md:w-1/5 inline-block">
                    <a href="" class="inline-block hover:underline hover:bg-white w-full mt-1 p-3">Ogun</a>
                </div>
            </div>
        </section>
    </app>
</template>

<script>
import App from '../layouts/App'
export default {
    components: {
        App
    }
}
</script>

<style scoped>
.hero{
    background-image: url('/storage/images/hero.jpg');
    background-size: cover;
}
.modal{
    background-color: rgba(0, 0, 0, 0.8);
}

</style>