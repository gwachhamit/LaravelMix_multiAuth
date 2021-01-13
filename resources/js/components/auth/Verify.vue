<template>
    <div>
        <div v-if="message" class="alert alert-success" role="alert">
            {{ message }}
        </div>
        <form class="d-inline" @submit.prevent="resendVerificationLink">
            Before proceeding, please check your email for a verification link.
            If you did not receive the email
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
        </form>
    </div>
</template>

<script>
export default {
    props: ['resendVerificationLinkRoute'],
    data() {
        return {
            db_errors: null,
            message: "",
        }
    },

    methods: {
        resendVerificationLink(){
            this.db_errors = null;
            this.message = "";
            axios.post(this.resendVerificationLinkRoute)
            .then(response => {
                this.message = "A fresh verification link has been sent to your email address.";
            })
            .catch(error => { console.log(error);
                this.db_errors = error.data.errors;
            })
        }
    }
}
</script>