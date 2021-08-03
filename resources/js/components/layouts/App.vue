<template>
    <div>    
        <Header />
        <main>
            <slot></slot>
        </main>
        <Footer />
    </div>
</template>

<script>

import Footer from './Footer.vue'
import Header from './Header.vue'
export default {
  components: { 
      Header,
      Footer,
    },
    
}
</script>