<template>
    <div class="example-item pos-relative col-sm-4 col-md-4 col-lg-4">
        <div class="row">
            <div class="user-perm col-sm-4 col-md-4 col-lg-4">
                <i @click="update" class="fa fa-pencil" style="cursor: pointer"></i>
                <button @click="del" style="border: 0;"><i class="fa fa-trash"></i></button>
            </div>
            <div class="image col-sm-4 col-md-4 col-lg-4">
                <img :src="images" />
                <p class="role-class">{{role}}</p>
            </div>
            <div class="text-exp col-sm-4 col-md-4 col-lg-4">
                <div class="name">
                    <p>{{name}}</p>
                </div>
                <div>
                    <i class="fa fa-map-marker"></i> <p class="text-description" style="display: inline-block; margin-bottom: 10px;">{{state}}</p>
                    <p class="text-description" style="font-weight: bold;font-size: 13px;">Twitter, Inc.</p>
                    <div class="desc">
                        <p class="text-description">{{street}}</p>
                        <p class="text-description">{{country}}</p>
                        <p class="text-description">P:{{phone}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    export default {
        name: "EntitiesComponent",
        data(){
            return{
            }
        },
        computed: {
            images() {
                return `/images/${this.image}.jpg`;
            },
        },
        methods: {
            update() {
                this.$emit('update', this.id);
            },
            del() {
                this.$emit('delete', this.id);
            }
        },
        props: ['id', 'name','image', 'role', 'state', 'street', 'country', 'phone'],
    }
</script>

<style scoped>
    .example-item{
        background-color: white;
        padding: 20px;
        border: 1px solid #bbceda;
        /*border-radius: 6px;*/
        /*color: #ffffff;*/
        /*min-height: 145px;*/
        margin: 10px 10px;
        display: inline-block;
        /*width: 100%;*/
        /*cursor: pointer;*/
        width: 540px;
        height: 200px;
    }
    .pos-relative{
        position: relative !important;
    }
    .example-item .user-perm {
        position: absolute;
        top: 160px;
        right: -100px;
        display: inline-block;
        color: #196291;
        font-size: 14px;
        font-weight: 700;
    }
    .example-item .image {
        display: inline-block;
        /*float: left;*/
    }
    .example-item .image img {
        width: 130px;
        border-radius: 50%;
        border: 3px solid transparent;
    }
    .example-item .text-exp {
        /*padding: 3% 0% 3% 8%;*/
        display: inline-block;
    }
    .text-exp .name {
        font-size: 18px;
        font-weight: bold;
        /*margin-top: 5px;*/
    }
    .text-description{
        margin-bottom: 1px;
        font-size: 11px;
    }
    .role-class{
        font-weight: bold;
        margin-top: 2px;
        text-align: center;
    }

    @media only screen and (max-width: 800px) {
        .image{
            width: 160px;
        }
        .user-perm{
            width: 180px;
        }
        .text-exp{
            width: 180px;
        }
    }

</style>
