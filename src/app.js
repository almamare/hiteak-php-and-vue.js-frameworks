const { createApp } = Vue

const app = createApp({
  data() {
    return {
      count: 0
    }
  }
})

app.mount('#app')