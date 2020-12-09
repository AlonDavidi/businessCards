<template>
    <div id="app">
        <div class="wrapper">
            <entities-component
                v-for="entity in entities"
                v-bind="entity"
                :key="entity.id"
                @update="getEntity"
                @delete="del"
            >
            </entities-component>
            <div class="example-item-plus col-md-4">
                <button @click="openModal" class="plus-button"><i class="fa fa-plus-circle"></i></button>
            </div>
        </div>

        <modal-component
            @save="save"
            @close="closeModal"
        ></modal-component>

    </div>
</template>
<script>
    import EntitiesComponent from "./components/EntitiesComponent";
    import Axios from 'axios';
    import ModalComponent from "./components/ModalComponent";
    import {mapMutations, mapState} from "vuex";


    function Entity({id,name, image, role, state, street, country, phone }) {
        this.id = id;
        this.name = name;
        this.image = image;
        this.role = role;
        this.state = state;
        this.street = street;
        this.country = country;
        this.phone = phone;
    }
    export default {
        name: "App.vue",
        components: {ModalComponent, EntitiesComponent},
        data(){
            return{
                entities: [],
            }
        },
        methods: {
            openModal(){
                let self = this;
                self.$bvModal.show('bv-modal-entity');
            },
            closeModal(){
                let self = this;
                self.$bvModal.hide('bv-modal-entity');
                this.reset();
            },
            reset() {
                this.$store.commit('resetUser');
            },
            async fetchAll() {
                let self = this;
                const { data } = await Axios.get('/api/entities');
                data.forEach(ent => self.entities.push(new Entity(ent)));
            },
            async create() {
                const { data } = await Axios.post(`/api/entities`, this.currentUser);
                this.entities.push(new Entity(data));
            },
            // async Update(id){
            // },
            async getEntity(id){
                const { data } = await Axios.get(`/api/entities/${id}`);
                this.currentUser.id = id;
                this.currentUser.name = data.name;
                this.currentUser.role = data.role;
                this.currentUser.state = data.state;
                this.currentUser.street = data.street;
                this.currentUser.country = data.country;
                this.currentUser.phone = data.phone;
                this.openModal();
            },
            async save() {
                let id = this.currentUser.id;
                if (id !== "") {
                    Axios.put(`/api/entities/${id}`,this.currentUser)
                        .then(response => {
                            let index = this.entities.findIndex(x => x.id == response.data.id);
                            this.entities.splice(index, 1);
                            this.entities.splice(index, 0, response.data);
                        });
                } else {
                    this.create();
                }
                this.closeModal();


            },
            async del(id) {
                await Axios.delete(`/api/entities/${id}`);
                let index = this.entities.findIndex(entity => entity.id === id);
                this.entities.splice(index, 1);
            },
        },
        computed: {
            ...mapState({
                currentUser: state => state.currentUser,
            }),
            ...mapMutations({
                resetUser: mutations=> mutations.resetUser,
            }),
        },
        created() {
            this.reset();
            this.fetchAll();
        }
    }
</script>

<style scoped>
    #app{
        padding: 135px 110px;
    }
    .wrapper{
        background-color: #eef3f7;
    }
    .example-item-plus{
        display: inline-block;
        position: relative;
        width: 540px;
    }
    .plus-button{
        border: 0px;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 49.5%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        font-size: 40px
    }
</style>
