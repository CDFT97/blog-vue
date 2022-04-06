<template>
    <div class="form-contact">
        <transition name="slide-fade" mode="out-in">
        <h2 v-if="sent == true">Your message has been received, we will contact you soon.</h2>
        <form v-else @submit.prevent="submit()">
            <div class="input-container container-flex space-between">
                <input v-model="form.name" type="text" placeholder="Your Name" class="input-name" required>
                <input v-model="form.email" type="email" placeholder="Email" class="input-email" required>
            </div>
            <div class="input-container">
                <input v-model="form.subject" type="text" placeholder="Subject" class="input-subject" required>
            </div>
            <div class="input-container">
                <textarea v-model="form.message" cols="30" rows="10" placeholder="Your Message" required></textarea>
            </div>
            <div class="send-message">
                <button class="text-uppercase c-green" :disabled="working">
                    <span v-if="working == true">Sending message...</span>
                    <span v-else>Send message</span>
                </button>
            </div>
        </form>
        </transition>
    </div>
</template>

<script>
export default {
    data(){
        return {
            //Variable sent es para comprobar si se envio el form
            sent: false,
            working: false,
            form: {
                name: '',
                email: '',
                subject: '',
                message: '',
            }
        }
    },
    methods: {
        submit(){
            this.working = true;
            axios.post('/api/messages', this.form)
                .then( (res) => {
                    this.sent = true;
                    this.working = false;
                })
                .catch((error) => {
                    this.sent = false;
                    this.working = false;
                })
        }
    }
}
</script>