<template>
    <div class="modal-component ">
        <b-modal id="bv-modal-entity"
                 hide-footer
                 hide-header-close="false">
            <template #modal-title>
                Entity
            </template>
            <div class="d-block text-center">
                <p>Name:</p> <input v-model="currentUser.name" style="margin-bottom: 10px;"><br>
                <p>Role:</p> <input v-model="currentUser.role" style="margin-bottom: 10px;"><br>
                <p>Phone:</p> <input v-model="currentUser.phone" style="margin-bottom: 10px;"><br>
                <p>Street:</p> <input v-model="currentUser.street" style="margin-bottom: 10px;"><br>
                <p>State:</p> <input v-model="currentUser.state" style="margin-bottom: 10px;"><br>
                <p>Country:</p> <input v-model="currentUser.country" style="margin-bottom: 10px;"><br>
            </div>
            <b-button  class="btn btn-primary " style="width: 45%;     margin-left: 2%;" @click="$emit('save')">Save</b-button>
            <b-button class= "btn btn-secondary" style="width: 45% ;     margin-left: 5%;" @click="$emit('close')" >Close</b-button>
        </b-modal>
    </div>

</template>
<script>
    import {mapState} from "vuex";

    export default {
        name: "ModalComponent",
        data(){
            return{
            }
        },
        computed: {
            ...mapState({
                currentUser: state => state.currentUser,
            })},
    }
</script>

<style scoped>
</style>
